<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;

use Auth;
use Session;
use App\Image;
use App\Offer;
use Html;
use DB;

class OfferAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::orderBy('position', 'asc')->get();

        return view('admin.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::latest('created_at')->get();
        if(!$no_position = Offer::first()) {
           $positions = [];
        } else
        $positions = Offer::orderBy('position', 'asc')->get();

        return view('admin.offer.create', compact('images', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {     
        $not_available = Offer::wherePosition($request->input('position'))->first();
        if($not_available){
            $old_pos = $not_available->position;
            $max_pos = Offer::max('position');
            $new_pos = $max_pos + 1;
            $not_available->position = $new_pos;
            $not_available->save();

            $offer = Auth::user()->offers()->create($request->all());
        }
        else
            $offer = Auth::user()->offers()->create($request->all());

        Session::flash('flash_message', 'Grejt sukces! Oferta utworzony pomyślnie.');

        return redirect('/admin/offer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $offer = Offer::whereSlug($slug)->firstOrFail();

        return view('admin.offer.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $offer = Offer::whereSlug($slug)->firstOrFail();
        $images = Image::latest('created_at')->get();
        if(!$no_position = Offer::first()) {
           $positions = [];
        } else
        $positions = Offer::orderBy('position', 'asc')->get();
       // $image = Image::findOrFail($article->image_id);
       // $filename = asset('uploads/' . $image->file);
        
        return view('admin.offer.edit', compact('offer', 'images', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $slug)
    {
        $offer = Offer::whereSlug($slug)->firstOrFail();
        $offer->update($request->all());
        Session::flash('flash_message', 'Hurra! Edycja pomyślna.');

        return redirect('admin/offer/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect('/admin/offer');
    }
}

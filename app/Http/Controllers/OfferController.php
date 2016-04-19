<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Offer;

class OfferController extends Controller
{

    public function index()
    {
        $offers = Offer::orderBy('position', 'asc')->get();

        return view('offer.index', compact('offers'));
    }

    public function show($slug)
    {
        $offer = Offer::whereSlug($slug)->firstOrFail();

        return view('offer.show', compact('offer'));    }

}

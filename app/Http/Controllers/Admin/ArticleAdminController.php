<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Auth;
use Session;
use App\Image;
use Html;
use DB;

class ArticleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  $articles = DB::table('articles')
      //      ->join('images', 'articles.image_id', '=', 'images.id')
      //      ->select('articles.*', 'file')->latest('published_at')->get();

        $articles = Article::latest('published_at')->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::latest('created_at')->get();
        return view('admin.articles.create', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        Session::flash('flash_message', 'Grejt sukces! Artykuł utworzony pomyślnie.');
        return redirect('/admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();

       // $image = Image::where('id', $article->image_id)->firstOrFail();

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        $images = Image::latest('created_at')->get();
       // $image = Image::findOrFail($article->image_id);
       // $filename = asset('uploads/' . $image->file);
        
        return view('admin.articles.edit', compact('article', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        $article->update($request->all());
        Session::flash('flash_message', 'Hurra! Edycja pomyślna.');
        return redirect('admin/articles/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/admin/articles');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;
use App\Image;
use Carbon\Carbon;

class ArticleController extends Controller
{

    protected $posts_per_page = 5;

    public function index(Request $request)
    {
    	$articles = Article::latest('published_at')->published()->paginate($this->posts_per_page);

     /* if($request->ajax())
      {
        return [
            'articles' => view('articles.ajax.index')->with(compact('articles'))->render(),
            'next_page' => $articles->nextPageUrl()
        ];
      }*/

      return view('articles.index')->with(compact('articles', 'recent_posts'));
    }

    public function fetchNextArticlesSet($page)
    {

    }

    public function show($slug)
    {
       $article = Article::whereSlug($slug)->published()->firstOrFail();
       return view('articles.show')->with(compact('article'));    
    }

}

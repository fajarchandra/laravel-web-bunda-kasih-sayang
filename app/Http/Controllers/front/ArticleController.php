<?php

namespace App\Http\Controllers\front;

use App\Models\Galeri;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ArticleController extends Controller
{
    public function index()
    {
        
            $articles = Article::with('Category')
            ->whereStatus(1)
            ->latest()
            ->paginate(4);
        $galeris = Galeri::all();
        
        return view("front.article.index", [
            'latest_post' => Article::with('User')->latest()->first(),
            'articles' => $articles,
            // 'keyword' => $keyword,
            'galeris' => $galeris, // Menambahkan data galeri ke view
        ]);

    }

    // Memuat data galeri

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $article->increment('views');
        return view("front.article.show", [
            'article' =>$article,
        ]);
    }

    public function allArticle()
    {
        $keyword = request()->keyword;
        if ($keyword) {
            $articles = Article::with('Category')
            ->whereStatus(1)
            ->where('title', 'like', '%' .$keyword. '%')
            ->latest()
            ->paginate(3); //menampilkan data per page (3 article)

        } else {
            $articles = Article::with('Category')
            ->whereStatus(1)
            ->latest()
            ->paginate(6);
        }
        
        $all_article = Article::where('status', 1)->latest()->get();

        return view('front.article.all-article', [
            'allarticle' => $all_article,
            'articles' => $articles,
            'keyword' => $keyword,
        ]);
        
    }
}

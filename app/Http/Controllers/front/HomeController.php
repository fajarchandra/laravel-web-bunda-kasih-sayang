<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home.index', [
            'latest_post' => Article::with('User')->latest()->first(), //menampilkan satu (first) data terbaru (latest)
            'articles' => Article::with('User', 'Category')->whereStatus(1)->latest()->paginate(4),
        ]);
    }
    
    public function about()
    {
        return view('front.home.about',[
        ]);
    }
}

<?php

namespace App\Http\Controllers\front;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact.index', [
            'articles' => Article::with('User', 'Category')->whereStatus(1)->latest()->paginate(3),
        ]);
    }
}

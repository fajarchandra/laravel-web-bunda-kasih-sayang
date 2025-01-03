<?php

namespace App\Http\Controllers\front;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all(); // Mengambil semua data galeri
        return view('front.article.index', compact('galeris'));
    }
}

<?php

namespace App\Http\Controllers\front;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Options\Languages\Paginate;

class CategoryController extends Controller
{
    public function index($slugCategory)
    {
        return view('front.category.index', [
            'articles' => Article::with('Category')
            ->whereHas('Category', function ($q) use ($slugCategory) {
                $q->where('slug', $slugCategory);
            })->latest()->Paginate(2),
            'category' => $slugCategory,
        ]);
    }
    public function allCategory()
    {
        
        $category = Category::withCount(['articles'=>function (Builder $query){
            $query->where('status', 1);
        }])->latest()->get();

        return view('front.category.all-category', [
            'category' => $category
        ]);
        
    }
}


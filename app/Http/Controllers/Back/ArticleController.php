<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('category')->latest()->get();

            return DataTables::of($article)
                ->addIndexColumn()
                ->addColumn('category_id', function ($article) {
                    return $article->category->name;
                })
                ->addColumn('status', function ($article) {
                    if ($article->status == '0') {
                        return '<span class="badge bg-danger">Privacy</span>';
                    } else {
                        return '<span class="badge bg-success">Published</span>';
                    }
                })
                ->addColumn('pdf', function ($article) {
                    return $article->pdf ? $article->pdf : null; // Kembalikan nama file PDF
                })
                ->addColumn('button', function ($article) {
                    return '<div class="text-center">
                                <a href="article/' . $article->id . '" class="btn btn-secondary">Detail</a>
                                <a href="article/' . $article->id . '/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteArticle(this)" data-id="' . $article->id . '" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }
        return view('back.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create', [
            'Categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated(); // divalidasi dari ArticleRequest pakai validate, kalau panggil modal pakai validate

        $file = $request->file('img'); //file img
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); // original format jpg , jpeg , png
        $file->storeAs('public/back/', $fileName); //lokasi save storage/public/back/ uniqid ... jpg


        // upload pdf   
        $pdfFileName = null;
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFileName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->storeAs('public/back/pdf/', $pdfFileName);
        }

        // if ($request->hasFile('pdf')) {
        //     $pdfFile = $request->file('pdf');
        //     $pdfName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
        //     $pdfFile->storeAs('public/pdfs/', $pdfName);
        //     $data['pdf'] = $pdfName; // Masukkan ke array data
        // }

        $data['user_id'] = auth()->user()->id;
        $data['img'] = $fileName; //memanggil img ke UI
        $data['pdf'] = $pdfFileName; //Simpan Nama File PDF
        $data['slug'] = Str::slug($data['title']); //memanggilslug ke UI

        Article::create($data);

        return redirect(url('article'))->with('success', 'Data Article has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show', [
            'article' => Article::with('User', 'Category')->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update', [
            'article' => Article::find($id),
            'Categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated(); // divalidasi dari ArticleRequest pakai validate, kalau panggil modal pakai validate

        if ($request->hasFile('img')) {
            $file = $request->file('img'); //file img
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); // original format jpg , jpeg , png
            $file->storeAs('public/back/', $fileName); //lokasi save storage/public/back/ uniqid ... jpg

            // unlink image / delete gambar lama
            Storage::delete('public/back/' . $request->oldImg);

            $data['img'] = $fileName; //memanggil img ke UI

        } else {

            $data['img'] = $request->oldImg; //memanggil img ke UI
        }

        //update PDF
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFileName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->storeAs('public/back/pdf/', $pdfFileName);

            // Hapus PDF lama
            if ($request->oldPdf) {
                Storage::delete('public/back/pdf/' . $request->oldPdf);
            }

            $data['pdf'] = $pdfFileName;
        } else {
            $data['pdf'] = $request->oldPdf;
        }

        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']); //memanggilslug ke UI

        Article::find($id)->update($data);

        return redirect(url('article'))->with('success', 'Data Article has been created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::find($id);
        Storage::delete('public/back/' . $data->img);

        // Hapus PDF
        if ($data->pdf) {
            Storage::delete('public/back/pdf/' . $data->pdf);
        }

        $data->delete();

        return response()->json([
            'message' => 'Data Aricle has been deleted'
        ]);
    }
}

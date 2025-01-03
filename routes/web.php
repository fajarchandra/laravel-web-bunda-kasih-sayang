<?php

// use App\Http\Controllers\ArticleController as ControllersArticleController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\Back\ConfigController;
use App\Http\Controllers\Back\GaleriController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\Back\DashboardController;
// use Illuminate\Foundation\Auth;
use App\Http\Controllers\front\ArticleController as frontArticleController;
use App\Http\Controllers\front\CategoryController as frontCategoryController;
use App\Http\Controllers\front\GaleriController as frontGaleriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/p/{slug}', [frontArticleController::class, 'show']);
Route::get('/articles', [frontArticleController::class, 'index']);
Route::get('all-article', [frontArticleController::class, 'allArticle']);
Route::post('/all-articles/search', [frontArticleController::class, 'allArticle'])->name('search');

Route::get('category/{slug}', [frontCategoryController::class, 'index']);
Route::get('all-category', [frontCategoryController::class, 'allCategory']);

Route::get('/galeri', [frontGaleriController::class, 'index'])->name('galeri.index');

Route::get('/contact', [ContactController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('article', ArticleController::class);
    Route::resource('/category', CategoryController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ])->middleware('UserAccess:1'); //selain user dengan role di db = 1 dilarang akses

    Route::resource('/users', UserController::class);
    Route::resource('/config', ConfigController::class)->only([
        'index', 'update'
    ]);
    Route::resource('galeri', GaleriController::class);
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');

    // Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    //     \UniSharp\LaravelFilemanager\Lfm::routes();
    // });
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

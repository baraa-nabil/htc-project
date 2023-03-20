<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// This group is for guest
//      Every new guard, we will add it here 'v'
Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
    Route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('view.login');
    Route::post('{guard}/login', [UserAuthController::class, 'login']); // ما بيلزمها اسم عشان هي عبارة عن اضافة وليس عرض
});



// This group is for auth Which people are logged in
Route::prefix('cms/admin/')->group(function () {
    // main page
    Route::view('', 'cms.home')->name('home');

    // Its main temp for Extends
    Route::view('temp', 'cms.temp')->name('parent');

    // countries
    Route::resource('countries', CountryController::class);
    Route::post('countries_update/{id}', [CountryController::class, 'update'])->name('countries_update');

    // cities
    Route::resource('cities', CityController::class);
    Route::post('cities_update/{id}', [CityController::class, 'update'])->name('cities_update');

    // admins
    Route::resource('admins', AdminController::class);
    Route::post('admins_update/{id}', [AdminController::class, 'update'])->name('admins_update');

    // authors
    Route::resource('authors', AuthorController::class);
    Route::post('authors_update/{id}', [AuthorController::class, 'update'])->name('authors_update');

    // categories
    Route::resource('categories', CategoryController::class);
    Route::post('categories_update/{id}', [CategoryController::class, 'update'])->name('categories_update');

    // articles
    Route::resource('articles', ArticleController::class);
    Route::post('articles_update/{id}', [ArticleController::class, 'update'])->name('categories_update');

    // indexArticle
    Route::get('index/article/{id}', [ArticleController::class, 'indexArticle'])->name('indexArticle');

    // createArticle
    Route::get('create/article/{id}', [ArticleController::class, 'createArticle'])->name('createArticle');
});

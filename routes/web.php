<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SinginController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ViewerController;
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

Route::get('/', function () {
    return view('cms.button_users1');
});





// This group is for guest
//      Every new guard, we will add it here 'v'
Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
    Route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('view.login');
    Route::post('{guard}/login', [UserAuthController::class, 'login']); // ما بيلزمها اسم عشان هي عبارة عن اضافة وليس عرض

});


// This group is for auth and for logout
Route::prefix('cms/admin')->middleware('auth:admin,author')->group(function () {
    Route::get('logout', [UserAuthController::class, 'logout'])->name('view.logout');
    // Route::get('/logout', [UserAuthController::class, 'Logout'])->name('cms.admin.logout');
    // Route::get('profile/edit', [UserAuthController::class, 'editProfile'])->name('cms.auth.edit-profile');
    Route::get('profile/edit', [UserAuthController::class, 'editProfile'])->name('cms.auth.edit-profile');
    // Route::post('profile/update', [UserAuthController::class, 'updateProfile'])->name('cms.auth.update-profile');
    // Route::get('password/edit', [UserAuthController::class, 'editPassword'])->name('cms.admin.edit-password');
    // Route::post('update/password', [UserAuthController::class, 'updatePassword'])->name('dashboard.auth.update-password');
    // Route::get('edit/password' , [SettingController::class , 'editPassword'])->name('cms.auth.editPassword');
    // Route::post('update/password' , [SettingController::class , 'updatePassword'])->name('cms.auth.updatePassword');
});



// This group is for auth Which users are logged in
Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function () {
    // General :
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

    // viewers
    Route::resource('viewers', ViewerController::class);
    Route::post('viewers_update/{id}', [ViewerController::class, 'update'])->name('viewers_update');

    // categories
    Route::resource('categories', CategoryController::class);
    Route::post('categories_update/{id}', [CategoryController::class, 'update'])->name('categories_update');

    // sliders
    Route::resource('sliders', SliderController::class);
    Route::post('sliders_update/{id}', [SliderController::class, 'update'])->name('sliders_update');

    // articles
    Route::resource('articles', ArticleController::class);
    Route::post('articles_update/{id}', [ArticleController::class, 'update'])->name('articles_update');

    // indexArticle
    Route::get('index/article/{id}', [ArticleController::class, 'indexArticle'])->name('indexArticle');

    // createArticle
    Route::get('create/article/{id}', [ArticleController::class, 'createArticle'])->name('createArticle');

    // Prerequisites :
    // roles
    Route::resource('roles', RoleController::class);
    Route::post('roles_update/{id}', [RoleController::class, 'update'])->name('categories_update');

    // permissions
    Route::resource('permissions', PermissionController::class);
    Route::post('permissions_update/{id}', [PermissionController::class, 'update'])->name('permissions_update');

    Route::resource('roles.permissions', RolePermissionController::class);
    // contacts
    Route::resource('contacts', ContactController::class);
});

// web
Route::prefix('news/')->group(function () {
    Route::get('index', [HomeController::class, 'home'])->name('homeWeb');
    Route::get('all/{id}', [HomeController::class, 'all'])->name('all');
    Route::get('det/{id}', [HomeController::class, 'det'])->name('det');
});

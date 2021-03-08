<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Adminchek;

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

Route::get('/', 'MainController@home')->name('home');
Route::get('/post', 'MainController@post')->name('post');
Route::get('/about', 'MainController@about');
Route::get('/review', 'MainController@review');
Route::get('/registration', 'MainController@registration')->name('registration');
Route::get('/addPost', 'MainController@addPost')->name('addPost');
Route::get('/editpost', 'MainController@editpost');
Route::get('/addCategory', 'MainController@addCategory')->name('addCategoryPage');
// TODO:: for Post add,edit and delete
Route::post('/addPost/check', 'Post\AddController@addPost')->name('addPost');
Route::post('/updatePost/check', 'Post\EditeController@updatePost')->name('updatePost');
Route::post('/post/delete', 'Post\DeleteController@deletePost')->name('deletePost');
//Route::post('/updatePost/check', 'MainController@updatePost_check')->name('updatePost');
//Route::post('/addCategory/check', 'MainController@addCategory_check')->name('addCategory');
//Route::post('/post/delete', 'MainController@postDelete_check');
Route::post('post-register', 'MainController@postRegister');
// Admin view pages
Route::prefix('admin')->group(function () {
    Route::get('/dashbord', 'AdminController@dashbord')->middleware('adminchek')->name('dashbord');
    //Route::get('/admin/addCategory', 'AdminController@addCategory')->middleware('adminchek')->name('addCategory');
    Route::get('/addCategory', 'Admin\Categories\AddController@addCategory')->middleware('adminchek')->name('addCategory');
    Route::post('/addCategory/check', 'Admin\Categories\AddController@addCategoryCheck')->middleware('adminchek')->name('addCategoryCheck');
    Route::get('/addCategory/edit/{id}', 'Admin\Categories\AddController@editCategory')->middleware('adminchek')->name('editCategory');
    Route::post('/addCategory/edit/{id}/check ', 'Admin\Categories\AddController@editCategoryCheck')->middleware('adminchek')->name('editCategoryCheck');
    Route::get('/addCategory/delete/{id}', 'Admin\Categories\AddController@deleteCategory')->middleware('adminchek')->name('deleteCategory');
    Route::get('/addMovies', 'Admin\ViewController@addMovies')->middleware('adminchek')->name('addMoviesPage');

    Route::get('/allUsers', 'AdminController@allUsers')->middleware('adminchek')->name('allUsers');
    Route::get('/allMovies', 'AdminController@allMovies')->middleware('adminchek')->name('allMovies');
    //Route::get('/product-list', 'AdminController@productList')->middleware('adminchek')->name('product-list');
    //Route::get('/product-edit', 'AdminController@productEdit')->middleware('adminchek')->name('product-edit');
    //Route::get('/category-list', 'AdminController@categoryList')->middleware('adminchek')->name('category-list');
    //Route::get('/category-edit', 'AdminController@categoryEdit')->middleware('adminchek')->name('category-edit');
    //TODO:: Admin chacked
    //Route::post('/addCategory/check', 'AdminController@adminAddCategory_check')->middleware('adminchek')->name('adminAddCategory');
    Route::post('/addPost/check', 'AdminController@adminAddPost_check')->middleware('adminchek')->name('adminAddPost');
    //TODO:: CDN FOR ACTORS
    Route::get('/addActor', 'AdminController@addActor')->middleware('adminchek')->name('addActor');
    Route::post('/addActor/check', 'AdminController@addActorCheck')->middleware('adminchek')->name('addActorCheck');
    Route::get('/allActor', 'AdminController@allActor')->middleware('adminchek')->name('allActor');
    Route::get('/actor/{id}', 'AdminController@actor')->middleware('adminchek')->name('actor');
    Route::get('/actor/delete/{id}', 'AdminController@actorDelete')->middleware('adminchek')->name('actorDelete');
    Route::get('/actor/edit/{id}', 'AdminController@actorEdit')->middleware('adminchek')->name('actorEdit');
    Route::post('/editActor/{id}/check', 'AdminController@editActorCheck')->middleware('adminchek')->name('editActorCheck');
    Route::post('/addMovies/check', 'AdminController@addMovieCheck')->middleware('adminchek')->name('addMovieCheck');
});


Route::post('/review/check', 'MainController@review_check');
Route::post('/registration/check', 'MainController@registration_check');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


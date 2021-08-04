<?php


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

Route::get('/', 'PageController@index')->name('home');
Route::get('about', 'PageController@about')->name('about');
Route::get('contacts', 'PageController@contacts')->name('contacts');
Route::post('contacts', 'PageController@sendContactForm')->name('contacts.send');

Route::resource('articles', ArticleController::class)->only('index', 'show');

Route::get('vue-articles', function () {
    return view('articles');
});

Auth::routes();



Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('articles', ArticleController::class);
    Route::post('api-token', 'ApiTokenController@update')->name('api_token');
});
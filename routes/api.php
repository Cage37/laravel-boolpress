<?php

use App\Article;
use App\Category;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('articles', function() {
//     $articles = Article::with(['category', 'tag'])->paginate();
//     return $articles;
// });

Route::get('articles', 'API\ArticleController@index');

// API risorsa singola

Route::get('articles/{article}', function (Article $article) {
    return new ArticleResource($article);
});

Route::middleware('api_token_check')->group(function () {
    Route::get('categories', function () {
        return Category::all();
    });
});
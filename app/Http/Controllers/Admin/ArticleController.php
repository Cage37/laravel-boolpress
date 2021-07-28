<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Tag;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.create', compact('categories' , 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'author' => 'required',
            'title' => 'required',
            'subtitle' => 'nullable',
            'image' => 'nullable | image | max: 150',
            'content' => 'required',
            'category_id' => 'nullable | exists:categories,id',
            'tags' => 'nullable | exists:tags,id'
        ]);

        $file_path = Storage::put('post_images', $validateData['image']);
        $validateData['image'] = $file_path;

        $article = Article::create($validateData);
        $article->tags()->attach($request->tags);
        return redirect()->route('admin.articles.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        $validateData = $request->validate([
            'author' => 'required',
            'title' => 'required',
            'subtitle' => 'nullable',
            'image' => 'nullable | image | max: 150',
            'content' => 'required',
            'category_id' => 'nullable | exists:categories,id',
            'tags' => 'nullable | exists:tags,id',
        ]);

        if(array_key_exists('image', $validateData)) {
            $file_path = Storage::put('post_images', $validateData['image']);
            $validateData['image'] = $file_path;
        }

        $article->update($validateData);
        // $article->tags()->detach();
        // $article->tags()->attach($request->tags);
        $article->tags()->sync($request->tags);
        return redirect()->route('admin.articles.index', $article->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->tags->detach();
        $article->delete();
        return redirect()->route('admin.articles.index');
    }
}

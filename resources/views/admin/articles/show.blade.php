@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
            <div class="col-md-4">
                <div class="card text-left m-3" style="min-height: 800px;">
                    <img class="card-img-top" src="{{ asset('storage/' . $article->image) }}" alt="">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <h4 class="card-title">{{ $article->subtitle }}</h4>
                        <p class="card-text">{{ $article->content }}</p>
                        <p class="card-title">Category: {{ $article->category ? $article->category->name : 'Uncategorized' }}</p>
                        <span>Written by: {{ $article->author }}</span>
                    </div>
                </div>
            </div>
        </div>
        
</div>

@endsection
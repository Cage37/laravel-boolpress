@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        @foreach ($articles as $article)
        
            <div class="col-md-4">

                <div class="card text-left m-3" style="min-height: 800px;">
                    <a href="{{ route('articles.show', $article->id) }}">
                    <img class="card-img-top" src="{{ asset('storage/' . $article->image) }}" alt="">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <h4 class="card-title">{{ $article->subtitle }}</h4>
                        <p class="card-text">{{ $article->content }}</p>
                        <p class="card-title">Category: {{ $article->category ? $article->category->name : 'Uncategorized' }}</p>
                        <span>Written by: {{ $article->author }}</span>
                    </div>
                    </a>
                </div>
            </div>
        
        @endforeach
    </div>
</div>


@endsection
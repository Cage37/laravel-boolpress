@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
            <div class="col-md-4">
                <div class="card text-left m-3" style="height: 920px;">
                    <img class="card-img-top" src="{{ $article->image }}" alt="">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <h4 class="card-title">{{ $article->subtitle }}</h4>
                        <p class="card-text">{{ $article->content }}</p>
                        <span>Written by: {{ $article->author }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center mt-3">
            <form action="{{ route('admin.articles.edit', $article->id) }}">
                <button type="submit" class="btn btn-warning mr-5">Edit</button>
            </form>
            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mr-5">Delete</button>
            </form>
        </div>
</div>

@endsection
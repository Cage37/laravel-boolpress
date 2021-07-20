@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        @foreach ($articles as $article)
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
        @endforeach
    </div>
</div>


@endsection
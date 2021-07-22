@extends('layouts.admin')

@section('content')

<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Image</th>
            <th>Content</th>
            <th><a href="{{ route('admin.articles.create') }}"><i class="fas fa-plus createcircle"></i></a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->author }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->subtitle }}</td>
            <td><img width="100" src="{{ $article->image }}" alt=""></td>
            <td>{{ $article->content }}</td>
            <td class="text-center">
                <div class="mt-2"><a href="{{ route('admin.articles.show', $article->id) }}">View</a></div><br>
                <div><a href="{{ route('admin.articles.edit', $article->id) }}">Edit</a></div>
                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Delete</button>
            </form></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
    
@endsection
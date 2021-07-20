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
            <td>View | Edit | Delete</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
    
@endsection
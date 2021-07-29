@extends('layouts.admin')

@section('content')

<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Author</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Image</th>
            <th>Content</th>
            <th>Category</th>
            <th><a href="{{ route('admin.articles.create') }}"><i class="fas fa-plus createcircle"></i></a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->author }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->subtitle }}</td>
            <td><img width="100" src="{{ asset('storage/' . $article->image) }}" alt=""></td>
            <td>{{ $article->content }}</td>
            <td>{{ $article->category ? $article->category->name : 'Uncategorized' }}</td>
            <td class="text-center">
                <a href="{{route('admin.articles.show', $article->id )}}" class="btn btn-primary mt-3 mb-3">
                    <i class="fas fa-eye fa-sm fa-fw"></i>
                </a>
                <a href="{{route('admin.articles.edit', $article->id )}}" class="btn btn-secondary mb-3">
                    <i class="fas fa-pencil-alt fa-sm fa-fw"></i>
                </a>
                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-sm fa-fw"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
    
@endsection
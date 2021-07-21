<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<h1 class="text-center pt-3 pb-3">ADD A NEW ARTICLE</h1>


<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.articles.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="author">AUTHOR:</label>
            <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" placeholder="Add a author" aria-describedby="authorHelper" value="{{old('author')}}" required>
        </div>
        @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="title">TITLE:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Add a title" aria-describedby="titleHelper" value="{{old('title')}}" required>
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="subtitle">SUBTITLE:</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Add a subtitle" aria-describedby="subtitleHelper" value="{{old('subtitle')}}" required>
        </div>
        @error('subtitle')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="image">IMAGE:</label>
            <input type="url" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Add a image" aria-describedby="imageHelper" value="{{old('image')}}">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="form-group">
            <label for="content">CONTENT:</label>
            <textarea name="content" id="content" class="form-control text-muted @error('content') is-invalid @enderror" rows="3" placeholder="Add a content">{{ old('content') }}</textarea>
        </div>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
        <button type="submit" class="btn btn-primary mr-3">CREATE</button>
        <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('admin.articles.index') }}">CANCEL</a></button>
    </form>
</div>
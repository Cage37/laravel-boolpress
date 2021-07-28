<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<h1 class="text-center pt-3 pb-3">EDIT ARTICLE</h1>


<div class="container pb-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="author">EDIT AUTHOR:</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="Edit author" aria-describedby="authorHelper" value="{{$article->author}}">
        </div>
        @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="title">EDIT TITLE:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Edit title" aria-describedby="titleHelper" value="{{$article->title}}">
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="subtitle">EDIT SUBTITLE:</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" placeholder="Edit subtitle" aria-describedby="subtitleHelper" value="{{$article->subtitle}}">
        </div>
        @error('subtitle')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <h4>Current image</h4>
            <img src="{{ $article->image }}" alt="">
        </div>
        <div class="form-group">
            <label for="image">CHANGE IMAGE:</label>
            <img src="{{ asset('storage/' . $article->image) }}" alt="">
            <input type="file" name="image" id="image">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="desc">EDIT CONTENT:</label>
            <textarea name="content" id="content" class="form-control text-muted" rows="3" placeholder="Edit content">
                {{$article->content}}
            </textarea>
        </div>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="category_id">EDIT CATEGORIES:</label>
            <select class="form-control" name="category_id" id="category_id">
              <option selected disabled>Select a category</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == old('category_id', $article->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          @error('category_id')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="tags">EDIT TAGS:</label>
            <select multiple class="form-control" name="tags[]" id="tags">
              <option value="" disabled>Select a tag</option>
                  @if($tags)
                  @foreach ($tags as $tag)
                  @if ($errors->any())
                  <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags')) ? 'selected' : '' }}>{{ $tag->name }}</option>
                  @else
                  <option value="{{ $tag->id }}" {{ $article->tags->contains($tag) ? 'selected' : '' }}>{{ $tag->name }}</option>
                  @endif  
                  @endforeach
                  @endif
            </select>
          </div>


        <button type="submit" class="btn btn-primary">EDIT</button>
    </form>
</div>
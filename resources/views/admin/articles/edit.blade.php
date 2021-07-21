<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<h1 class="text-center pt-3 pb-3">EDIT ARTICLE</h1>


<div class="container pb-5">
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="author">EDIT AUTHOR:</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="Edit author" aria-describedby="authorHelper" value="{{$article->author}}">
        </div>
        <div class="form-group">
            <label for="title">EDIT TITLE:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Edit title" aria-describedby="titleHelper" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label for="subtitle">EDIT SUBTITLE:</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" placeholder="Edit subtitle" aria-describedby="subtitleHelper" value="{{$article->subtitle}}">
        </div>
        <div class="form-group">
            <h4>Current image</h4>
            <img src="{{ $article->image }}" alt="">
        </div>
        <div class="form-group">
            <label for="image">EDIT IMAGE:</label>
            <input type="url" name="image" id="image" class="form-control" placeholder="Edit image" aria-describedby="imageHelper" value="{{$article->image}}">
        </div>
        <div class="form-group">
            <label for="desc">EDIT CONTENT:</label>
            <textarea name="content" id="content" class="form-control text-muted" rows="3" placeholder="Edit content">
                {{$article->content}}
            </textarea>
        </div>
       

        <button type="submit" class="btn btn-primary">EDIT</button>
    </form>
</div>
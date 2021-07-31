<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    
    <div id="app">

        <div class="jumbotron text-center">
            <h1 class="display-3">Vue-Articles</h1>
        </div>

        <div class="container d-flex flex-wrap">
            <div class="card text-left m-3" v-for="article in articles">
              <img width="100" height="250" class="card-img-top" :src="'storage/' + article.image" alt="">
              <div class="card-body">
                <h4 class="card-title">@{{article.title}}</h4>
              </div>
            </div>

        </div>

    </div>

</body>
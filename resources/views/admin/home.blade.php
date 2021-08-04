@extends('layouts.admin')

@section('content')

<div class="container mt-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <p>Ciao {{ Auth::user()->name }}</p>
                    @if(Auth::user()->api_token)
                    <h6>API TOKEN</h6>
                    @if(session('token'))
                    <div class="alert alert-success">
                        <strong>{{ session('token') }}</strong><br>
                        <small>Salva il token in un luogo sicuro</small>
                    </div>
                    @endif
                    {{-- <input type="password" value="{{ Auth::User()->api_token }}"> --}}
                    @endif

                    <form action="{{ route('admin.api_token') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary m-3">Generate API TOKEN</button>
                    </form>
                    If you want visit my <a href="{{ route('admin.articles.index') }}">ARTICLES</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

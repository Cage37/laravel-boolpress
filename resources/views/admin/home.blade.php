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
                    If you want visit my <a href="{{ route('admin.articles.index') }}">ARTICLES</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

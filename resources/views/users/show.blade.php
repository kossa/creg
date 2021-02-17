@extends('default')

@section('content')
    <h2>{{ $user->name }}'s Articles</h2>

    <div class="row">
        @foreach ($user->articles as $article)
            <div class="col-sm-4">
                @include('articles._single', compact('article'))
            </div>
        @endforeach

    </div>

@endsection

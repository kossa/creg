@extends('default')

@section('content')
    <h2>Liste des articles</h2>

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-sm-4">
                @include('articles._single', compact('article'))
            </div>
        @endforeach

        {{ $articles->links() }}
    </div>


@endsection

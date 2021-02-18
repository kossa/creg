@extends('default')

@section('content')
    <h2>Liste des articles</h2>

    @foreach ($articles->chunk(3) as $row)
        <div class="row">
            @foreach ($row as $article)
                <div class="col-sm-4">
                    @include('articles._single', compact('article'))
                </div>
            @endforeach
        </div>
    @endforeach

    {{ $articles->links() }}


@endsection

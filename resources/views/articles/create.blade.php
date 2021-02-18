@extends('default')

@section('content')

        <h1>New article for {{ auth()->user()->name }}</h1>
        <form action="{{ route('articles.store') }}" method='POST'>
            @csrf

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label>Published at</label>
                <input type="date" name="published_at" id="" class="form-control" value="{{ old('published_at') }}">
            </div>

            <div class="form-group">
                <label>Body</label>
                <textarea name="body" id="" cols="30" rows="2" class="form-control">{{ old('body') }}</textarea>
            </div>

            <button class="btn btn-block btn-lg btn-dark">Submit</button>

        </form>

@endsection

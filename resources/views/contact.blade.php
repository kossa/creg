@extends('default')

@section('content')
    <h1>Contact</h1>

    <form action="/contact" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="subject" class="form-control mb-2" placeholder="Subject">


        <textarea name="message" id="" cols="30" rows="10" class="form-control mb-2" placeholder="Message"></textarea>

        <input type="file" name="cv" class="form-control mb-2">

        <button class="btn btn-success">Send</button>
    </form>
@endsection

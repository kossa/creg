@extends('default')

@section('content')

        <h1>Edit user {{ $user->name }}</h1>

        <form action="{{ route('users.update', $user) }}" method='POST'>
           @method('PUT')
            @csrf

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" id="" class="form-control" value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="" class="form-control"  value="{{ old('email', $user->email) }}">
            </div>

            <div class="form-group">
                <label>phone</label>
                <input type="text" name="phone" id="" class="form-control"  value="{{ old('phone', $user->phone) }}">
            </div>

            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>

            <div class="form-group">
                <label>Repeat password</label>
                <input type="password" name="password_confirmation" id="" class="form-control">
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" id="" cols="30" rows="2" class="form-control">{{ old('address', $user->address) }}</textarea>
            </div>

            <button class="btn btn-block btn-lg btn-dark">Submit</button>

        </form>

@endsection

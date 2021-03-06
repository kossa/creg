@extends('default')

@section('content')

        <h1>New user</h1>
        <mark>MArked text</mark>
        <form action="{{ route('users.store') }}" method='POST'>
            @csrf

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="" class="form-control"  value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>phone</label>
                <input type="text" name="phone" id="" class="form-control"  value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label>Roles</label>
                @php
                    $roles = App\Models\Role::all();
                @endphp
                <select name="roles[]" class="form-control" multiple style='height: 150px'>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
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
                <textarea name="address" id="" cols="30" rows="2" class="form-control">{{ old('address') }}</textarea>
            </div>

            <button class="btn btn-block btn-lg btn-dark">Submit</button>

        </form>

@endsection

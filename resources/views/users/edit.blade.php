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
                <label>Roles</label>
                @php
                    $roles = App\Models\Role::all();
                    $user_roles_id = $user->roles->pluck('id')->toArray();
                @endphp
                <select name="roles[]" class="form-control" multiple style='height: 150px'>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ in_array($role->id, $user_roles_id) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
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

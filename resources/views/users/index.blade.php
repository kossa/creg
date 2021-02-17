@extends('default')

@section('content')

        <h1>List users</h1>

        <a class="btn btn-outline-danger my-4" href="/users/create">Add</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Créé le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)

                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->created_at_formatted }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-info"><i class="fas fa-pencil-alt    "></i></a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger"><i class="fas fa-trash    "></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}

@endsection

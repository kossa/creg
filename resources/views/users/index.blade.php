@extends('default')

@section('content')

        <h1>List users</h1>

        <a class="btn btn-outline-danger my-4" href="/users/create">Add</a>

        <form action="" class="form-inline my-3">
            <input type="search" name="q" class="form-control" placeholder="Recherche" value="{{ request('q') }}">
            <button class="btn btn-info"><i class="fas fa-search"></i></button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><a href="?orderBy=name">Name</a></th>
                    <th><a href="?orderBy=email">Email</a></th>
                    <th><a href="?orderBy=phone">Phone</a></th>
                    <th><a href="?orderBy=address">Address</a></th>
                    <th><a href="?orderBy=created_at">Créé le</a></th>
                    <th><a href="?orderBy=created_at">Nb articles</a></th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)

                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{!! $user->nameSearched !!}</td>
                        <td>{!! $user->emailSearched !!}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{!! $user->addressSearched !!}</td>
                        <td>{{ $user->created_at_formatted }}</td>
                        <td>{{ $user->articles_count }}</td>
                        <td>{{ $user->roles->implode('name', ', ') }}</td>
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

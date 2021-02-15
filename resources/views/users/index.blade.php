<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css' integrity='sha512-vZWT27aGmde93huNyIV/K7YsydxaafHLynlJa/4aPy28/R1a/IxewUH4MWo7As5I33hpQ7JS24kwqy/ciIFgvg==' crossorigin='anonymous'/>
    </head>

    <body>

        <div class="container my-5">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif

            <script>
              $(".alert").alert();
            </script>

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
                            <td>
                                <a href="" class="btn btn-outline-info"><i class="fas fa-pencil-alt    "></i></a>
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
        </div>

    </body>
</html>

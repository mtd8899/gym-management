<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name', 'project name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container m-auto m-5 p-5">
    <div class="container border border-primary  justify-content-center">
        <h1 class="text-center mt-2">Gym Management</h1>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Membership Type</th>
                    <th scope="col">Membership Exp.</th>
                </tr>
            </thead>
            <tbody>
                @if (count($members) > 0)
                    @foreach ($members as $member)
                    <tr>
                        <th scope="row">{{ $member->id }}</th>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->membership_type }}</td>
                        <td>{{ $member->membership_expiration }}</td>
                        <td>
                            <a  href="{{ route('edit-member', $member->id) }}" type="button"  class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <a  href="{{ route('delete-member', $member->id) }}" type="button"  class="btn btn-primary btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center"> No Member yet.</td>
                </tr>
                @endif
            </tbody>
        </table>

        <button type="button" data-bs-toggle="modal" data-bs-target="#addMemberModal" class="btn btn-primary btn-sm mb-3">
            New Member
        </button>
        
        <!-- Add member modal -->
        <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add a new member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('new-member') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>

                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                
                                <label for="mem-date" class="form-label">Membership Type</label>
                                <input type="text" class="form-control" id="mem-date" name="membership_type" required>

                                <label for="mem-exp" class="form-label">Membership Exp.</label>
                                <input type="date" class="form-control" id="mem-exp" name="membership_expiration" equired>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

@extends('layout');

@section('content')
<div class="shadow p-4 mt-2">
    <h4 class="">Trainer</h4>
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
                <th scope="col">Specialization</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($trainers) > 0)
                @foreach ($trainers as $trainer)
                <tr>
                    <th scope="row">{{ $trainer->id }}</th>
                    <td>{{ $trainer->name }}</td>
                    <td>{{ $trainer->email }}</td>
                    <td>{{ $trainer->specialization }}</td>
                    <td>{{ $trainer->phone }}</td>
                    <td>
                        <a  href="{{ route('edit-trainer', $trainer->id) }}" type="button"  class="btn btn-danger btn-sm">Edit</a>
                        <a  href="{{ route('delete-trainer', $trainer->id) }}" type="button"  class="btn btn-primary btn-sm"> Delete</a>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center"> No trainer Yet.</td>
            </tr>
            @endif
        </tbody>
    </table>

    <button type="button" data-bs-toggle="modal" data-bs-target="#addtrainerModal" class="btn btn-dark">
        New trainer
    </button>

    <!-- Add trainer modal -->
    <div class="modal fade" id="addtrainerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add a new trainer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('new-trainer') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control mb-2" id="name" name="name" required>

                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control mb-2" id="email" name="email" required>
                            
                            <label for="spec" class="form-label">Specialization</label>
                            <input type="text" class="form-control mb-2" id="spec" name="specialization" required>
                            
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" equired>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary" style="width: 150px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@stop
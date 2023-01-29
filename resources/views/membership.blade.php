@extends('layout');

@section('content');
<div class="shadow p-4 mt-2">
    <h4 class="">Membership</h4>
    @if (session('success'))
    <div class="alert alert-success" role="alert"> 
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Membership Type</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($memberships) > 0)
                @foreach ($memberships as $membership)
                <tr>
                    <th scope="row">{{ $membership->id }}</th>
                    <td>{{ $membership->membership_type }}</td>
                    <td>{{ $membership->membership_price }}</td>
                    <td>
                        <a  href="{{ route('edit-membership', $membership->id) }}" type="button"  class="btn btn-danger btn-sm">Edit</a>
                        <a  href="{{ route('delete-membership', $membership->id) }}" type="button"  class="btn btn-primary btn-sm"> Delete</a>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center"> No membership yet.</td>
            </tr>
            @endif
        </tbody>
    </table>

    <button type="button" data-bs-toggle="modal" data-bs-target="#addMembershipModal" class="btn btn-dark">
        New Membership
    </button>

    <!-- Add membership modal -->
    <div class="modal fade" id="addMembershipModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add a new membership</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('new-membership') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="">
                            <label for="type" class="form-label">Membership Type</label>
                            <input type="text" class="form-control mb-2" id="type" name="membership_type" required>

                            <label for="price" class="form-label">Price</label>
                            <input type="price" class="form-control" id="price" name="membership_price" required>
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
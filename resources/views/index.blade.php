@extends('layout');

@section('content')
<div class="shadow p-4 mt-2">
    <h4 class="">Member</h4>
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
                <th scope="col">Trainer</th>
                <th scope="col">Membership Exp.</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($members) > 0)
                @foreach ($members as $member)
                <tr>
                    <th scope="row">{{ $member->id }}</th>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->membership->membership_type }}</td>
                    <td>{{ $member->trainer->name }}</td>
                    <td>{{ $member->membership_expiration }}</td>
                    <td>
                        <a  href="{{ route('edit-member', $member->id) }}" type="button" data-bs-target="#editMemberModal"  class="btn btn-primary btn-sm">Edit</a>
                        <a  href="{{ route('delete-member', $member->id) }}" type="button"  class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center"> No Member Yet.</td>
            </tr>
            @endif
        </tbody>
    </table>

    <button type="button" data-bs-toggle="modal" data-bs-target="#addMemberModal" class="btn btn-dark">
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
                    <div class="modal-body pt-2">
                        <div class="">
                            <label for="name" class="form-label mb-0">Name</label>
                            <input type="text" class="form-control mb-2" id="name" name="name" required>

                            <label for="email" class="form-label mb-0">Email</label>
                            <input type="email" class="form-control mb-2" id="email" name="email" required>
                            
                            <label for="mem-type" class="form-label mb-0">Membership type</label>
                            <select class="form-select mb-2" id="mem-type" name="membership_id" required>
                                @if(count($memberships) > 0)
                                    <option value="" selected><p class="text-muted">--- Please choose type of membership ---</p></option>
                                    @foreach($memberships as $membership)
                                        <option value="{{$membership->id}}">{{$membership->membership_type}} | {{$membership->membership_price}}</option>
                                    @endforeach
                                @else                                
                                    <option value="" selected><p class="text-muted">--- Please add membership first. ---</p></option>
                                @endif
                            </select>

                            <label for="mem-exp" class="form-label mb-0">Membership Exp.</label>
                            <input type="date" class="form-control mb-2" id="mem-exp" name="membership_expiration" required>
                            
                            <label for="trainer_id" class="form-label mb-0">Trainer</label>
                            <select class="form-select" name="trainer_id" id="trainer_id" required>
                                @if(count($trainers) > 0)
                                    <option value="" selected><p class="text-muted">--- Please choose trainer ---</p></option>
                                    @foreach($trainers as $trainer)
                                        <option value="{{$trainer->id}}">{{$trainer->name}} | {{$trainer->specialization}}</</option>
                                    @endforeach
                                @else
                                    <option value="" selected><p class="text-muted">--- Please add trainer first ---</p></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-0 pe-3">
                        <button type="submit" class="btn btn-primary" style="width: 150px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
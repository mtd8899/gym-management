@extends('layout')

@section('content')
<div class="shadow px-4 pt-3 pb-2 col-6 m-auto">
    <h4 class="">Edit Membership</h4>
    <form method="POST" action="{{ route('update-member') }}"> 
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label mb-0">Name</label>
            <input type="text" class="form-control mb-2" id="name" name="name" value="{{ $member->name }}" required>  
            
            <label for="email" class="form-label mb-0">Email</label>
            <input type="email" class="form-control mb-2" id="email" name="email" value="{{ $member->email }}" required>
 
            <label for="email" class="form-label mb-0">Membership type</label>
            <select class="form-select mb-2" name="membership_id">
                @foreach ($memberships as $membership)
                <option {{ $member->membership_id == $membership->id ? 'selected' : '' }} value="{{ $membership->id }}">{{ $membership->membership_type }} | {{ $membership->membership_price }}</option>
                @endforeach
            </select>
            
            <label for="email" class="form-label mb-0">Trainer</label>
            <select class="form-select mb-2" name="trainer_id">
                @foreach ($trainers as $trainer)
                <option {{ $member->trainer_id == $trainer->id ? 'selected' : '' }} value="{{ $trainer->id }}">{{ $trainer->name }} | {{ $trainer->specialization }}</option>
                @endforeach
            </select>
            
            <label for="mem-exp" class="form-label mb-0">Membership Exp.</label>
            <input type="date" class="form-control mb-2" id="mem-exp" name="membership_expiration" value="{{ $member->membership_expiration }}" required>
           
            <input type="hidden" name="id" value="{{ $member->id }}">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Submit</button>

    </form>
</div>
@stop
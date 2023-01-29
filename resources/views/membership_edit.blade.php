@extends('layout');

@section('content')
<div class="shadow px-4 pt-3 pb-2 col-6 m-auto">
    <h4 class="">Edit Membership</h4>
    <form method="POST" action="{{ route('update-membership') }}"> 
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label mb-0">Type</label>
            <input type="text" class="form-control mb-2" id="type" name="membership_type" value="{{ $membership->membership_type }}" required>
            
            <label for="price" class="form-label mb-0">Price</label>
            <input type="text" class="form-control mb-2" id="price" name="membership_price" value="{{ $membership->membership_price }}" required>

            <input type="hidden" name="id" value="{{ $membership->id }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@stop
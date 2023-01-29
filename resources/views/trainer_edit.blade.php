@extends('layout');

@section('content')
<div class="shadow px-4 pt-3 pb-2 col-6 m-auto">
    <h4 class="">Edit Trainer</h4>
    <form method="POST" action="{{ route('update-trainer') }}"> 
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label mb-0">Name</label>
            <input type="text" class="form-control mb-2" id="name" name="name" value="{{ $trainer->name }}" required>  
            
            <label for="email" class="form-label mb-0">Email</label>
            <input type="email" class="form-control mb-2" id="email" name="email" value="{{ $trainer->email }}" required>

            <label for="spec" class="form-label mb-0">Specialization</label>
            <input type="text" class="form-control mb-2" id="spec" name="specialization" value="{{ $trainer->specialization }}" required>
            
            <label for="phone" class="form-label mb-0">Phone</label>
            <input type="text" class="form-control mb-0" id="phone" name="phone" value="{{ $trainer->phone }}" required>

            <input type="hidden" name="id" value="{{ $trainer->id }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@stop
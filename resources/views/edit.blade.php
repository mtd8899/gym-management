<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name', 'project name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container col-6 m-5 p-5 m-auto">
        <form method="POST" action="{{ route('update-member') }}"> 
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>  
                
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>

                <label for="mem-type" class="form-label">Membership Type</label>
                <input type="text" class="form-control" id="mem-type" name="membership_type" value="{{ $member->membership_type }}" required>
                
                <label for="mem-exp" class="form-label">Membership Exp.</label>
                <input type="date" class="form-control" id="mem-exp" name="membership_expiration" value="{{ $member->membership_expiration }}" required>

                <input type="hidden" name="id" value="{{ $member->id }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</body>
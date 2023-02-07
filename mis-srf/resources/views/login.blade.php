@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center" style="margin-top: 10%">
    <div class="card w-50 shadow-sm">
        <div class="card-body">
            <div class="my-2">
                <label for="">Username</label>
                <input type="text" class="form-control" placeholder="Username">
            </div>
            <div class="my-2">
                <label for="">Password</label>
                <input type="text" class="form-control" placeholder="Password">
            </div>
            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-success">Login</button>
            </div>
        </div>
    </div>
</div>
@endsection
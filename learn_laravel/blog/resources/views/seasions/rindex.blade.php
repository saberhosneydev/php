@extends('layout')

@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col-6">
        <form class="card-body" method="POST" action="/register">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="UserName">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
        @endforeach
    </div>
    <div class="col"></div>
</div>
@endsection

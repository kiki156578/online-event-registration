@extends('layouts.app')
@section('title','- registration')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
        <h4>Registration Form</h4>
        <hr>
        <form action="{{route('register-handler')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-succuess">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
        @csrf
            <!-- <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter Full Name"
                name="name" value="">
            </div> -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter Email"
                name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email') {{$message}}@enderror </span>
            </div>
            <div class="form-group">
                <label for="userid">User ID</label>
                <input type="text" class="form-control" placeholder="Enter your USER ID"
                name="uid" value="{{old('uid')}}">
                <span class="text-danger">@error('uid') {{$message}}@enderror </span>
            </div>
            <div class="form-group">
                <label for="upw">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password"
                name="upw" value="">
                <span class="text-danger">@error('upw') {{$message}}@enderror </span>
            </div>
      
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Register</button>
            </div>
            <a href="/login">Existing user? Click here</a>
        </form>
</div>

</div>
@endsection
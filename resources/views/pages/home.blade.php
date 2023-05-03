@extends('layouts.app')
@section('title','- login')
@section('content')
<div class=container>
   <div><h1>Welcome to online event Registration System!!</h1></div>
   <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
   @if(!Session()->has('loginId'))
   <div><a href="/login">Login here</div>
   <div><a href="/registration">Register here</div>
   @endif
</div>
</div>
@endsection
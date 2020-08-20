@extends('layouts.master')
@section('body')
<div class = "row" >
  <div class="col-md-4 offset-md-4" id = "signup-form">
    <div class="alert alert-dark" role="alert">
      registration successful, click <a href="{{url('login')}}">here</a> to login
    </div>
  </div>
</div>

@endsection
@extends('layouts.master')
@section('body')
<div class = "row" >
<div class="col-md-4 offset-md-4" id = "signup-form">
  <form method="POST" action="{{ route('login') }}">
                        @csrf
    <div class="form-group">
    <div class="fake-input">
        <input type="Email" name='email' class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Email">
        <img src="{{url('assets/images/form_icon.png')}}" width=25 />
        @error('password')
        <label  class="error"><strong>{{ $message }}</strong></label>
        @enderror
    </div>
    </div>
    <div class="form-group">
        <div class="fake-input">
            <input type="password" name='password' class="form-control @error('password') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Password">
        
            <img src="{{url('assets/images/form_icon.png')}}" width=25 />
        </div>
        @error('password')
        <label  class="error"><strong>{{ $message }}</strong></label>
        @enderror
    </div>
    <input type="submit" value="Sign in" class="btn form-btn  bcg-dark btn-block">
    </form>
</div>
</div>
@endsection
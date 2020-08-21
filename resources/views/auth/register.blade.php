@extends('layouts.master')
@section('body')
<div class = "row" >
<div class="col-md-4 offset-md-4" id = "signup-form">
    <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
    <div class="fake-input">
        <input type="text" name = 'name' class="form-control  @error('name') is-invalid @enderror"" id="" placeholder="Name">
        <img src="{{url('assets/images/form_icon.png')}}" width=25 />
    </div>
    @error('name')
    <label  class="error"><strong>{{ $message }}</strong></label>
    @enderror
    </div>
    <div class="form-group">
    <div class="fake-input">
        <input type="Email" name = 'email' class="form-control  @error('email') is-invalid @enderror" id="" placeholder="Email">
        <img src="{{url('assets/images/form_icon.png')}}" width=25 />
    </div>
    @error('email')
        <label  class="error"><strong>{{ $message }}</strong></label>
    @enderror
    </div>
    <div class="form-group">
        <div class="fake-input">
            <input type="password" name='password' class="form-control  @error('password') is-invalid @enderror" id="" placeholder="Password">
        
            <img src="{{url('assets/images/form_icon.png')}}" width=25 />
        </div>
    </div>
    <div class="form-group">
        <div class="fake-input">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
        
            <img src="{{url('assets/images/form_icon.png')}}" width=25 />
        </div>      
        @error('password')
        <label  class="error"><strong>{{ $message }}</strong></label>
        @enderror
    </div>
    <input type="submit" value="Sign Up" class="btn form-btn  bcg-dark btn-block">
    </form>
</div>
</div>
@endsection
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
        <input type="text" name = 'price' class="form-control  @error('price') is-invalid @enderror" id="" placeholder="Email">
        <img src="{{url('assets/images/form_icon.png')}}" width=25 />
    </div>
    @error('price')
        <label  class="error"><strong>{{ $message }}</strong></label>
    @enderror
    </div>
    <div class="file-field">
    <div class="btn btn-primary btn-sm float-left">
      <span>Choose file</span>
      <input type="file">
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text" placeholder="Upload your file">
    </div>
  </div>
    <input type="submit" value="Sign Up" class="btn form-btn  bcg-dark btn-block">
    </form>
</div>
</div>
@endsection
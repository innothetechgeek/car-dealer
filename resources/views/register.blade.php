@extends('layouts.master')
@section('body')
<div class = "row" >
<div class="col-md-4 offset-md-4" id = "signup-form">
    <form>
    <div class="form-group">
    <div class="fake-input">
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
        <img src="{{url('assets/images/form_icon.png')}}" width=25 />
    </div>
    </div>
    <div class="form-group">
    <div class="fake-input">
        <input type="Email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
        <img src="{{url('assets/images/form_icon.png')}}" width=25 />
    </div>
    </div>
    <div class="form-group">
        <div class="fake-input">
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
        
            <img src="{{url('assets/images/form_icon.png')}}" width=25 />
        </div>
    </div>
    <input type="submit" value="Register" class="btn form-btn  bcg-dark btn-block">
    </form>
</div>
</div>
@endsection
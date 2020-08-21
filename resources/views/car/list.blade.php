@extends('layouts.master')
@section('jumbotron')
    <section class="jumbotron">
            <div class="container">
            <h1 class="jumbotron-heading">Dashboard</h1>
            <p class="lead text-muted">Welcome Username here are all your listings.</p>
            <p>
                <a href="#" class="btn btn-primary my-2 bcg-dark">Add New Listing</a>
            </p>
            </div>
    </section>
@endsection
@section('body')      
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{asset('/assets/images/car_place_holder.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <h6 class="card-subtitle mb-2 text-muted">2020/07/08 13:56</h6>
                        <p class="card-text">Your price is $price.</p>
                        <div class="d-flex justify-content-end">      
                            <small class="del-item">delete item</small>                     
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{asset('/assets/images/car_place_holder.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <h6 class="card-subtitle mb-2 text-muted">2020/07/08 13:56</h6>
                        <p class="card-text">Your price is $price.</p>
                        <div class="d-flex justify-content-end">      
                            <small class="del-item">delete item</small>                     
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{asset('/assets/images/car_place_holder.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <h6 class="card-subtitle mb-2 text-muted">2020/07/08 13:56</h6>
                        <p class="card-text">Your price is $price.</p>
                       <div class="d-flex justify-content-end">      
                            <small class="del-item">delete item</small>                     
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{asset('/assets/images/car_place_holder.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <h6 class="card-subtitle mb-2 text-muted">2020/07/08 13:56</h6>
                        <p class="card-text">Your price is $price.</p>
                        <div class="d-flex justify-content-end">      
                            <small class="del-item">delete item</small>                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endsection

 
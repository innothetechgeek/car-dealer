@extends('layouts.master')
@section('jumbotron')
    <section class="jumbotron">
            <div class="container">
            <h1 class="jumbotron-heading">Dashboard</h1>
            <?php $user = Auth::user(); ?>
            <p class="lead text-muted">Welcome {{ $user->name }} here are all your listings.</p>
            <p>
                <a href="{{ route('addcar') }}" class="btn btn-primary my-2 bcg-dark">Add New Listing</a>
            </p>
            </div>
    </section>
@endsection
@section('body')      
    <div class="row">
    @foreach ($cars as $car)
        <div class="col-md-3">
            <div class="card mb-4 box-shadow">
            <?php 
                 $exists = Storage::disk('public_images')->exists($car->image);
                $image = $exists ? "assets/images/".$car->image : 'assets/images/uploads/vehicle-placeholder.png';
               
            ?>
                <img class="card-img-top" src="{{ asset($image) }}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">{{$car->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$car->created_at}}</h6>
                    <p class="card-text">Your price is R{{$car->price}}</p>
                    <div class="d-flex justify-content-end">      
                        <small class="del-item">delete item</small>                     
                    </div>
                </div>
            </div>
        </div>
    @endforeach           
    </div>
@endsection

 
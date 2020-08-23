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
                <div class="card mb-4 box-shadow" data-toggle="tooltip" data-placement="top" title="Edit this item">
                <a href="{{ url('car/edit/'.$car->id) }}">
                    <?php 
                        $exists = Storage::disk('public_images')->exists($car->image);
                        $image_path = $exists ? "assets/images/".$car->image : 'assets/images/uploads/vehicle-placeholder.png';
                    
                    ?>
                    <img  height = '165' class="card-img-top" src="{{ asset($image_path) }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{$car->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$car->created_at}}</h6>
                        <p class="card-text">Your price is R{{$car->price}}</p>
                </a>
                        <div class="d-flex justify-content-end">      
                            <small id = "car_{{$car->id}}" style = "cursor:default" class="del-item" data-title="Delete Car?">delete item</small>                     
                        </div>
                    </div>
                </div>
            
        </div>
    @endforeach           
    </div>  


    @section('scripts')
   
    <!-- loads jquery confirmation plugin -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-confirm.min.js') }}"></script>
    <script>
    
    //delete car
    $( 'body').on('click', '.del-item', function(e){
        showConfirmationModal($(this),e);
    });
    
    //show confirmation modal
      /*jquery confirmation modal - documentation available here: https://craftpip.github.io/jquery-confirm */
    function showConfirmationModal(input_id,e){
        $.confirm({
            title: 'Confirm!',
            content: 'Are you sure you want to delete this car?',
            buttons: {
                yes: {
                    text: 'Yes',
                    action: function (){
                        deleteCar(input_id,e);
                    }
                },
                no: {
                    text: 'No',
                    action: function () {
                    }
                }
            }
        });
    }
    
    //delete car
    function deleteCar(input_id,e){
        e.preventDefault();
        var id = input_id.attr('id');
        var car_id = id.split('_')[1];
        var _token   = $('meta[name="csrf-token"]').attr('content');
        var route  = "{{ url('car/delete') }}";
           
        $.ajax({
        url: route,
        type:"POST",
        data:{
           car_id:car_id,
          _token: _token
        },
        success:function(response){
          if(response) {
            window.location=response.url;
            $('.success').text(response.success);
            $("#ajaxform")[0].reset();
          }
        },
       });

    }

    function applyAmimationAfterAddOrEdit(itemId){
        setTimeout(function(){
            $("#car_"+itemId).closest('.card').animate({
            height: 'toggle'
            },1000, 'linear').animate({
            height: 'toggle'
            },1000, 'linear');
        },2000);


        $('html, body').animate({
        scrollTop: $("#car_"+itemId).closest('.card').parent().offset().top-130
    }, 2000);
    }

    //displays 'car deleted/updated successfully' after deleting a car
    function showToast(message){
        $.toast({
                heading: 'Success',
                text: message,
                showHideTransition: 'slide',
                hideAfter: 5000,
        });
    }

    </script> 

    <!-- show toast at the bottom of the page -->
    <?php if(Session::has('status')){ ?>
            <script>

            var message = "<?php echo Session::get('status')['message'] ?>";
            var item_id = "<?php echo 
                                isset(Session::get('status')['car_id']) ? Session::get('status')['car_id'] : '' ?>";
            showToast(message);
            if(item_id != '')applyAmimationAfterAddOrEdit(item_id);       
            
            </script>
            
            <?php         

        }  ?>       

    @endsection
    
@endsection

 
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
                        <small id = "car#{{$car->id}}" class="del-item" data-title="Delete Car?">delete item</small>                     
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

    $( 'body').on('click', '.del-item', function(){
        showConfirmationModal($(this));
    });
      /*jquery confirmation modal - documentation available here: https://craftpip.github.io/jquery-confirm */
    function showConfirmationModal(input_id){
        $.confirm({
            title: 'Confirm!',
            content: 'Are you sure you want to delete this car?',
            buttons: {
                yes: {
                    text: 'Yes',
                    action: function (){
                        deleteCar(input_id);
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

    function deleteCar(input_id){
        var id = input_id.attr('id');
        var car_id = id.split('#')[1];
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
    </script> 

<?php if(Session::get('status') !== null){ ?>
        <script>
          var status = "<?php echo Session::get('status') ?>";
           $.toast({
                heading: 'Success',
                text: status,
                showHideTransition: 'slide',
                icon: 'info'
            });
        </script>
    <?php } ?>    


    @endsection
    
@endsection

 
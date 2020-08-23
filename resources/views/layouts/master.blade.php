<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">

    <!-- jquery confirmation -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jquery-confirm.min.css') }}">  

    <!-- jquery toast plugin -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jquery.toast.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Cars for Sale in South Africa - Car Dealer</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bcg-dark box-shadow">
      <div class ='container'>
    <a class="navbar-brand" href="{{ route('/') }}"><strong>DealerApp</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            @if (!Auth::guest())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                </form>
            </li>
            @endif
        </ul>
        <span class="navbar-text">
        <img src="{{asset('/assets/images/logo.png')}}">
        </span>
    </div>
    </div>
    </nav>
      @yield('jumbotron')

    <div class=container>   

        @yield('body')

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <!-- jquery toast plugin -->
     <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.toast.js') }}"></script>
           <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    @yield('scripts');
    <!-- Footer -->
<footer class="page-footer font-small blue">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2020 K Mphokeli
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
  </body>
</html>
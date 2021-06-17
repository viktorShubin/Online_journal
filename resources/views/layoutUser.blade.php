<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="{{asset('css/sidebar/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/customStyle.css')}}">

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">






    <style>
        .logoImg{
            border-radius: 18px!important;
        }


            </style>










    <meta name="csrf_token" content="{{csrf_token()}}">
  </head>
  <body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
            <div class="p-4 pt-5">
                <img class="logoImg" src="{{ asset('img/logon.jpg') }}" alt="">
              <h1><a href="{{url('myGroup')}}" class="logo">Электронный журнал</a></h1>
              <ul class="list-unstyled components mb-5">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Выход') }}
                        </x-dropdown-link>
                    </form>
                </li>


                </ul>

      </div>
    </nav>

    <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5 pt-5">
    @yield('contentt')


  </div>
    </div>


     <script src="{{ asset('js/sidebar/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sidebar/popper.js') }}"></script>
    <script src="{{ asset('js/sidebar/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sidebar/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sidebar/main.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>


</body>
</html>

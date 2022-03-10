<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="{{('admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{('admin/img/favicon.png')}}">

    <!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!--     Fonts and icons     -->

<script src="https://kit.fontawesome.com/5a6c72128d.js" crossorigin="anonymous"></script><link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<!-- Nucleo Icons -->
<link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
<link href=".{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> 
        @yield('title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootsrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">   
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
   {{-- fontawsome --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <style>
      a{
        text-decoration:none;
      }
    </style>
</head>
<body>
  <div class="content">
    @include('layouts.inc.frontnavbar')
    @include('layouts.inc.sidebar')
    @yield('content')
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}} "></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}} "></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}} "></script>
<script src="{{asset('frontend/js/custom.js')}} "></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>
    var availableTags = [];
    $.ajax({
      type: "GET",
      url: "product-list",
      success: function (response) {
        // console.log(response);
        startAutoComplete(response);
      }
    });
     
    function startAutoComplete( availableTags) {
      
      $( "#search_product" ).autocomplete({
        source: availableTags
      });
    }
      </script>

{{-- sweetalert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('status'))
<script>
  swal("Good job!", "{{session('status')}} ", "success");
</script>

@endif
@yield('scripts')






 <!-- Github buttons -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
 

</body>
</html>

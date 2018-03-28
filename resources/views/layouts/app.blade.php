<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')

    <title>{{ config('app.name', 'Beef Up') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
    <!-- Beef Up -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Others Styles
     -->
    @yield('style')
    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container"> <!--menu_fixed footer_fixed-->
        
        @include('includes.sidebar')

        @include('includes.topbar')        

        <!-- page content -->
        <div class="right_col" role="main">
            @include('flash::message')
            @yield('content')
        </div>
        <!-- /page content -->

        @include('includes.footer')

      </div>
    </div>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <!-- Beef Up -->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Others  Scripts -->
	@yield('script')
  </body>
</html>

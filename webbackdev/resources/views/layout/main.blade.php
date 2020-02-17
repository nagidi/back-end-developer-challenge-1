<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title> @yield('title') </title>
        <!-- Fevicon -->
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       


        <!-- Start CSS -->   
        @yield('style')
        <!-- End CSS -->
        <!-- Global Spark Object -->
        
        <script src="{{ asset('js/app.js') }}" ></script>
       
    </head>
    <div class="container">

     
     

                   
            @yield('content')
            <!-- End Rightbar --> 
        </div>
        <!-- End Containerbar -->
        <!-- Start JS -->  
        
        
        @yield('script')
        <!-- End JS -->
    </body>
</html>    
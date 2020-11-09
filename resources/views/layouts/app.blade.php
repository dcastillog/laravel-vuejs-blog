<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('meta-title', env('APP_NAME') . " | Blog")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description', 'Blog de LaraBlog')">
    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- CURRENT USER --}}
    <meta name="user" content="{{ Auth::user() }}">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">
    <!-- Bootstrap -->  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->  
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        .carousel {
            width: 640px; 
            height: 360px; 
            }
    </style>
</head>
<body>
    <div id="app">
    
        @yield('content')

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html> 
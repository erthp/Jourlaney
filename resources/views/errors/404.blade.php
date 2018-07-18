<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Jourlaney</title>
        <link rel="shortcut icon" type="image/png" href="favicon.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link href="{{ URL::asset('css/jourlaney.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.mask.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/parsley.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jourlaney.js') }}"></script>
    </head>

    <body style="background-color:#36D7B7;">
        <nav class="navbar navbar-expand-lg fixed-top animated fadeInDown" id="jourlaNav-alone">
            <div class="container">
                <div class="text-center"><a href="/" class="titletext">Jourlaney</a></div>
        </nav>
        <div class="container">
            <h1 class="text-center errornumber animated pulse">404</h1>
            <h3 class="text-center errormsg animated fadeInDown">Page not found</h3>
            <h3 class="text-center errormsg animated fadeInDown">but <a href="/">Jour(la)ney</a> is never ending here.</h3>
        </div>
    </body>
</html>
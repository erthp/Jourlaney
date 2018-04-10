<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Jourlaney</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
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

<body>
    <div class="container">
        <div class="homepic">
            <nav class="navbar navbar-light clearbg">
                <a class="navbar-brand clearbg titletext" href="#">
                    <img src="favicon.png" width="30" height="30" class="d-inline-block align-top=" alt="">
                    <span class="titletext">Jourlaney</span>
                </a>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="btn-nav">
                            <a class="btn btn-outline-light btn-small navbar-btn clearbg" data-toggle="modal" data-target="#register-popup">Sign up</a>
                            <a class="btn btn-outline-light btn-small navbar-btn clearbg" data-toggle="modal" data-target="#login-popup">Log in</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div id="login-popup" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 align="center">Log in</h4>
                    </div>
                    <div class="container">
                    <div class="col-12">
                    <form method="POST" name="register-form">
                        <div class="form-group">
                    <label class="register-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="register-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
               </div>
               </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Log in</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
            <div>
            <div id="register-popup" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <div class="row">
                                    <div class="col-md-12 text-center">
                                      <h4>I am ...</h4>
                                    </div>
                                </div>
                                <div class="row">
                                <center>
                                  <a href="guideregister" ><img src = "../images/guide.png"></a>
                                  <a href="touristregister" ><img src = "../images/tourist.png"></a>
                                </center>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                <!--<h1 class="hometext">Let's tour
                    <br/>THAILAND</h1>-->
            </div>
            <div class="row clearbg">
                <div class="col-lg">
                    <div class="clearbg">
                        <input type="text" class="searchbox" name="search" placeholder="Where to go?">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('page')
    </div>
</body>

</html>
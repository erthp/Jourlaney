<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Jourlaney</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="{{ URL::asset('pg-calendar/dist/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="{{ URL::asset('css/jourlaney.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.mask.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/parsley.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('pg-calendar/dist/js/pignose.calendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jourlaney.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top animated fadeInDown" id="jourlaNav-alone">
        <div class="container">
            <a href="/"><img src="favicon.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
            <a href="/" class="titletext">JOURLANEY</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <div class="btn-nav">
            @if(!empty(Session::get('username')))
            <div class="navbar-header">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                    	<a class="dropdown" data-toggle="dropdown" href="#">
                        	<img src="../pic/bell.png" class="mr-3">
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                                    <!-- <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-comment fa-fw"></i> New Comment
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-tasks fa-fw"></i> New Task
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="text-center" href="#">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li> -->
                        </ul>
                    </li>
                            <!-- dropdown-alerts -->
                    <li class="dropdown">
                        <a class="dropdown" data-toggle="dropdown" href="#" class="mr-3">
                            <img src="../pic/chat.png" class="mr-3">
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                                    <!-- <li>
                                        <a href="#">
                                            <div>
                                                <strong>John Smith</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <strong>John Smith</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <strong>John Smith</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="text-center" href="#">
                                            <strong>Read All Messages</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li> -->
                        </ul>
                    </li>
                            <!-- dropdown-alerts -->
                    <li class="dropdown">
                        <a class="dropdown" data-toggle="dropdown" href="#">
                        <img src="../images/profilepic/{{Session::get('profileImage')}}" class="profileImageNav"><p class="username">{{Session::get('username')}}</p>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="Profile/{{Session::get('username')}}" class="userDropdown">Profile</a>
                        </li>
                        <li>
                            <a href="editprofile" class="userDropdown">Edit Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <form method="POST" name="logout-form" id="logout-form" action="{{ URL::to('/logout') }}"> 
                                {{ csrf_field() }}
                                <a onclick="document.getElementById('logout-form').submit()" class="userDropdown">Logout</a>
                            </form>
                        </li>
                    </li>

                <!-- <a href="profile">{{Session::get('username')}}</a>
                <form method="POST" name="logout-form" id="logout-form" action="{{ URL::to('/logout') }}"> 
                {{ csrf_field() }} 
                    <a class="btn btn-outline-light btn-small navbar-btn" data-toggle="modal" onclick="document.getElementById('logout-form').submit()">Logout</a>
                </form> -->
            @else
                <a class="btn btn-outline-light btn-small navbar-btn mr-3" data-toggle="modal" data-target="#register-popup">Sign up</a>
                <a class="btn btn-outline-light btn-small navbar-btn" data-toggle="modal" data-target="#login-popup">Login</a>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <div id="login-popup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" name="register-form" action="{{ URL::to('/login') }}">      
                    {{ csrf_field() }}                  
                    <div class="modal-header">
                        <h3>Log in</h3>
                    </div>
                    <div class="container">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="login-label" for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label class="login-label" for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <a href=""><label class="login-label" for="forgetPassword" id="forgetPassword">Forget password?</label></a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary login-button">Log in</button>
                        <button type="button" class="btn btn-default login-button" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="register-popup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3>I am ...</h3>
                        </div>
                    </div>
                    <div class="row text-center mt-2">
                        <div class="col-lg-6 col-6">
                            <a href="guideregister"><img src = "../images/guide.png" style="height:150px"></a>
                            <h4 class="register-popup">Guide</h4>
                        </div>
                        <div class="col-lg-6 col-6">
                            <a href="touristregister"><img src = "../images/tourist.png" style="height:150px"></a>
                            <h4 class="register-popup">Tourist</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('page')
</body>
</html>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $user -> userFirstName}} on Jourlaney</title>
    <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="{{ URL::asset('pg-calendar/dist/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('SweetAlert/sweetalert.css') }}" rel="stylesheet">
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
    <script type="text/javascript" src="{{ URL::asset('SweetAlert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('pg-calendar/dist/js/pignose.calendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jourlaney.js') }}"></script>
</head>

<body>
    <!--header -->
    <header class="masthead" style="background-image: url('../images/thailand_header.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <nav class="navbar navbar-light clearbg animated fadeInDown">
                <a class="navbar-brand clearbg titletext" href="/">
                    <img src="../favicon.png" width="30" height="30" class="d-inline-block align-top=" alt="">
                    <span class="titletext">JOURLANEY</span><br>
                </a>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                @if(!empty(Session::get('username')))
                <div class="navbar-header">
                    <ul class="nav navbar-top-links navbar-right">
                        <a href = "{{ URL::to('/') }}"><img src="../pic/uk.png" class="mr-3"></a>
                            <!-- dropdown-alerts -->
                        <a href = "{{ URL::to('/ShowChatPage') }}"><img src="../pic/chat.png" class="mr-3"></a>
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
                            <a href="{{ URL::to('/editprofile') }}" class="userDropdown">Edit Profile</a>
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
                                        <a href="guideregister"><img src = "../images/guide.png" style="height:120px"></a>
                                        <h4 class="register-popup">Guide</h4>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <a href="touristregister"><img src = "../images/tourist.png" style="height:120px"></a>
                                        <h4 class="register-popup">Tourist</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </nav>
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                    </div>
                    <div class="profile-pic">
                        <center><img src ="../images/profilepic/{{ $user -> userProfileImage}}" class="profileimage"></center>
                    </div> 
                </div>
            </div>
        </div>
    </header>
    <!--header -->  
<div class="container profilemenu animated fadeIn">
    <div class="row">
        <div class ="col-12 text-center">
            <br><br>
            <h1 style="text-align:center">{{ $user -> userFirstName}}</h1>
            @if(!empty($guideLocation))
            <h5>{{$guideLocation}} Guide</h5>
            @else
            <h5>Tourist</h5>
            @endif
                    @if(!empty($guideRating))
                        <img src = "../pic/star.png" height="24px" width = "24px"> <h5 class="profile-rating"> {{ $guideRating }}</h5>
                    @endif
                    @if(!empty($touristRating))
                        <img src = "../pic/star.png" height="24px" width = "24px"> <h5 class="profile-rating"> {{ $touristRating }}</h5>
                    @endif
                </table>
            <center>
                <table style="margin-top:10px;">
                    @if(!empty($guide -> guideVerification))
                    <td><img src = "../pic/verify.png" height="30px" width = "30px"></td>
                    <td><h3 style="margin:5px;color:#78DE2F">Verified</h3></td>
                    @else
                    @endif
                </table>
            </center>
        </div>
        <div class ="col-12 text-center">
            <br>
            <br>
        </div>
    </div>
</div>
    </div>
    @yield('page')
    </div>
</body>

</html>
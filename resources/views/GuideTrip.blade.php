<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $trip -> tripName }} on Jourlaney</title>
    <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="{{ URL::asset('css/pignose.calendar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/jourlaney.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.mask.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/pignose.calendar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/parsley.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jourlaney.js') }}"></script>
    <style>
        .masthead{
            padding-bottom : 25%;
        }
    </style>
</head>

<body>
    <!--header -->
    @if(isset($trip -> tripPicture))
    <header class="masthead" style="background-image: url('/images/trippic/{{ $trip -> tripPicture }}')">
    @else
    <header class="masthead" style="background-image: url('/images/thailand_header.jpg')">
    @endif
        <div class="overlay"></div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="jourlaNav">
            <div class="container">
                <a href="/">
                <img src="../favicon.png" width="30" height="30" class="d-inline-block align-top=" alt=""></a>
                <a href="/" class="titletext">Jourlaney</a>

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
                        	                <img src="../pic/bell.png"class="mr-3" >
                                        </a>
                                    </li>
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
                            <!-- dropdown-alerts -->
                                <li class="dropdown">
                                    <a class="dropdown" data-toggle="dropdown" href="#">
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
                                        <img src="../pic/user.png">
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="../Profile/{{Session::get('username')}}">{{Session::get('username')}}</a>
                                        </li>
                                        <li><a href="../editprofile">Edit Profile</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                        <form method="POST" name="logout-form" id="logout-form" action="{{ URL::to('/logout') }}"> 
                                        {{ csrf_field() }} 
                                            <a onclick="document.getElementById('logout-form').submit()">Logout</a>
                                        </form>
                                        </li>
                                    </ul>
                                </li>
                            </div>
                        </ul>
                    </div>
                </nav>

                <!-- <a href="profile">{{Session::get('username')}}</a>
                <form method="POST" name="logout-form" id="logout-form" action="{{ URL::to('/logout') }}"> 
                {{ csrf_field() }} 
                    <a class="btn btn-outline-light btn-small navbar-btn" data-toggle="modal" onclick="document.getElementById('logout-form').submit()">Logout</a>
                </form> -->
            @else
                <a class="btn btn-outline-light btn-small navbar-btn" data-toggle="modal" data-target="#register-popup">Sign up</a>
                <a class="btn btn-outline-light btn-small navbar-btn" data-toggle="modal" data-target="#login-popup">Login</a>
            @endif
            </div>
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
            </div>
        </header>
    <!--header --> 
    <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h3>{{ $trip -> tripName }}</h3>
                </div>
                <div class="col-lg-2">
                @if($trip -> guideId == (Session::get('guideid')))
                                        <a href="../guideShowEditTrip/{{ $trip -> tripId }}"><img src="../pic/edit.png" class="mr-3" width="20" height="20"></a>
                                        <a href="/guideDeletetrip" data-toggle="modal" data-target="#delete-popup"><img src="../pic/delete.png"width="20" height="20"></a>
                                        <div id="delete-popup" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" name="delete-form" action="{{ URL::to('/gdeletetrip') }}">  
                                                    <input type="hidden" name="tripId" value="{{ $trip -> tripId }}"> 
                                                    {{ csrf_field() }}                  
                                                        <div class="modal-header">
                                                            <h3>Delete confirmation</h3>
                                                        </div>
                                                        <div class="container mt-2 mb-2">
                                                            <div class="col-2"></div>
                                                            <div class="col-8">
                                                                <button type="submit" class="btn btn-danger login-button">Delete</button>
                                                                <button type="button" class="btn btn-default login-button" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                            <div class="col-2"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        @endif
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><img src="../pic/location.png">
                                            @if(!empty($tripLocation))
                                                @foreach($tripLocation as $tripLocation)
                                                {{ $tripLocation->tripLocation }}
                                                @endforeach
                                            @endif</p>
                                    <img src="../images/profilepic/{{$creator->userProfileImage}}" class="profileImageTrip"> <a href="/Profile/{{$creator->username}}">{{ $creator -> userFirstName}}</a>
                                    <br><br><br>
                                    <h5 clsss="tripTitle">Trip Details</h5>
                                    <table style="width:70%" cellpadding="10">
                                      <tr>
                                        <td>Transportation :</td>
                                         <td>@if(!empty($tripTransportation))
                                            @foreach($tripTransportation as $t)
                                            {{ $t->tripTransportation }}<br>
                                             @endforeach
                                            @endif</td> 
                                      </tr>
                                      <tr>
                                        <td>Max Travellers :</td>
                                        <td>{{ $trip -> tripTravellers }}</td>
                                      </tr>
                                      <!-- <tr>
                                        <td>Language :</td>
                                        <td>{{Session::get('language')}}</td>
                                      </tr> -->
                                      <tr>
                                        <td>Trip Conditions :</td>  
                                        <td>@if(!empty($tripCondition))
                                            @foreach($tripCondition as $condition)
                                            {{ $condition->tripCondition }}<br>
                                            @endforeach
                                            @endif</td>
                                      </tr>
                                    </table> 
                                    <br><br>
                                    <h5 clsss="tripTitle">Itinerary</h5>
                                    <br>
                                    <table style="width:100%" cellpadding="10">
                                        @if(!empty($tripDetails))
                                            @php
                                                $minday=0;
                                             @endphp
                                            <tr>
                                            @foreach($tripDetails as $details)
                                                    @if($minday < $details->tripDay)
                                                    <td>Day {{ $details->tripDay }}</td>
                                                        @php
                                                            $minday++;
                                                        @endphp
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <td>{{ $details->tripTime }}</td>
                                                    <td> {{ $details->tripDescription }}</td>
                                                    </tr>
                                                @endforeach
                                        @endif
                                    </table>                                  
                                </div>
                                <br><br><br>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                <div class="calendar"></div>

                                <!-- <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=th.th%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Asia%2FBangkok" style="border-width:0" width="600" height="400" frameborder="0" scrolling="no"></iframe> -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->   
        </div>
        <!-- /#page-wrapper -->
  
    @yield('page')
    </div>
</body>
<script>
$(function() {
    $('.calendar').pignoseCalendar();
});
</script>
</html>
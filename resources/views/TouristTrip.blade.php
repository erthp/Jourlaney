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

<style>
    body{
        color : #513819;
    }
    h5{
        font-weight: 600;
    }
    hr{
        border : 0.5px solid 	#5cb5ec;
    }
    .masthead{
        padding-bottom : 25%;
    }
    
    * {box-sizing: border-box;}
ul {list-style-type: none;}

.container-content{
    margin-left:22%;
}
.month {
    padding: 60px 25px;
    width: 100%;
    background: #1abc9c;
    text-align: center;
}

.month ul {
    margin: 0;
    padding: 0;
}

.month ul li {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.month .prev {
    float: left;
    padding-top: 10px;
}

.month .next {
    float: right;
    padding-top: 10px;
}

.weekdays {
    margin: 0;
    padding: 10px 0;
    padding-left: 30px;
    background-color: #ddd;
}

.weekdays li {
    display: inline-block;
    width: 12%;
    color: #666;
    text-align: center;
}

.days {
    padding: 10px 0;
    padding-left: 30px;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 12%;
    text-align: center;
    margin-bottom: 5px;
    font-size:12px;
    color: #777;
}

.days li .active {
    padding: 5px;
    background: #1abc9c;
    color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
    .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
    .weekdays li, .days li {width: 12.5%;}
    .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
    .weekdays li, .days li {width: 12.2%;}
}
</style>
</head>

<body>
    <!--header -->
    <header class="masthead" style="background-image: url('{{Session::get('trippic')}}')">
        <div class="overlay"></div>
        <div class="container">
            <nav class="navbar navbar-light clearbg">
                <a class="navbar-brand clearbg titletext" href="/">
                    <img src="favicon.png" width="30" height="30" class="d-inline-block align-top=" alt="">
                    <span class="titletext">Jourlaney</span><br>
                </a>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                @if(!empty(Session::get('username')))
            <div class="navbar-header">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown">
                    		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        	    <img src="../pic/bell.png" >
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
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <img src="../pic/chat.png">
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
                                    </li> -->
                                    <!-- <li class="divider"></li>
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
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <img src="../pic/user.png" height="24px" width="24px" >
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="profile"> {{Session::get('username')}}</a>
                                    </li>
                                    <li><a href="#">Settings</a>
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
            </nav>
        </div>
    </header>
    <!--header -->
    <div class="container-content">
            <div class="row">
                <div class="col-lg-2">
                    <h3>Trip Name</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <p><img src="../pic/location.png"> Location</p>
                                    <img src="../pic/user2.png" width="64px" hight="64px">  {{Session::get('firstname')}}
                                    <br><br><br>
                                    <h5>Trip Details</h5>
                                    <table style="width:100%" cellpadding="10">
                                      <tr>
                                        <td>Transportation :</td>
                                        <td>{{Session::get('transportation')}}</td>
                                      </tr>
                                      <tr>
                                        <td>Max Traveller :</td>
                                        <td>{{Session::get('max-traveller')}}</td>
                                      </tr>
                                      <tr>
                                        <td>Language :</td>
                                        <td>{{Session::get('language')}}</td>
                                      </tr>
                                      <tr>
                                        <td>Trip Conditions :</td>
                                        <td>{{Session::get('trip-conditions')}}</td>
                                      </tr>
                                    </table> 
                                    <br><br>
                                    <h5>Itinerary</h5>
                                    <br>
                                    <p>Day 1</p>
                                    <table style="width:100%" cellpadding="10">
                                      <tr>
                                        <td>Time</td>
                                        <td>detail</td>
                                      </tr>
                                      <tr>
                                        <td>{{Session::get('time')}}</td>
                                        <td>{{Session::get('detail')}}</td>
                                      </tr>
                                      <tr>
                                        <td>{{Session::get('time')}}</td>
                                        <td>{{Session::get('detail')}}</td>
                                      </tr>
                                      <tr>
                                        <td>{{Session::get('time')}}</td>
                                        <td>{{Session::get('detail')}}</td>
                                      </tr>
                                      <tr>
                                        <td>{{Session::get('time')}}</td>
                                        <td>{{Session::get('detail')}}</td>
                                      </tr>
                                      <tr>
                                        <td>{{Session::get('time')}}</td>
                                        <td>{{Session::get('detail')}}</td>
                                      </tr>
                                      <tr>
                                        <td>{{Session::get('time')}}</td>
                                        <td>{{Session::get('detail')}}</td>
                                      </tr>
                                    </table>                                  
                                </div>
                                <br><br><br>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-4">
                                    <div class="month">      
                                        <ul>
                                          <li class="prev">&#10094;</li>
                                          <li class="next">&#10095;</li>
                                          <li>
                                            May<br>
                                            <span style="font-size:18px">2018</span>
                                          </li>
                                        </ul>
                                    </div>

                                    <ul class="weekdays">
                                      <li>Mo</li>
                                      <li>Tu</li>
                                      <li>We</li>
                                      <li>Th</li>
                                      <li>Fr</li>
                                      <li>Sa</li>
                                      <li>Su</li>
                                    </ul>

                                    <ul class="days">
                                      <li></li>
                                      <li>1</li>
                                      <li>2</li>
                                      <li>3</li>
                                      <li>4</li>
                                      <li>5</li>
                                      <li>6</li>
                                      <li>7</li>
                                      <li>8</li>
                                      <li>9</li>
                                      <li>10</li>
                                      <li>11</li>
                                      <li>12</li>
                                      <li>13</li>
                                      <li>14</li>
                                      <li><span class="active">15</span></li>
                                      <li>16</li>
                                      <li>17</li>
                                      <li>18</li>
                                      <li>19</li>
                                      <li>20</li>
                                      <li>21</li>
                                      <li>22</li>
                                      <li>23</li>
                                      <li>24</li>
                                      <li>25</li>
                                      <li>26</li>
                                      <li>27</li>
                                      <li>28</li>
                                      <li>29</li>
                                      <li>30</li>
                                      <li>31</li>
                                    </ul>
                                    <br>
                                    <center>
                                        <a href=""><button type="submit" class="btn btn-success">Join Trip</button></a>
                                    </center>
                                    <br>
                                    <center>
                                        <a href="chat"><button type="reset" class="btn btn-primary">Send a messege</button></a>
                                    </center>


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

</html>
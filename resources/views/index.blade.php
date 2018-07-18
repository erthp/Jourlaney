@extends('header')
@section('page')
        <div class="container homemenu animated fadeIn">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <a href = "/"><img src="../pic/medal.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Recommend</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                    @if(!empty(Session::get('guideid')))
                        <a href = "guidecreatetrip"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @elseif(!empty(Session::get('touristid')))
                        <a href = "touristcreatetrip"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @else
                        <a href = "/" onclick="alert('Please login first!')"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @endif
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "findguide"><img src="../pic/glasses.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Find Guide</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">   
            <ul class="nav">
                <h3>Trips Available</h3>&nbsp;   
                    <li class="dropdown">
                        <a class="dropdown" data-toggle="dropdown" href="#">
                            <u><h3> Tomorrow</h3></u>
                        </a>
                        <br><br>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="Profile/{{Session::get('username')}}">Profile</a>
                                    </li>
                                    <li><a href="editprofile">Edit Profile</a>
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
        <div class="container">
            <div class="row">
                <div class ="col-4 text-center">
                    <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                    <br>
                    <p class="h4 hometrip-tripname">chiangmai </p>
                </div>
                <div class ="col-4 text-center">
                    <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                    <br>
                    <p class="h4 hometrip-tripname">chiangmai </p>
                </div>
                <div class ="col-4 text-center">
                    <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                    <br>
                    <p class="h4 hometrip-tripname">chiangmai </p>
                </div>
            </div>
        </div>
@endsection

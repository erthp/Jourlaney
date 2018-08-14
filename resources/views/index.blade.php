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
                    <div class="hometrip-container" align="center">
                        <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                        <div class="image-overlay">
                            <div class="image-overlay-text">VIEW TRIP</div>
                        </div>
                    </div>
                    <p class="h4 hometrip-tripname">Chiang Mai</p>
                </div>
                <div class ="col-4 text-center">
                    <div class="hometrip-container" align="center">
                        <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                        <div class="image-overlay">
                            <div class="image-overlay-text">VIEW TRIP</div>
                        </div>
                    </div>
                    <p class="h4 hometrip-tripname">Chiang Mai</p>
                </div>
                <div class ="col-4 text-center">
                    <div class="hometrip-container" align="center">
                        <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                        <div class="image-overlay">
                            <div class="image-overlay-text">VIEW TRIP</div>
                        </div>
                    </div>
                    <p class="h4 hometrip-tripname">Chiang Mai</p>
                </div>
            </div>
        </div>
        <div class="container mt-5">   
                <h3>Editor's Pick</h3> 
        </div>
        <div class="container">
            <div class="row">
                <div class ="col-4 text-center">
                    <div class="hometrip-container" align="center">
                        <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                        <div class="image-overlay">
                            <div class="image-overlay-text">VIEW TRIP</div>
                        </div>
                    </div>
                    <p class="h4 hometrip-tripname">Chiang Mai</p>
                </div>
                <div class ="col-4 text-center">
                    <div class="hometrip-container" align="center">
                        <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                        <div class="image-overlay">
                            <div class="image-overlay-text">VIEW TRIP</div>
                        </div>
                    </div>
                    <p class="h4 hometrip-tripname">Chiang Mai</p>
                </div>
                <div class ="col-4 text-center">
                    <div class="hometrip-container" align="center">
                        <img src="../images/chiangmai.jpg" class="img-responsive object-fit-cover hometrip-image">
                        <div class="image-overlay">
                            <div class="image-overlay-text">VIEW TRIP</div>
                        </div>
                    </div>
                    <p class="h4 hometrip-tripname">Chiang Mai</p>
                </div>
            </div>
        </div>
        <div class="container footer-bg">
            <div class="row">
                <div class="col-4 footer-title">
                <a class="footer-title-text" href="/">JOURLANEY</a>
                </div>
                <div class="col-4">
                </div>
                <div class="col-4">
                    <div class="footer-social" align="right">
                        <a class="footer-social-facebook">
                        </a>
                        <a class="footer-social-twitter">
                        </a>
                        <a class="footer-social-instagram">
                        </a>
                    </div>
                </div>
            <div class="col-12 footer-menu">
                HOME
            </div>
            <div class="col-12 footer-menu">
                TRIPS
            </div>
            <div class="col-12 footer-menu">
                ABOUT US
            </div>
            <div class="col-12 footer-foot">
                <i class="fas fa-heart"></i> &copy; 2018, Jourlaney.
            </div>
            </div>
        </div>
@endsection
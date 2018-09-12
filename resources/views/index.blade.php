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
                        <a href = "guidecreatetrip"><img src="../pic/tickets.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @elseif(!empty(Session::get('touristid')))
                        <a href = "touristcreatetrip"><img src="../pic/tickets.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @else
                        <a href = "/" onclick="alert('Please login first!')"><img src="../pic/tickets.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @endif
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "findguide"><img src="../pic/search.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Search Trip</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top:30px;">   
            <ul class="nav">
                <h3>Trips Available</h3>  &nbsp;&nbsp;&nbsp;       
                    <li class="dropdown">
                        <a class="dropdown" data-toggle="dropdown" href="#">
                            <u><h3>Tomorrow</h3></u>
                        </a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Tomorrow</a>
                                    </li>
                                    <li><a href="">This week</a>
                                    </li>
                                    <li><a href="">This month</a>
                                    </li>
                                </ul>
                            </li>
            </ul>
        </div>
        <div class="container">
            <div class="row mt-4 animated fadeIn">
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/chiangmai.jpg">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/19">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                            <a href="../GuideTrip/19" class="hometrip-tripname">Chiang Mai</a>
                            <a href="../Profile/namhwan" class="hometrip-tripowner">Namhwan</a>
                        </div>
                    </div>
                </div>
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/beach-bungalow.jpg">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/11">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                        <a href="../GuideTrip/11" class="h4 hometrip-tripname">Hua Hin</a>
                        <a href="../Profile/Nobita" class="h4 hometrip-tripowner">Nobita</a>
                        </div>
                    </div>
                </div>
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/buddhist.jpg">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/11">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                        <a href="../GuideTrip/11" class="h4 hometrip-tripname">Ayutthaya</a>
                        <a href="../Profile/Nobita" class="h4 hometrip-tripowner">Nobita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-2">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="center-div">
                        <input type="button" class="btn btn-lg btn-outline-light index-btn" value="See more trips">
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        <div class="container mt-5">   
                <h3>Editor's Pick</h3> 
        </div>
        <div class="container">
        <div class="row mt-4 animated fadeIn">
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/chiangmai.jpg">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/19">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                            <a href="../GuideTrip/19" class="hometrip-tripname">Chiang Mai</a>
                            <a href="../Profile/namhwan" class="hometrip-tripowner">Namhwan</a>
                        </div>
                    </div>
                </div>
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/beach-bungalow.jpg">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/11">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                        <a href="../GuideTrip/11" class="h4 hometrip-tripname">Hua Hin</a>
                        <a href="../Profile/Nobita" class="h4 hometrip-tripowner">Nobita</a>
                        </div>
                    </div>
                </div>
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/buddhist.jpg">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/11">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                        <a href="../GuideTrip/11" class="h4 hometrip-tripname">Ayutthaya</a>
                        <a href="../Profile/Nobita" class="h4 hometrip-tripowner">Nobita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-2">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="center-div">
                        <input type="button" class="btn btn-lg btn-outline-light index-btn" value="See more trips">
                    </div>
                </div>
                <div class="col-4"></div>
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

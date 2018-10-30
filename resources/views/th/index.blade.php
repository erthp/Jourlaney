@extends('header')
@section('page')
    @if(!empty(Session::get('guideid')) || !empty(Session::get('touristid')))
        <div class="container homemenu animated fadeIn">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <a href = "/"><img src="../pic/map.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">ทริปทั้งหมด</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                    @if(!empty(Session::get('guideid')))
                        <a href = "guidecreatetrip"><img src="../pic/tickets.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">สร้างทริป</p>
                    @elseif(!empty(Session::get('touristid')))
                        <a href = "touristcreatetrip"><img src="../pic/tickets.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">สร้างทริป</p>
                    @else
                        <a href = "/" onclick="alert('Please login first!')"><img src="../pic/tickets.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">สร้างทริป</p>
                    @endif
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href="search"><img src="../pic/search.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">ค้นหาทริป</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <div class="container" style="margin-top:30px;">   
            <ul class="nav">
                <h3>ทริปใหม่ในสัปดาห์นี้</h3><!--   &nbsp;&nbsp;&nbsp;       
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
            </ul> -->
        </div>
        <div class="container">
            <div class="row mt-4 animated fadeIn">
                @php
                    $i = 1;
                @endphp
                @foreach ($guideTrips as $guideTrip)
                @if($i <= 3)
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/{{ $guideTrip -> tripPicture}}">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/{{ $guideTrip -> tripId }}">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                            <a href="../GuideTrip/{{ $guideTrip -> tripId }}" class="hometrip-tripname">{{ $guideTrip -> tripName}}</a>
                            <p class="hometrip-tripowner">THB {{ $guideTrip -> tripCost }}</p>
                        </div>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
                @endif
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row mt-2">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="center-div">
                        <a href="/search?startdate={{ $today }}&enddate={{ $next6 }}"><input type="button" class="btn btn-lg btn-outline-light index-btn" value="ดูทริปเพิ่มเติม"></a>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        <div class="container mt-5">   
                <h3>ทริปที่กำลังจะเกิดขึ้น</h3> 
        </div>
        <div class="container">
            <div class="row mt-4 animated fadeIn">
                @php
                    $i = 1;
                @endphp
                @foreach ($upcomingGuideTrips as $guideTrip)
                @if($i <= 3)
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/{{ $guideTrip -> tripPicture}}">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/{{ $guideTrip -> tripId }}">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                            <a href="../GuideTrip/{{ $guideTrip -> tripId }}" class="hometrip-tripname">{{ $guideTrip -> tripName}}</a>
                            <p class="hometrip-tripowner">THB {{ $guideTrip -> tripCost }}</p>
                        </div>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
                @endif
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row mt-2">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="center-div">
                        <a href="/search?startdate={{ $next7 }}&enddate={{ $next12 }}"><input type="button" class="btn btn-lg btn-outline-light index-btn" value="ดูทริปเพิ่มเติม"></a>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        <div class="container mt-5">   
                <h3>ทริปจากนักท่องเที่ยว</h3> 
        </div>
        <div class="container">
            <div class="row mt-4 animated fadeIn">
                @php
                    $i = 1;
                @endphp
                @foreach ($touristTrips as $touristTrip)
                @if($i <= 3)
                <div class ="col-lg-4 col-12 text-center mb-2">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/{{ $touristTrip -> tripPicture}}">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../TouristTrip/{{ $touristTrip -> tripId }}">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                            <a href="../TouristTrip/{{ $touristTrip -> tripId }}" class="hometrip-tripname">{{ $touristTrip -> tripName}}</a>
                            <p class="hometrip-tripowner">{{ $touristTrip -> username }}</p>
                        </div>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
                @endif
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row mt-2">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="center-div">
                        <a href="/search?startdate={{ $today }}&enddate={{ $next6 }}"><input type="button" class="btn btn-lg btn-outline-light index-btn" value="ดูทริปเพิ่มเติม"></a>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        <div class="container footer-bg">
            <div class="row">
                <div class="col-4 footer-title">
                <a class="footer-title-text" href="/">เจอร์ลานี</a>
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
                <a href="th">หน้าหลัก</a>
            </div>
            <div class="col-12 footer-menu">
                <a href="search">ทริป</a>
            </div>
            <div class="col-12 footer-menu">
                เกี่ยวกับเรา
            </div>
            <div class="col-12 footer-foot">
                <i class="fas fa-heart"></i> &copy; 2018, เจอร์ลานี.
            </div>
            </div>
        </div>
@endsection

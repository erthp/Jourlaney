@extends('headerprofile')
@section('page')
<br>
<div class="container profilemenu">
    <div class="row">
        <div class="col-6">
            <div align="center">
            <a href="/Profile/{{ $user -> username }}"><p class="h3 profile-inactive-menu">Trips</p></a>
            </div>
        </div>
        <!-- <div class="col-4">
            <div align="center">
                <a href="/FreeDay/{{ $user -> username }}"><p class="h3 profile-inactive-menu">Free Day</p></a>
            </div>
        </div> -->
        <div class="col-6">
            <div align="center">
                <p class="h3 profile-active-menu">Rate & Review</p>
            </div>
        </div>
    </div>
<br>
    <div class="row">
        <div class ="col-12 text-left">
        <br>
            <h3>Trip created by {{ $user -> userFirstName}}</h3>
        </div>
        <div class="container">
            <div class="row mt-4 animated fadeIn">
            @foreach($trip as $trip)
                @if(!empty($guide))
                <div class ="col-4 text-center mt-4">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/{{ $trip -> tripPicture}}">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/{{ $trip -> tripId }}">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                            <a href="../GuideTrip/{{ $trip -> tripId }}" class="hometrip-tripname">{{ $trip -> tripName }}</a>
                        </div>
                    </div>
                </div>
                @elseif(!empty($tourist))
                <div class ="col-4 text-center mt-4">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/{{ $trip -> tripPicture}}">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../TouristTrip/{{ $trip -> tripId }}">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                            <a href="../TouristTrip/{{ $trip -> tripId }}" class="hometrip-tripname">{{ $trip -> tripName }}</a>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            </div>
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
                <a href="th">HOME</a>
            </div>
            <div class="col-12 footer-menu">
                <a href="search">TRIPS</a>
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
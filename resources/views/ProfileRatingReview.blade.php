@extends('headerprofile')
@section('page')
<br>
<div class="container profilemenu">
@if((Session::get('username') == ($user -> username)))
    <div class="row">
        <div class="col-4">
            <div align="center">
                <a href="/Profile/{{ $user -> username }}"><p class="h3 profile-inactive-menu">Trips</p></a>
            </div>
        </div>
        <div class="col-4">
            <div align="center">
                <p class="h3 profile-active-menu">Rate & Review</p>
            </div>
        </div>
        <div class="col-4">
            <div align="center">
                <a href="/orderHistory"><p class="h3 profile-inactive-menu">Order history</p></a>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-6">
            <div align="center">
                <a href="/Profile/{{ $user -> username }}"><p class="h3 profile-inactive-menu">Trips</p></a>
            </div>
        </div>
        <div class="col-6">
            <div align="center">
                <p class="h3 profile-active-menu">Rate & Review</p>
            </div>
        </div>
    </div>
    @endif
<br>
    <div class="row">
        <div class ="col-12 text-left">
        <br>
            <h3>{{ $user -> userFirstName}}'s Reviews</h3>
        </div>
        <div class="container">
            <div class="row mt-4 animated fadeIn">
            @foreach($allReview as $allReview)
                @if(!empty($guide))
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <img src="../images/profilepic/{{$allReview->userProfileImage}}" class="profileImageTrip">
                                </div>
                                <div class="col-11">
                                    <p style="display:inline"><a href="/Profile/{{$allReview->username}}">{{ $allReview -> userFirstName}}</a></p><br><img src = "../pic/star.png" height="16px" width = "16px" > <h6 class="review-rating" style="display:inline"> {{ $allReview -> guideRating}} </p><p>" {{ $allReview -> guideReview }} "</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif(!empty($tourist))
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <img src="../images/profilepic/{{$allReview->userProfileImage}}" class="profileImageTrip">
                                </div>
                                <div class="col-11">
                                    <p style="display:inline"><a href="/Profile/{{$allReview->username}}">{{ $allReview -> userFirstName}}</a></p><br><img src = "../pic/star.png" height="16px" width = "16px" > <h6 class="review-rating" style="display:inline"> {{ $allReview -> touristRating}} </p><p>" {{ $allReview -> touristReview }} "</p>
                                </div>
                            </div>
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
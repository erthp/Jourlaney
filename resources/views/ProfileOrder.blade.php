@extends('headerprofile')
@section('page')
<br>
<div class="container profilemenu">
    @if((Session::get('username') == ($user -> username)))
    <div class="row">
        <div class="col-4">
            <div align="center">
                <p class="h3 profile-inactive-menu">Trips</p>
            </div>
        </div>
        <div class="col-4">
            <div align="center">
                <a href="/Rating/{{ $user -> username }}"><p class="h3 profile-inactive-menu">Rate & Review</p></a>
            </div>
        </div>
        <div class="col-4">
            <div align="center">
                <a href="/orderHistory"><p class="h3 profile-active-menu">Order history</p></a>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-6">
            <div align="center">
                <p class="h3 profile-inactive-menu">Trips</p>
            </div>
        </div>
        <div class="col-6">
            <div align="center">
                <a href="/Rating/{{ $user -> username }}"><p class="h3 profile-inactive-menu">Rate & Review</p></a>
            </div>
        </div>
    </div>
    @endif
<br>
    <div class="row">
        <div class ="col-12 text-left">
        <br>
            <h3>Your Order History</h3>
        </div>
        <div class="container">
            <div class="row mt-4 animated fadeIn">
                <div class="col-12 mb-2">
                    <div class="card" style="background-color:#CCCCCC;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <p style="display:inline">ID</p>
                                </div>
                                <div class="col-3">
                                    <p style="display:inline">Trip Name</p>
                                </div>
                                <div class="col-2">
                                    <p style="display:inline">Tourist</p>
                                </div>
                                <div class="col-2">
                                    <p style="display:inline">Cost</p>
                                </div>
                                <div class="col-2">
                                    <p style="display:inline">Recieved</p>
                                </div>
                                <div class="col-2">
                                    <p style="display:inline">Status</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @foreach($query as $query)
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <p style="display:inline">{{ $query -> chatRoomId}}</p>
                                </div>
                                <div class="col-3">
                                    <p style="display:inline">{{ $query -> tripName}}</p>
                                </div>
                                <div class="col-2">
                                    <p style="display:inline">{{ $query -> userFirstName}}</p>
                                </div>
                                <div class="col-2">
                                    <p style="display:inline">THB {{ $query -> tripCost}}.00</p>
                                </div>
                                <div class="col-2">
                                    <p style="display:inline">THB {{ $query -> tripCostWithVat}}.00</p>
                                </div>
                                <div class="col-2">
                                    <p style="display:inline">{{ $query -> status}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
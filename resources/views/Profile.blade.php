@extends('headerprofile')
@section('page')
<br>
<div class="container profilemenu">
<div class="row">
        <div class="col-4">
            <div align="center">
                <p class="h3">Trips</p>
            </div>
        </div>
        <div class="col-4">
            <div align="center">
                <a href="/FreeDay/{{ $user -> username }}"><p class="h3">Free Day</p></a>
            </div>
        </div>
        <div class="col-4">
            <div align="center">
                <a href="rate&review"><p class="h3">Rate & Review</p></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class ="col-12 text-left">
            <br>
            <h4>Trip created by {{ $user -> userFirstName}}</h4>
            <br>
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



@endsection
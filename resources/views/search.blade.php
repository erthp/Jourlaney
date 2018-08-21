@extends('headerNav')
@section('page')
<div class="container">
    <div class="row searchpage-margin">
        <div class="col-12">
            <h4>Search</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <form method="GET" action="{{URL::to('/search')}}">
                <input type="text" class="searchbox-searchpage animated fadeIn" name="search" placeholder="Search trip">
        </div>
        <div class="col-4">
                <button type="submit" class="btn btn-success btn-block searchpage-submitbutton">Submit</button>
        </div>
            </form>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row mt-4 animated fadeIn">
            @if(count($trip))
            @foreach ($trip as $tripresult)
                <div class ="col-4 mt-4 text-center">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/{{ $tripresult -> tripPicture }}">
                        <div class="image-overlay">
                            <a class="image-overlay-text" href="../GuideTrip/19">VIEW TRIP</a>
                        </div>
                        <div class="card-body">
                            <a href="../GuideTrip/{{ $tripresult -> tripId }}" class="hometrip-tripname">{{ $tripresult -> tripName }}</a>
                            <a href="../Profile/{{ $tripresult -> username }}" class="hometrip-tripowner">{{ $tripresult -> userFirstName }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class ="col-12 text-center">
        <h4>Trip not found.</h4>
        <div>
        @endif
        </div>
        <div class="col-4">
        </div>
    </div>
</div>
@endsection
@extends('headerNav')
@section('page')
<div class="container">
    <h3 class="text-center trip-header">Search Trips</h3>
    <br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <label class="search-namelabel">Trip name / Location</label>
            <form method="GET" action="{{URL::to('/search')}}">
            <input type="text" class="searchbox-searchpage animated fadeIn" name="name" placeholder="Trip name / Location" value="{{ $name }}">   
        </div>
        <div class="col-2"></div>  
    </div>
    <br><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="form-group">
                <label class="search-datelabel">Start date</label>
                <input type="date" class="form-control" name="startdate" id="startdate" data-parsley-required="true" data-parsley-type="alphanum" value="{{ $startdate }}">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label class="search-datelabel">End date</label>
                <input type="date" class="form-control" name="enddate" id="enddate" data-parsley-required="true" data-parsley-type="alphanum" value="{{ $enddate }}">
            </div>
        </div>  
        <div class="col-2"></div>    
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <label class="search-datelabel">Show trip form: </label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="guide" name="guide" checked>
                <label class="form-check-label" for="Guide">Guide</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="tourist" name="tourist">
                <label class="form-check-label" for="Tourist">Tourist</label>
            </div>
        </div>
        <div class="col-2"></div> 
    </div>
    
    <br>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-2">
                <button type="submit" class="btn btn-info btn-block searchpage-submitbutton">Search</button>
        </div>
        <div class="col-5"></div>    
    </div>
    </form>
    <br>
    <div class="row">
        <div class="col-12">
        
            <div class="row mt-4 animated fadeIn">
            @if(count($trip))
            @foreach ($trip as $tripresult)
                <div class ="col-4 mt-4 text-center">
                    <div class="card hometrip-container" style="width: 20rem;">
                        <img class="card-img-top hometrip-image" src="../images/trippic/{{ $tripresult -> tripPicture }}">
                        <div class="image-overlay">
                            @if(!empty( $tripresult->guideId ))
                            <a class="image-overlay-text" href="../GuideTrip/{{ $tripresult -> tripId }}">VIEW TRIP</a>
                            @else
                            <a class="image-overlay-text" href="../TouristTrip/{{ $tripresult -> tripId }}">VIEW TRIP</a>
                            @endif
                        </div>
                        <div class="card-body">
                            @if(!empty( $tripresult->guideId ))
                            <a href="../GuideTrip/{{ $tripresult -> tripId }}" class="hometrip-tripname">{{ $tripresult -> tripName }}</a>
                            @else
                            <a href="../TouristTrip/{{ $tripresult -> tripId }}" class="hometrip-tripname">{{ $tripresult -> tripName }}</a>
                            @endif
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
                <a href="/">HOME</a>
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
<script>

</script>
@endsection
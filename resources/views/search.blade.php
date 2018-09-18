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
                        <a href="search"><img src="../pic/search.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Search Trip</p>
                    </div>
                </div>
            </div>
</div>
<br>
<div class="container">
    <h3 class="text-center trip-header">Search Trips</h3>
    <br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <label class="search-namelabel">Trip name / Location</label>
            <form method="GET" action="{{URL::to('/search')}}">
            <input type="text" class="searchbox-searchpage animated fadeIn" name="name" placeholder="Trip name / Location">   
        </div>
        <div class="col-2"></div>  
    </div>
    <br><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="form-group">
                <label class="search-datelabel">Start date</label>
                <input type="date" class="form-control" name="startdate" id="startdate" data-parsley-required="true" data-parsley-type="alphanum" required>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label class="search-datelabel">End date</label>
                <input type="date" class="form-control" name="enddate" id="enddate" data-parsley-required="true" data-parsley-type="alphanum" required>
            </div>
        </div>  
        <div class="col-2"></div>    
    </div>
    </form>
    <br>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-2">
                <button type="submit" class="btn btn-info btn-block searchpage-submitbutton">Search</button>
        </div>
        <div class="col-5"></div>    
    </div>
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
<script>

</script>
@endsection
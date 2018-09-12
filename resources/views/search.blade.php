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
                <input type="text" class="searchbox-searchpage animated fadeIn" name="name" placeholder="Search trip">   
        </div>
        <div class="col-4">
                <button type="submit" class="btn btn-success btn-block searchpage-submitbutton">Submit</button>
        </div>    
    </div>
    <div class="row">
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
        <div class="col-4">
                
        </div>    
    </div>
    </form>
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
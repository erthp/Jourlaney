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
                        <p class="homemenu-text">Find Guide</p>
                    </div>
                </div>
            </div>
        </div>
<br>
<div class="container">
    <h3 class="text-center trip-header">Add trip details</h3>
        <form method="POST" id="trip-form" name="trip-form" action="{{URL::to('/gcreatetripdetails')}}" enctype="multipart/form-data">
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="location">Location</label>
                </div>
                <div class="col-lg-4">
                    <div class="form-group" id="location-form">
                    <select name="location" id="location" required>
                        <option value="" selected>Select city</option>
                        @foreach( $queryLocation as $location)
                        <option value="{{ $location -> tripLocation }}">{{ $location -> tripLocation }}</option>
                        @endforeach
                    </select>
                    &nbsp;&nbsp; <a onclick="addLocation()"><img src="../pic/add.png" height="16px" width="16px"></a>
                    <p name="addLocation" id="addLocation"></p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="transportation">Transportation</label>
                </div>
                <div class = "col-lg-8">
                    <input type="checkbox" class="" name="transportation[]" id="transportation" value="Private car" /> Private Car &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="transportation[]" id="transportation" value="Public transportation" /> Public Transportation
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="trip-conditions">Trip conditions</label>
                </div>
                <div class="col-lg-8">
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Smart casual" /> Smart Casual  &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="No pets" /> No Pets &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Flexible plan" /> Flexible Plan &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Seasonal activity" /> Seasonal Activity &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Others" /> Others...
                </div>
            </div>
            <br>
                    <input type="hidden" name="guideid" id="guideid" value="{{Session::get('guideid')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row text-center mb-4"> 
                <div class="col-lg-10">
                    <input type="hidden" name="tripId" value="{{ $tripId }}"/>
                    <button type="submit" class="btn btn-info btn-block">Next</button>
                </div>
            </div>
        </form>
</div>
    <script type="text/javascript">
	function addLocation(){
        var loc=1;
        loc++;
        if(loc<=3){
            var locationForm = $("<br><select name=\"location"+loc+"\"></select>");
            var field = $("#location > option").clone();
            locationForm.append(field);
            $('#addLocation').append(locationForm);
        }
    }
    </script>
@endsection
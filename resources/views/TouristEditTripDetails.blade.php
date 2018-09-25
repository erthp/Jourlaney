@extends('header')
@section('page')
<div class="container homemenu animated fadeIn">
            <div class="row">
            <div class="col-4">
                    <div align="center">
                        <a href = "/"><img src="../pic/map.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">All Trips</p>
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
    <h3 class="text-center trip-header">Add trip details</h3>
        <form method="POST" id="trip-form" name="trip-form" action="{{URL::to('/tedittripdetails')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="location">Location</label>
                </div>
                <div class="col-lg-4">
                    <div class="form-group" id="location-form">
                    <select name="location" id="location">
                        @if(!empty($tripLocation))
                            @foreach( $queryLocation as $location)
                                @if($tripLocation[0]->tripLocation == $location->tripLocation)
                                <option value="{{ $location -> tripLocation }}" selected>{{ $location -> tripLocation }}</option>
                                @else
                                <option value="{{ $location -> tripLocation }}">{{ $location -> tripLocation }}</option>
                                @endif
                            @endforeach
                        @else
                            <option value="" selected>Select city</option>
                            @foreach( $queryLocation as $location)
                            <option value="{{ $location -> tripLocation }}">{{ $location -> tripLocation }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if(!empty($tripLocation[1]->tripLocation))
                    <select name="location2" id="location2">
                        @foreach( $queryLocation as $location)
                        @if($tripLocation[1]->tripLocation == $location->tripLocation)
                        <option value="{{ $location -> tripLocation }}" selected>{{ $location -> tripLocation }}</option>
                        @else
                        <option value="{{ $location -> tripLocation }}">{{ $location -> tripLocation }}</option>
                        @endif
                        @endforeach
                    </select>
                    @endif
                    @if(!empty($tripLocation[2]->tripLocation))
                    <select name="location3" id="location3">
                        @foreach( $queryLocation as $location)
                        @if($tripLocation[2]->tripLocation == $location->tripLocation)
                        <option value="{{ $location -> tripLocation }}" selected>{{ $location -> tripLocation }}</option>
                        @else
                        <option value="{{ $location -> tripLocation }}">{{ $location -> tripLocation }}</option>
                        @endif
                        @endforeach
                    </select>
                    @endif
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
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="trip-conditions">Trip conditions</label>
                </div>
                <div class="col-lg-8">
                    @if(!empty($tripCondition))
                        @if($tripCondition[0] -> tripCondition == "Smart casual")
                        <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Smart casual" checked/> Smart Casual  &nbsp;&nbsp;&nbsp;
                        @else
                        <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Smart casual" /> Smart Casual  &nbsp;&nbsp;&nbsp;
                        @endif

                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition == "No pets")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="No pets" checked/> No Pets &nbsp;&nbsp;&nbsp;
                            @endif
                        @endfor
                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition !== "No pets")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="No pets"/> No Pets &nbsp;&nbsp;&nbsp;
                            @endif
                        @endfor


                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition == "Flexible plan")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Flexible plan" checked/> Flexible Plan &nbsp;&nbsp;&nbsp;
                            @endif
                        @endfor
                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition !== "Flexible plan")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Flexible plan"/> Flexible Plan &nbsp;&nbsp;&nbsp;
                            @endif
                        @endfor

                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition == "Seasonal activity")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Seasonal activity" checked/> Seasonal Activity &nbsp;&nbsp;&nbsp;
                            @endif
                        @endfor
                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition !== "Seasonal activity")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Seasonal activity"/> Seasonal Activity &nbsp;&nbsp;&nbsp;
                            @endif
                        @endfor
                    @else
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Smart casual" /> Smart Casual  &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="No pets" /> No Pets &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Flexible plan" /> Flexible Plan &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Seasonal activity" /> Seasonal Activity &nbsp;&nbsp;&nbsp;
                    @endif
                </div>
            </div>
            <br>
                    <input type="hidden" name="guideid" id="guideid" value="{{Session::get('guideid')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <input type="hidden" name="tripId" value="{{ $tripId }}"/>
                    <button type="submit" class="btn btn-info btn-block">Edit time details</button>
                </div>
            </div>
        </form>

    </div>
    <script type="text/javascript">
    var loc=1;
	function addLocation(){
        loc++;
        if(loc<=3){
            var locationForm = $("<select name=\"location"+loc+"\"></select>");
            var field = $("#location > option").clone();
            locationForm.append(field);
            $('#addLocation').append(locationForm);
        }
    }
    </script>
@endsection
@extends('headerNav')
@section('page')
<div class="container navGap ">

    <h3 class="text-center trip-header">Edit your trip</h3>
        <form method="POST" id="trip-form" name="trip-form" action="{{URL::to('/gedittrip')}}" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col-lg-2">
                    <label class="trip-label" for="tripname">Trip name</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tripname" id="tripname" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[3, 50]" value="{{ $trip->tripName }}">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="date">Trip start</label>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="startdate" id="startdate" data-parsley-required="true" data-parsley-type="alphanum" value="{{ $trip->tripStart }}">
                    </div>
                </div>
                <label>-</label>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="enddate" id="enddate" data-parsley-required="true" data-parsley-type="alphanum" value="{{ $trip->tripEnd }}">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                <label class="trip-label" for="trippic">Trip picture</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <a>
                            <img src="../images/trippic/{{ $trip->tripPicture }}" class="edittrip-image">
                            <input type="file" name="trippic" id="trippic" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="max-traveller">Max traveller</label>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="number" class="form-control" name="max-traveller" id="max-traveller"  data-parsley-required="true" min="1" value="{{ $trip->tripTravellers }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label">Trip Cost</label>
                </div>
                <div class="col-lg-2">
                <input type="number" class="form-control" id="tripcost" name="tripcost" min="0.00" max="10000.00" step="0.01"  value="{{ $trip->tripCost }}">
                </div>
                <div class="col-lg-2">
                    <p>Baht/Person</p>
                </div>
            </div>
            <br>
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
                <div class = "col-lg-8">
                    @if(!empty($tripTransportation))
                        @if($tripTransportation[0] -> tripTransportation == "Private car")
                        <input type="checkbox" class="" name="transportation[]" id="transportation" value="Private car" checked/> Private Car &nbsp;&nbsp;&nbsp;
                        @else
                        <input type="checkbox" class="" name="transportation[]" id="transportation" value="Private car" /> Private Car &nbsp;&nbsp;&nbsp;
                        @endif
                        @for($i = 0; $i < count($tripTransportation); $i++)
                            @if($tripTransportation[$i] -> tripTransportation == "Public transportation")
                            <input type="checkbox" class="" name="transportation[]" id="transportation" value="Public transportation" checked/> Public Transportation
                            @endif
                        @endfor
                        @for($i = 0; $i < count($tripTransportation); $i++)
                            @if($tripTransportation[$i] -> tripTransportation !== "Public transportation")
                            <input type="checkbox" class="" name="transportation[]" id="transportation" value="Public transportation"/> Public Transportation
                            @endif
                        @endfor
                    @else
                    <input type="checkbox" class="" name="transportation[]" id="transportation" value="Private car" /> Private Car &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="transportation[]" id="transportation" value="Public transportation"/> Public Transportation
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="trip-conditions">Trip conditions</label>
                </div>
                <div class="col-lg-8">
                    @if(!empty($tripCondition))
                        @php
                            $smartCasual = "false";
                            $noPets = "false";
                            $flexiblePlan = "false";
                            $seasonal = "false"
                        @endphp
                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition == "Smart casual")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Smart casual" checked/> Smart Casual  &nbsp;&nbsp;&nbsp;
                            @php
                                $smartCasual = "true";
                            @endphp
                            @endif
                        @endfor
                        @if($smartCasual !== "true")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Smart casual" /> Smart Casual  &nbsp;&nbsp;&nbsp;
                        @endif

                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition == "No pets")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="No pets" checked/> No Pets &nbsp;&nbsp;&nbsp;
                            @php
                                $noPets = "true";
                            @endphp
                            @endif
                        @endfor
                            @if($noPets !== "true")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="No pets"/> No Pets &nbsp;&nbsp;&nbsp;
                            @endif

                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition == "Flexible plan")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Flexible plan" checked/> Flexible Plan &nbsp;&nbsp;&nbsp;
                            @php
                                $flexiblePlan = "true";
                            @endphp
                            @endif
                        @endfor
                            @if($flexiblePlan !== "true")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Flexible plan"/> Flexible Plan &nbsp;&nbsp;&nbsp;
                            @endif

                        @for($i = 0; $i < count($tripCondition); $i++)
                            @if($tripCondition[$i] -> tripCondition == "Seasonal activity")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Seasonal activity" checked/> Seasonal Activity &nbsp;&nbsp;&nbsp;
                            @php
                                $seasonal = "true";
                            @endphp
                            @endif
                        @endfor
                            @if($seasonal !== "true")
                            <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Seasonal activity"/> Seasonal Activity &nbsp;&nbsp;&nbsp;
                            @endif
                    @else
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Smart casual" /> Smart Casual  &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="No pets" /> No Pets &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Flexible plan" /> Flexible Plan &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions[]" id="trip-conditions" value="Seasonal activity" /> Seasonal Activity &nbsp;&nbsp;&nbsp;
                    @endif
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <input type="hidden" name="tripId" id="tripId" value="{{ $trip -> tripId}}">
                    <input type="hidden" name="guideid" id="guideid" value="{{Session::get('guideid')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-info btn-block">Edit time details</button>
                </div>
            </div>
        </form>

    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		first();                   // เมื่อ page ถูกโหลดจะทำฟังก์ชัน first ก่อน
        $('#btnAdd').click(day); // เมื่อ click จะสร้าง element ขึ้นมาใหม่(สร้าง input ใหม่)
        $('#btnTime').click(time);
	});
    var id=1;
    var timeid=1;
    var loc=1;


    function first(){
        //var id = $('#cover div').length+1;    // นับว่ามี tag div กี่อันแล้ว แล้ว +1
        //var timeid = $('#cover div').length+1;        
		var wrapper = $("<div id=\"field"+id+"\"> <a id='btnAdd'><img src='../pic/add.png' hight='16px' width='16px'></a>");  // สร้าง div
		var parag   = $("<p>Day "+id+"</p>");   // สร้าง p
		var text    = $("<span>Time:&nbsp;</span><input type='time' name=\"time"+timeid+"\" />"); // สร้าง input
		var text2    = $("<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type='text' name=\"desc"+timeid+"\" size='50'/> <a id='btnTime'><img src='../pic/add.png' hight='16px' width='16px'></a>");
		wrapper.append(parag);
		wrapper.append(text);
        wrapper.append(text2);
		$('#cover').append(wrapper);
	}

	function day(){
        id++;
		timeid=1;            // นับว่ามี tag div กี่อันแล้ว แล้ว +1
		var wrapper = $("<div id=\"field"+id+"\"> <a id='btnAdd' onClick='day()'><img src='../pic/add.png' hight='16px' width='16px'></a>");  // สร้าง div
		var parag   = $("<p>Day "+id+"</p>");   // สร้าง p
		var text    = $("<span>Time:&nbsp;</span><input type='time' name=\"time"+timeid+"\" />"); // สร้าง input
		var text2    = $("<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type='text' name=\"desc"+timeid+"\" size='50'/> <a id='btnTime' onClick='time()'><img src='../pic/add.png' hight='16px' width='16px'></a>");
		wrapper.append(parag);
		wrapper.append(text);
        wrapper.append(text2);
		$('#cover').append(wrapper);
	}
    
    function time(){
        timeid++;
        var text    = $("<div><span>Time:&nbsp;</span><input type='time' name=\"time"+timeid+"\" />"); // สร้าง input
		var text2    = $("<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type='text' name=\"desc"+timeid+"\" size='50'/> <a id='btnTime' onClick='time()'><img src='../pic/add.png' hight='16px' width='16px'></a>");
        text.append(text2);
        $('#cover').append(text);
    }
    
	function addLocation(){
        loc++;
        if(loc<=3){
            var locationForm = $("<select id=\"location"+loc+"\"></select>");
            var field = $("#location > option").clone();
            locationForm.append(field);
            $('#addLocation').append(locationForm);
        }
    }
</script>
@endsection
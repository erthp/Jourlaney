@extends('header')
@section('page')

<div class="container">
    <h3 class="text-center trip-header">Create Order</h3>
        <form method="POST" id="order-form" name="order-form" action="{{URL::to('/gcreateorder')}}" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col-lg-2">
                    <label class="trip-label" for="tripname">Trip name</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tripname" id="tripname" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[3, 50]" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="date">Trip ID</label>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="startdate" id="startdate" data-parsley-required="true" data-parsley-type="alphanum" required>
                    </div>
                </div>
                <label>-</label>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="enddate" id="enddate" data-parsley-required="true" data-parsley-type="alphanum" required>
                    </div>
                </div>
            </div>
            <br>
           
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="number" class="form-control" name="Total-traveller" id="Total-traveller"  data-parsley-required="true" min="1" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label">Trip Cost</label>
                </div>
                <div class="col-lg-2">
                <input type="number" class="form-control" id="tripcost" name="tripcost" min="0.00" max="1000000.00" step="0.01" required>
                </div>
                <div class="col-lg-2">
                    <p>Baht</p>
                </div>
            </div>
            <br>
            <div class="row text-center mb-4">
                <div class="col-lg-10">
                    <input type="hidden" name="guideid" id="guideid" value="{{Session::get('guideid')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-info btn-block">Submit</button>
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

    function checkDate() {
        var dateString = document.getElementById('startdate').value;
        var date = new Date(dateString);
        var today = new Date();
        if ( date < today ) { 
            $('#startdate').after('<p>You cannot enter a date in past.</p>');
            return false;
        }
        return true;
    }
</script>
@endsection
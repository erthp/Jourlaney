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
@if((Session::get('guideid')) == ( $creator -> guideId ))
    <h3 class="text-center trip-header">Edit trip details: Day {{ $tripDay }}</h3>
        <form method="POST" id="trip-form" name="trip-form" action="{{URL::to('/gedittriptime')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10">
                <div id="cover">
                            @php
                                $count=1;
                            @endphp
                            @if(!empty($queryTime))
                                @foreach( $queryTime as $qt )
                                <div id="cover">
                                <div id="field{{ $count }}" class="form-inline">
                                <div class="col-4"><span>Time:&nbsp;</span><input type='time' class='form-control' name="time{{ $count }}" value="{{ $qt -> tripTime }}"/></div>
                                <div class="col-6"><input type='text' class='form-control' name="desc{{ $count }}" size='40' value="{{ $qt -> tripDescription }}"/></div>
                                <div class="col-2"><a id='btnTime' onClick='time()'><img src='../pic/add.png' height='16px' width='16px'></a><a id='btnTime' onClick='remove{{ $count }}()' class="ml-2"><img src='../pic/remove.png' height='16px' width='16px'></a></div>
                                </div>
                                @php
                                    $count++;
                                @endphp
                                @endforeach
                            @else
                            @endif
                        </div>
                <br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row text-center mt-4 mb-4">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <input type="hidden" name="tripId" value="{{ $tripId }}"/>
                    <input type="hidden" name="tripDay" value="{{ $tripDay }}"/>
                    <button type="submit" name="submit" value="addDay" class="btn btn-info btn-block">Add another day</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-success btn-block">Submit</button>
                </div>
            </div>
        </div>
        </form>
@else
    <h3 class="text-center trip-header">Error!</h3>
@endif
    
    <script type="text/javascript">
	$(document).ready(function(){
        $('#btnAdd').click(day);
        $('#btnTime').click(time);
	});
    var id="<?php echo $count ?>"-1;
    var timeid="<?php echo $count ?>"-1;
    var loc="<?php echo $count ?>"-1;


    function first(){
        //var id = $('#cover div').length+1;    // นับว่ามี tag div กี่อันแล้ว แล้ว +1
        //var timeid = $('#cover div').length+1;        
		var wrapper = $("<div id=\"field"+id+"\" class='form-inline'>");  // สร้าง div
		var text    = $("<div class='col-2'><span>Time</span><input type='time' class='form-control' name=\"time"+timeid+"\" /></div>"); // สร้าง input
		var text2    = $("<div class='col-6'><span>Detail</span><input type='text' name=\"desc"+timeid+"\" id=\"desc"+timeid+"\" size='40' class='form-control'/></div><div class='col-2'><br><span>&nbsp;&nbsp;&nbsp;&nbsp;</span><a id='btnTime' onClick='time()'><img src='../pic/add.png' hight='16px' width='16px'></a><a id='btnTime' onClick=\'remove"+timeid+"()\' class='ml-2'><img src='../pic/remove.png' hight='16px' width='16px'></a></div></div>");
        wrapper.append(text);
        wrapper.append(text2);
		$('#cover').append(wrapper);
	}

	function day(){
        id++;
        timeid=1;            // นับว่ามี tag div กี่อันแล้ว แล้ว +1
		var wrapper = $("<div id=\"field"+id+"\" class='form-inline'>");  // สร้าง div
		var text    = $("<div class='col-2'><input type='time' class='form-control' name=\"time"+timeid+"\" /></div>"); // สร้าง input
		var text2    = $("<div class='col-6'><input type='text' class='form-control' name=\"desc"+timeid+"\" id=\"desc"+timeid+"\" size='40'/></div><div class='col-2'><br><span>&nbsp;&nbsp;&nbsp;&nbsp;</span><a id='btnTime' onClick='time()'><img src='../pic/add.png' hight='16px' width='16px'></a><a id='btnTime' onClick=\'remove"+timeid+"()\' class='ml-2'><img src='../pic/remove.png' hight='16px' width='16px'></a></div></div>");
		wrapper.append(text);
        wrapper.append(text2);
        $('#cover').append(wrapper);
	}

    function time(){
        timeid++;
        if(timeid<=10){
            var text    = $("<div id=\"field"+timeid+"\" class='form-inline'><div class='col-2'><input type='time' class='form-control' name=\"time"+timeid+"\" /></div>"); // สร้าง input
            var text2    = $("<div class='col-6'><input type='text' class='form-control' name=\"desc"+timeid+"\" id=\"desc"+timeid+"\" size='40'/></div><div class='col-2'><span>&nbsp;&nbsp;&nbsp;&nbsp;</span><a id='btnTime' onClick='time()'><img src='../pic/add.png' hight='16px' width='16px'></a><a id='btnTime' onClick=\'remove"+timeid+"()\' class='ml-2'><img src='../pic/remove.png' hight='16px' width='16px'></a></div></div>");
            text.append(text2);
            $('#cover').append(text);
        }
    }

     function remove1(){
        document.getElementById('field2').outerHTML = "";
    }
    function remove2(){
        document.getElementById('field2').outerHTML = "";
    }
    function remove3(){
        document.getElementById('field3').outerHTML = "";
    }
    function remove4(){
        document.getElementById('field4').outerHTML = "";
    }
    function remove5(){
        document.getElementById('field5').outerHTML = "";
    }
    function remove6(){
        document.getElementById('field6').outerHTML = "";
    }
    function remove7(){
        document.getElementById('field7').outerHTML = "";
    }
    function remove8(){
        document.getElementById('field8').outerHTML = "";
    }
    function remove9(){
        document.getElementById('field9').outerHTML = "";
    }
    function remove10(){
        document.getElementById('field10').outerHTML = "";
    }
    function remove11(){
        document.getElementById('field10').outerHTML = "";
    }
    function remove12(){
        document.getElementById('field10').outerHTML = "";
    }
    function remove13(){
        document.getElementById('field10').outerHTML = "";
    }
    function remove14(){
        document.getElementById('field10').outerHTML = "";
    }
    function remove15(){
        document.getElementById('field10').outerHTML = "";
    }
</script>
@endsection
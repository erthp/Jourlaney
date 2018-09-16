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
    <h3 class="text-center trip-header">Create your trip</h3>
        <form method="POST" id="trip-form" name="trip-form" action="{{URL::to('/tcreatetrip')}}" enctype="multipart/form-data">
        {{ csrf_field() }} 
            <div class="row mt-5">
                <div class="col-lg-2">
                    <label class="trip-label" for="tripname">Trip name</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tripname" id="tripname" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[3, 50]">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="location">Location</label>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <select name="location" id="location">
                        <option value="" selected>Select city</option>
                        <option value="Bangkok">Bangkok</option>
                        <option value="Amnat Charoen">Amnat Charoen</option>
                        <option value="Ang Thong">Ang Thong</option>
                        <option value="Bueng Kan">Bueng Kan</option>
                        <option value="Buri Ram">Buri Ram</option>
                        <option value="Chachoengsao">Chachoengsao</option>
                        <option value="Chaiyaphum">Chaiyaphum</option>
                        <option value="Chanthaburi">Chanthaburi</option>
                        <option value="Chiang Mai">Chiang Mai</option>
                        <option value="Chaing Rai">Chiang Rai</option>
                        <option value="Chon Buri">Chon Buri</option>
                        <option value="Ko Sichang">&emsp;Ko Sichang</option>
                        <option value="Pattaya">&emsp;Pattaya</option>
                        <option value="Sattahip">&emsp;Sattahip</option>
                        <option value="Si Racha">&emsp;Si Racha</option>
                        <option value="Chumphon">Chumphon</option>
                        <option value="Kalasin">Kalasin</option>
                        <option value="Kamphaeng Phet">Kamphaeng Phet</option>
                        <option value="Kanchanaburi">Kanchanaburi</option>
                        <option value="Sangkhla Buri">&emsp;Sangkhla Buri</option>
                        <option value="Khon Kaen">Khon Kaen</option>
                        <option value="Krabi">Krabi</option>
                        <option value="Ko Lanta">&emsp;Ko Lanta</option>
                        <option value="Lampang">Lampang</option>
                        <option value="Lamphun">Lamphun</option>
                        <option value="Loei">Loei</option>
                        <option value="Lop Buri">Lop Buri</option>
                        <option value="Mae Hong Son">Mae Hong Son</option>
                        <option value="Maha Sarakham">Maha Sarakham</option>
                        <option value="Muddahan">Mukdahan</option>
                        <option value="Nakhon Nayok">Nakhon Nayok</option>
                        <option value="Nakhon Pathom">Nakhon Pathom</option>
                        <option value="Nakhon Phanom">Nakhon Phanom</option>
                        <option value="Nakhon Ratchasima">Nakhon Ratchasima</option>
                        <option value="Khao Yai">&emsp;Khao Yai</option>
                        <option value="Nakhon Sawan">Nakhon Sawan</option>
                        <option value="Nakhon Si Thammarat">Nakhon Si Thammarat</option>
                        <option value="Nan">Nan</option>
                        <option value="Narathiwat">Narathiwat</option>
                        <option value="Nong Bua Lam Phu">Nong Bua Lam Phu</option>
                        <option value="Nong Khai">Nong Khai</option>
                        <option value="Nonthaburi">Nonthaburi</option>
                        <option value="Pak Kret">&emsp;Pak Kret</option>
                        <option value="Pathum Thani">Pathum Thani</option>
                        <option value="Pattani">Pattani</option>
                        <option value="Phang Nga">Phang Nga</option>
                        <option value="Phatthalung">Phatthalung</option>
                        <option value="Phayao">Phayao</option>
                        <option value="Phetchabun">Phetchabun</option>
                        <option value="Phetchaburi">Phetchaburi</option>
                        <option value="Cha-am">&emsp;Cha-am</option>
                        <option value="Phichit">Phichit</option>
                        <option value="Phitsanulok">Phitsanulok</option>
                        <option value="Phra Nakhon Si Ayyuthaya">Phra Nakhon Si Ayutthaya</option>
                        <option value="Phrae">Phrae</option>
                        <option value="Phuket">Phuket</option>
                        <option value="Prachin Buri">Prachin Buri</option>
                        <option value="Prachuap Khiri Khan">Prachuap Khiri Khan</option>
                        <option value="Hua Hin">&emsp;Hua Hin</option>
                        <option value="Ranong">Ranong</option>
                        <option value="Ratchaburi">Ratchaburi</option>
                        <option value="Rayong">Rayong</option>
                        <option value="Roi Et">Roi Et</option>
                        <option value="Sa Kaeo">Sa Kaeo</option>
                        <option value="Sakon Nakhon">Sakon Nakhon</option>
                        <option value="Samut Prakan">Samut Prakan</option>
                        <option value="Samut Sakhon">Samut Sakhon</option>
                        <option value="Samut Songkhram">Samut Songkhram</option>
                        <option value="Amphawa">&emsp;Amphawa</option>
                        <option value="Saraburi">Saraburi</option>
                        <option value="Satun">Satun</option>
                        <option value="Sing Buri">Sing Buri</option>
                        <option value="Si Sa Ket">Si Sa Ket</option>
                        <option value="Songkhla">Songkhla</option>
                        <option value="Hat Yai">&emsp;Hat Yai</option>
                        <option value="Sukhothai">Sukhothai</option>
                        <option value="Suphan Buri">Suphan Buri</option>
                        <option value="Surat Thani">Surat Thani</option>
                        <option value="Surin">Surin</option>
                        <option value="Tak">Tak</option>
                        <option value="Trang">Trang</option>
                        <option value="Trat">Trat</option>
                        <option value="Ubon Ratchathani">Ubon Ratchathani</option>
                        <option value="Udon Thani">Udon Thani</option>
                        <option value="Uthai Thani">Uthai Thani</option>
                        <option value="Uttaradit">Uttaradit</option>
                        <option value="Yala">Yala</option>
                        <option value="Yasothon">Yasothon</option>
                    </select>
                    &nbsp;&nbsp; <a onclick="addLocation()"><img src="../pic/add.png" height="16px" width="16px"></a>
                    <p name="addLocation" id="addLocation"></p>
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
                        <input type="date" class="form-control" name="startdate" id="startdate" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
                <lable>-</lable>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="enddate" id="enddate" data-parsley-required="true" data-parsley-type="alphanum">
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
                            <input type="file" name="trippic" id="trippic" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="transportation">Transportation</label>
                </div>
                <div class = "col-lg-8">
                    <input type="checkbox" class="" name="transportation" id="transportation" value="private car" /> Private Car &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="transportation" id="transportation" value="public transportation" /> Public Transportation
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label>Itinerary</label>
                </div>
                <div class="col-lg-8">
                        <div id="cover">
                            
                        </div>
                    <br>
                    <input type="hidden" name="touristid" id="touristid" value="{{Session::get('touristid')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
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
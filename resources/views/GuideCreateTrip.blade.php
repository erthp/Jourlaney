@extends('header')
@section('page')
<div class="container homemenu">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <a href = "newfeeds"><img src="../pic/medal.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Recommend</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "guidecreatetrip"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "findguide"><img src="../pic/glasses.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Find Guide</p>
                    </div>
                </div>
            </div>
        </div>
<br>
<div class="container">
    <h3 class="text-center trip-header">Create your trip</h3>
        <form method="POST" id="trip-form" name="trip-form" action="{{URL::to('/gcreatetrip')}}">
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
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="location">Location</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="location" id="location" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
            </div>
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
            <div class="row">
                <div class="col-lg-2">
                <label class="trip-label" for="trippic">Trip picture</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <a class='btn btn-primary' href='javascript:;'>
                            Choose File...
                            <input type="file" name="file_source" id="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                    </div>
                </div>
            </div>
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
                    <label class="trip-label" for="max-traveller" >Max traveller</label>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="number" class="form-control" name="max-traveller" id="max-traveller"  data-parsley-required="true">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="language">Language</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="trip-conditions">Trip conditions</label>
                </div>
                <div class="col-lg-8">
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="smart casual" /> Smart Casual  &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="์no pets" /> No Pets &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="์flexible plane" /> Flexible Plane &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="์seasonal activity" /> Seasonal Activity &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="์others" /> Others...
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label">Trip Cost</label>
                </div>
                <div class = "col-lg-8">
                <input type="number" min="0.00" max="10000.00" step="0.01"> baht. / Person
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label>Itinerary</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                    Day 1 <img src="../pic/add.png" hight="16px" width="16px"><br><br>
                        Time : <input type="time" class="" name="time" id="time">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="" name="plan" id="plan"size="50">&nbsp;&nbsp;&nbsp;<img src="../pic/add.png" hight="16px" width="16px">
                        <input type="hidden" name="guideid" id="guideid" value="{{Session::get('guideid')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label>Itinerary</label>
                </div>
                <div class="col-lg-8">
                <form id="form1" name="form1" method="post" action="">
                    <table id="myTbl" width="650" border="0" cellspacing="0" cellpadding="0">
                         <tr id="firstTr">
                            <td width="119">
                                <p name="data1[]" id="data1[]">
                                   Day 1 <br><br>
                                   Time : <input type="time" class="" name="time" id="time">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" class="" name="plan" id="plan"size="50">
                                </p>
                            </td>                           
                            <!--<td width="519">
                                <p name="data2[]" id="data2[]">
                                    Time : <input type="time" class="" name="time" id="time">
                                </p>
                            </td>-->
                        </tr>
                    </table>
                    <br />
                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <button id="addRow" type="button">+</button>   
                            </td>
                        </tr>
                    </table>
                </form>
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
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
            </div>
        </form>

    </div>
    <script language="javascript" src="js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript">
        $(function(){
        $("#addRow").click(function(){
        $("#myTbl").append($("#firstTr").clone());
        });
        $("#removeRow").click(function(){
        if($("#myTbl tr").size()>1){
            $("#myTbl tr:last").remove();
        }
        });         
    });
    </script>
@endsection
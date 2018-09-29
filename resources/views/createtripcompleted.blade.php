@extends('header')
@section('page')
<div class="container">
    
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-4">
            @if(!empty(Session::get('guideid')))
                @if($trip -> guideId == (Session::get('guideid')))
                    <a href="../guideShowEditTrip/{{ $trip -> tripId }}"><button type="button" class="btn btn-info mr-3">Edit</button></a>
                @endif
            @elseif(!empty(Session::get('touristid')))
                @if($trip -> touristId == (Session::get('touristid')))
                    <a href="../touristShowEditTrip/{{ $trip -> tripId }}"><button type="button" class="btn btn-info">Edit</button></a>
                @endif
            @else
            @endif
            <a class="btn btn-success" data-toggle="modal" data-target="#createcompleted-popup" id="confirm">Confirm</a>
        </div>
    </div>
</div>
<div id="createcompleted-popup" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="header"></div>
                                <div class="row text-center">
                                    <div class="col-lg-6 col-6">
                                        <h4 class="createcompleted-popup">Trip Created!</h4>
                                    </div>
                                </div>
                                <div class="footer text-right">
                                    <a href="/"><button type="submit" class="btn btn-primary">Back to home</button></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h3>{{ $trip -> tripName }}</h3>
                </div> 
                <div class="col-lg-2">
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><img src="../pic/location.png">
                                            @if(!empty($tripLocation))
                                                @foreach($tripLocation as $tripLocation)
                                                {{ $tripLocation->tripLocation }}
                                                @endforeach
                                            @endif</p>
                                    <img src="../images/profilepic/{{$creator->userProfileImage}}" class="profileImageTrip"> <a href="/Profile/{{$creator->username}}">{{ $creator -> userFirstName}}</a>
                                    <br><br><br>
                                    <h5 clsss="tripTitle">Trip Details</h5>
                                    <table style="width:70%" cellpadding="10">
                                      <tr>
                                        <td>Transportation :</td>
                                         <td>@if(!empty($tripTransportation))
                                            @foreach($tripTransportation as $t)
                                            {{ $t->tripTransportation }}<br>
                                             @endforeach
                                            @endif</td> 
                                      </tr>
                                      @if(!empty(Session::get('guideid')))
                                      <tr>
                                        <td>Max Travellers :</td>
                                        <td>{{ $trip -> tripTravellers }}</td>
                                      </tr>
                                      @endif
                                      <!-- <tr>
                                        <td>Language :</td>
                                        <td>{{Session::get('language')}}</td>
                                      </tr> -->
                                      <tr>
                                        <td>Trip Conditions :</td>  
                                        <td>@if(!empty($tripCondition))
                                            @foreach($tripCondition as $condition)
                                            {{ $condition->tripCondition }}<br>
                                            @endforeach
                                            @endif</td>
                                      </tr>
                                    </table> 
                                    <br><br>
                                    <h5 clsss="tripTitle">Itinerary</h5>
                                    <br>
                                    <table style="width:100%" cellpadding="10">
                                        @if(!empty($tripDetails))
                                            @php
                                                $minday=0;
                                             @endphp
                                            <tr>
                                            @foreach($tripDetails as $details)
                                                    @if($minday < $details->tripDay)
                                                    <td>Day {{ $details->tripDay }}</td>
                                                        @php
                                                            $minday++;
                                                        @endphp
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <td>{{ $details->tripTime }}</td>
                                                    <td> {{ $details->tripDescription }}</td>
                                                    </tr>
                                                @endforeach
                                        @endif
                                    </table>                                  
                                </div>
                                <br><br><br>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                <div class="center-div mb-4">
                                <img src="../images/trippic/{{ $trip->tripPicture }}" class="createdtrip-image">
                                </div>
                                <input type="hidden" id="tripStart" value="{{ $trip -> tripStart }}">
                                <input type="hidden" id="tripEnd" value="{{ $trip -> tripEnd }}">
                                <div class="calendar"></div>

                                <!-- <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=th.th%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Asia%2FBangkok" style="border-width:0" width="600" height="400" frameborder="0" scrolling="no"></iframe> -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->   
        </div>
        <!-- /#page-wrapper -->
  
    @yield('page')
    </div>
    <script>
$(function() {
    $('.calendar').pignoseCalendar({
        minDate: document.getElementById('tripStart').value,
        maxDate: document.getElementById('tripEnd').value
    });
});
</script>
</body>
@endsection
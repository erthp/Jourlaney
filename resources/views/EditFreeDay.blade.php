@extends('headerprofile')
@section('page')
<br><br>
<div class="container profilemenu">
<div class="row">
        <div class="col-1">
            
        </div>
        <div class="col-3">
            <a href="/FreeDay/{{ $user -> username}}"><i class="fas fa-angle-left fa-3x"></i></a>
        </div>
        <div class="col-4">
            <div align="center">
                <p class="h3">Edit Free Day</p>
            </div>
        </div>
        <div class="col-4">
        </div>
    </div>

    <div class="row mt-4">
        <div class ="col-6 text-center">
            <div class="calendar"></div>
            <input type="text" value="@foreach($freeDay as $freeDay) '{{ $freeDay->freeday }}', @endforeach" id="freeDay">
        </div>
        <div class ="col-6 text-center">
            <div class="card border-secondary mb-3">
                <div class="card-header">Free Day</div>
                <div class="card-body text-secondary">
                @if($user -> username == (Session::get('username')))
                    <h5 class="card-title">Edit your free day</h5>
                    <p class="card-text">Hello, {{$user -> userFirstName }}</p>
                    <p class="card-text">You can edit your available days by click on edit button below.</p>
                    <a href="#" class="btn btn-outline-primary">Edit free day</a>
                @else
                    <h5 class="card-title">Calendar</h5>
                    <p class="card-text">This calendar showed available days of {{$user -> userFirstName }}</p>
                    <p class="card-text">You can chat to @if(($user->userGender)=="Male")him @elseif(($user->userGender)=="Female")her @else {{$user -> userFirstName }} @endif for make an appointment in available days.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var $dates = document.getElementById('freeDay').value;
document.write($dates);
$(function() {
    $('.calendar').pignoseCalendar({
        enabledDates: [
            <?php if(is_array($freeDay)){ ?>
                <?php foreach($freeDay as $freeDays){ ?>
                    document.write("'");
                    document.write("<?php $freeDays['freeday'] ?>");
                    document.write("'");
                    document.write(",");
                <?php } ?>
            <?php } ?>
        ]
    });
});
</script>
@endsection
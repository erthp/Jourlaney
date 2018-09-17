@extends('headerprofile')
@section('page')
<br><br>
<div class="container profilemenu">
<div class="row">
        <div class="col-4">
            <div align="center">
            <a href="/Profile/{{ $user -> username }}"><p class="h3">Trips</p></a>
            </div>
        </div>
        <div class="col-4">
            <div align="center">
                <p class="h3">Free Day</p>
            </div>
        </div>
        <div class="col-4">
            <div align="center">
                <a href="rate&review"><p class="h3">Rate & Review</p></a>
            </div>
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
                    <a href="/EditFreeDay/{{ $user -> username }}" class="btn btn-outline-primary">Edit free day</a>
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

$(function() {
    $('.calendar').pignoseCalendar({
        enabledDates: [ 
            '2018-09-11',  '2018-09-15',  '2018-09-16', 
         ]
    });
});
</script>
@endsection
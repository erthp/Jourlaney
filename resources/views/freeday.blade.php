@extends('headerprofile')
@section('page')
<br><br>
<div class="container profilemenu">
<div class="row">
        <div class="col-4">
            <div align="center">
            <a href="profile"><p class="h3">Trips</p></a>
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
            
        </div>
    </div>
</div>
<script>
$(function() {
    $('.calendar').pignoseCalendar({
        enabledDates: [
            document.getElementById('freeDay').value
        ]
    });
});
</script>
@endsection
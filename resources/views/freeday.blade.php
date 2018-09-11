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
        </div>
        <div class ="col-6 text-center">
            
        </div>
    </div>
</div>
<script>
$(function() {
    $('.calendar').pignoseCalendar({
        disabledDates: [
			'2017-01-01',
			'2017-06-01',
			'2017-06-02'
        ]
    });
});
</script>
@endsection
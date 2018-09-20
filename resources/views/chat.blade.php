@extends('headernav')
@section('page')
<div class="container">
    <div class="row navGap">
        <div class="col-12">
            <h3>Chat with</h3>
            <h4 class="chat-trip-title">on trip..</h4>
        </div>
    </div>
    <div class="row mt-4 chat-body">
        <div class="col-3 chat-left">
            @foreach( $chatList as $chatLists )
                {{ $chatLists -> chatRoomId }}
            @endforeach
        </div>
        <div class="col-6 chat-middle">
            <input type="hidden" name="h_maxID" id="h_maxID" value="0">
            <div class="input-group chat-form">
                <input type="text" class="form-control" id="msg" name="msg">
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
        <div class="col-3 chat-right"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
        $('.container').load('data.php');
        }, 2000);
});   
</script>
@endsection
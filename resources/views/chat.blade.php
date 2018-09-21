@extends('headernav')
@section('page')
<div class="container">
    <div class="row navGap">
            <div class="col-1">
                <img src="../images/profilepic/{{$query[0]->userProfileImage}}" class="profileImageTrip">
            </div>
            <div class="col-11">
                <h3>Chat with <a href="/Profile/{{ $query[0] -> username }}">{{ $query[0] -> userFirstName }}</a></h3>
                <h4 class="chat-trip-title">on {{ $query[0] -> tripName }} trip</h4>
            </div>
    </div>
    <div class="row mt-4 chat-body">
        <div class="col-3 chat-left">
            @foreach( $chatList as $chatLists )
            <div class="row chatListBox">
                    <div class="col-4 mt-4 mb-4">
                        <img src="../images/profilepic/{{$query[0]->userProfileImage}}" class="profileImageChat">
                    </div>
                    <div class="col-8 mt-4 mb-4">
                        <p>{{ $chatLists -> userFirstName }}</p>
                        <p>{{ $chatLists -> chatText }}</p>
                    </div>
            </div>
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
        <div class="col-3 chat-right">
            <div class="row mt-4">
                <div class="col-12">
                    <p class="center-div">You're chatting with {{ $query[0] -> userFirstName }}</p>
                    <p class="center-div">on {{ $query[0] -> tripName }} trip</p>
                    <p class="center-div">Status: </p>
                </div>
            </div>
        </div>
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
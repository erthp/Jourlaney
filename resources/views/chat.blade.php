@extends('headerNav')
@section('page')
<div class="container">
    <div class="row navGap">
            <div class="col-1">
                <img src="../images/profilepic/{{$query[0]->userProfileImage}}" class="profileImageTrip">
            </div>
            <div class="col-11">
                <h3>Chat with <a href="/Profile/{{ $query[0] -> username }}">{{ $query[0] -> userFirstName }}</a></h3>
                <h4 class="chat-trip-title">on {{ $query[0] -> tripName }} trip <span class="badge badge-pill badge-secondary">#{{ $query[0] -> chatRoomId }}</span></h4>
            </div>
    </div>
    <div class="row mt-4 chat-body">
        <div class="col-3 chat-left">
            @foreach( $chatList as $chatLists )
            <a href="/chat/{{ $chatLists -> chatRoomId }}">
                <div class="row chatListBox">
                    <div class="col-4 mt-4 mb-2">
                        <img src="../images/profilepic/{{$query[0]->userProfileImage}}" class="profileImageChat">
                    </div>
                    <div class="col-8 mt-4 mb-2">
                        <p class="chat-list-name">{{ $chatLists -> userFirstName }}</p>
                        <p class="chat-list-trip">on {{ $chatLists -> tripName }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="col-6 chat-middle" id="chat-middle">
            @foreach( $query as $query )
                @if(Session::get('touristid'))
                    @if(($query -> sender) == "Tourist")
                    <div class="row text-right mb-2">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <span class="badge badge-pill badge-info chat-text">
                            {{ $query -> chatText }}
                            </span>
                            <span class="chat-time-right"><br>{{ $query -> chatTime }}</span>
                        </div>
                    </div>
                    @elseif(($query -> sender) == "Guide")
                    <div class="row text-left mb-2">
                        <div class="col-6">
                            <span class="badge badge-pill badge-light chat-text">
                            {{ $query -> chatText }}
                            </span>
                            <span class="chat-time-left"><br>{{ $query -> chatTime }}</span>
                        </div>
                        <div class="col-6"></div>
                    </div>
                    @endif
                @elseif(Session::get('guideid'))
                    @if(($query -> sender) == "Guide")
                    <div class="row text-right mb-2">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <span class="badge badge-pill badge-info chat-text">
                            {{ $query -> chatText }}
                            </span>
                            <span class="chat-time-right"><br>{{ $query -> chatTime }}</span>
                        </div>
                    </div>
                    @elseif(($query -> sender) == "Tourist")
                    <div class="row text-left mb-2">
                        <div class="col-6">
                            <span class="badge badge-pill badge-light chat-text">
                            {{ $query -> chatText }}
                            </span>
                            <span class="chat-time-left"><br>{{ $query -> chatTime }}</span>
                        </div>
                        <div class="col-6"></div>
                    </div>
                    @endif
                @endif
            @endforeach
        </div>

        <div class="col-3 chat-right">
            <div class="row mt-4">
                <div class="col-12">
                    <p class="center-div">You're chatting with {{ $query -> userFirstName }}</p>
                    <p class="center-div">on {{ $query -> tripName }} trip</p>
                    <p class="center-div">Status: </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{URL::to('/sendChat')}}">
                <input type="hidden" name="chatRoomId" value="{{ $chatRoomId }}">
                <input type="hidden" name="guideId" value="{{ $chatLists -> guideId }}">
                <input type="hidden" name="touristId" value="{{ $chatLists -> touristId }}">
                <input type="hidden" name="guideTripId" value="{{ $chatLists -> guideTripId }}">
                
                <div class="row chat-sentbox">
                    <div class="col-12">
                        <div class="input-group chat-form">
                            <input type="text" class="form-control" id="msg" name="msg" autofocus>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                    </div>
                </div>
            </div>
        <div class="col-3"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
        $('.container').load('{{ route('showChat') }}');
        }, 2000);
        var message = document.getElementById('chat-middle');
        message.scrollTop = message.scrollHeight - message.clientHeight;
});   
</script>
@endsection
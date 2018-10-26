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
                    <p class="center-div chat-status-tripname">on {{ $query -> tripName }} trip</p>

                    @if(!empty(session::get('guideid')))
                        @if(($orderStatus[0] -> status) == "Chat")
                            <p class="center-div chat-status">Status: Chat</p>
                            <button type="button" class="btn btn-success btn-block">Create trip order</button>
                            <p class="center-div">Create order for tourist's transfer</p>
                        @elseif(($orderStatus[0] -> status) == "Transfer")
                            <p class="center-div chat-status">Status: Transfer</p>
                            <p class="center-div">Wait for transfer confirmation</p>
                        @elseif(($orderStatus[0] -> status) == "Confirmed")
                            <p class="center-div chat-status">Status: Trip Confirmed</p>
                            <p class="center-div">Prepare for trip in selected date.</p>
                        @elseif(($orderStatus[0] -> status) == "Success")
                            <p class="center-div chat-status">Status: Trip Success</p>
                            <p class="center-div">Wait for tourist confirmation. If tourist doesn't confirm. Order will confirmed automatically in 3 days after trip completed.</p>
                        @elseif(($orderStatus[0] -> status) == "Review")
                            <p class="center-div chat-status">Status: Review</p>
                            <button type="button" class="btn btn-primary btn-block">Rate and review your guide</button>
                            <p class="center-div">Rate and review your guide</p>
                        @endif
                    @elseif(!empty(session::get('touristid')))
                        @if(($orderStatus[0] -> status) == "Chat")
                            <p class="center-div chat-status">Status: Chat</p>
                            <p class="center-div">You can chat with guide for details and pricing agreement. After agreement completed, guide will create trip order for you.</p>
                        @elseif(($orderStatus[0] -> status) == "Transfer")
                            <p class="center-div chat-status">Status: Transfer</p>
                            <div class="omise-popup center-div">
                                <form name="checkoutForm" method="POST" action="/chargeOmise">
                                    <input type="hidden" name="description" value="order ฿{{$orderStatus[0] -> tripCost}}.00" />
                                    <input type="hidden" name="amount" value="{{$orderStatus[0] -> tripCost}}00" />
                                    <input type="hidden" name="name" value="abc" />
                                            <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                                                data-key="pkey_test_5d13mw1sktn0oad4nei"
                                                data-image="http://52.221.186.101/pic/add.png"
                                                data-frame-label="Jourlaney"
                                                data-button-label="Transfer to system"
                                                data-submit-label="Submit"
                                                data-location="no"
                                                data-amount="{{$orderStatus[0] -> tripCost}}00" 
                                                data-currency="thb"
                                                >
                                            </script>
                                        <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            <p class="center-div">You must transfer trip cost to system to confirm this order</p>
                        @elseif(($orderStatus[0] -> status) == "Confirmed")
                            <p class="center-div chat-status">Status: Trip Confirmed</p>
                            <p class="center-div">Meet up at selected place and time.</p>
                        @elseif(($orderStatus[0] -> status) == "Success")
                            <p class="center-div chat-status">Status: Trip Success</p>
                            <button type="button" class="btn btn-success btn-block">Confirm Trip</button>
                            <p class="center-div">Confirm trip and transfer trip cost to guide.</p>
                            <a class="center-div">Have a problem? Contact us.</a>
                        @elseif(($orderStatus[0] -> status) == "Review")
                            <p class="center-div chat-status">Status: Review</p>
                            <button type="button" class="btn btn-primary btn-block">Rate and review your guide</button>
                            <p class="center-div">Rate and review your guide</p>
                        @endif
                    @endif
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
@extends('headerNav')
@section('page')
<div class="container" id="chatPage">
    <input type="hidden" name="chatRoomId" id="chatRoomId" value="{{ $chatRoomId }}">
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
                        <img src="../images/profilepic/{{$chatLists->userProfileImage}}" class="profileImageChat">
                    </div>
                    <div class="col-8 mt-4 mb-2">
                        <p class="chat-list-name">{{ $chatLists -> userFirstName }} @if(($chatLists -> unread) == 0)<i class="fas fa-circle unread-icon fa-sm"></i>@endif</p>
                        <p class="chat-list-trip">on {{ $chatLists -> tripName }}</p><span class="badge badge-pill badge-secondary">#{{ $chatLists -> chatRoomId }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="col-6 chat-middle" id="chat-middle">
            @if(Session::get('touristid') == ($query[0] -> touristId) || Session::get('guideid') == ($query[0] -> guideId))
                @foreach( $query as $query )
                    @if(Session::get('touristid'))
                        @if(($query -> sender) == "Tourist")
                        <div class="row text-right mt-1 mb-1">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <span class="badge badge-pill badge-info chat-text">
                                {{ $query -> chatText }}
                                </span>
                                <span class="chat-time-right"><br>{{ $query -> chatTime }} @if(($query -> readStatus) == 1)|<b>Read</b>@endif</span>
                            </div>
                        </div>
                        @elseif(($query -> sender) == "Guide")
                        <div class="row text-left mt-1 mb-1">
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
                        <div class="row text-right mt-1 mb-1">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <span class="badge badge-pill badge-info chat-text">
                                {{ $query -> chatText }}
                                </span>
                                <span class="chat-time-right"><br>{{ $query -> chatTime }} @if(($query -> readStatus) == 1)| <b>Read</b>@endif</span>
                            </div>
                        </div>
                        @elseif(($query -> sender) == "Tourist")
                        <div class="row text-left mt-1 mb-1">
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
            @endif
        </div>

        <div class="col-3 chat-right">
            <div class="row mt-4">
                <div class="col-12">
                    

                    @if(!empty(session::get('guideid')))
                        @if(($orderStatus[0] -> status) == "Chat")
                            <p class="center-div chat-status">Status: Chat</p>
                            <div class="center-div">
                                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#createTrip">Create trip order</button>
                            </div>
                            <div class="modal fade" id="createTrip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Create Order</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{URL::to('/createOrder')}}" method="POST" name="createOrder" enctype="multipart/form-data">
                                                <input type="hidden" name="chatRoomId" value="{{$orderStatus[0] -> chatRoomId}}" />
                                                <div class="form-group">
                                                    <label>Trip name</label>
                                                    <input type="text" class="form-control" name="tripName" value="{{ $query -> tripName }}" disabled>
                                                    <small class="form-text text-muted">Trip name has automatically generated.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Meetup date</label>
                                                    <input type="date" class="form-control" name="startDate">
                                                </div>
                                                <div class="form-group">
                                                    <label>Trip details</label>
                                                    <textarea class="form-control" name="tripDetails"></textarea>
                                                    <small class="form-text text-muted">You can fill agreement details or meetup location here.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Trip cost</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">฿</span>
                                                        </div>
                                                        <input type="number" class="form-control tripCost" aria-label="Cost" name="tripCost" id="tripCost" onkeyup="Calculate()">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>
                                                    <small class="form-text text-muted">You will recieve trip cost after calculated from service charge and tax deduction.</small>
                                                </div>

                                                {{ csrf_field() }}
                                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Create order</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <p class="center-div">Create order for tourist's transfer</p>

                        @elseif(($orderStatus[0] -> status) == "Transfer")
                            <p class="center-div chat-status">Status: Transfer</p>
                            <p class="center-div">Wait for transfer confirmation</p>
                            <div class="center-div">
                                <button type="submit" class="btn btn-danger btn-block mb-2" data-toggle="modal" data-target="#cancelOrder">Cancel order</button>
                            </div>
                            <div class="modal fade" id="cancelOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <form name="cancelOrder" method="POST" action="/cancelOrder">
                                        <input type="hidden" name="chatRoomId" value="{{$orderStatus[0] -> chatRoomId}}" />
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cancel order</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-success">Yes</button>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        </form>
                                    </div>
                            </div>
                            <p class="center-div chat-order-status">Details: {{ $orderStatus[0] -> agreementDetails }}</p>
                            <p class="center-div">Start date: {{ $orderStatus[0] -> tripStartDate }}</p>
                            <p class="center-div">Cost: ฿{{ $orderStatus[0] -> tripCost }}.00</p>
                            <p class="center-div">You'll recieve: ฿{{ $orderStatus[0] -> tripCostWithVat }}.00</p>

                        @elseif(($orderStatus[0] -> status) == "Confirmed")
                        <div class="check_mark">
                                <div class="sa-icon sa-success animate">
                                    <span class="sa-line sa-tip animateSuccessTip"></span>
                                    <span class="sa-line sa-long animateSuccessLong"></span>
                                    <div class="sa-placeholder"></div>
                                    <div class="sa-fix"></div>
                                </div>
                            </div>
                            <script>
                                $("body").onload(function() {
                                    $(".sa-success").addClass("hide");
                                    setTimeout(function() {
                                        $(".sa-success").removeClass("hide");
                                    }, 10);
                                });
                            </script>
                            <p class="center-div chat-status animated pulse">Status: Trip Confirmed</p>
                            <p class="center-div">Prepare for trip in selected date.</p>
                            <p class="center-div">Wait for tourist confirmation. If tourist doesn't confirm. Order will confirmed automatically in 3 days after trip completed.</p>
                            <p class="center-div chat-order-status">Details: {{ $orderStatus[0] -> agreementDetails }}</p>
                            <p class="center-div">Start date: {{ $orderStatus[0] -> tripStartDate }}</p>
                            <p class="center-div">Cost: ฿{{ $orderStatus[0] -> tripCost }}.00</p>
                            <p class="center-div">You'll recieve: ฿{{ $orderStatus[0] -> tripCostWithVat }}.00</p>

                        @elseif(($orderStatus[0] -> status) == "Review")
                        @if(empty($orderStatus[0] -> touristRating))
                            <p class="center-div chat-status">Status: Review</p>
                            <div class="center-div">
                                <button type="submit" class="btn btn-primary btn-block mb-2" data-toggle="modal" data-target="#ratereview">Rate and review your tourist</button>
                            </div>
                            <div class="modal fade" id="ratereview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Rate and Review</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{URL::to('/rateReview')}}" method="POST" name="rateReview" enctype="multipart/form-data">
                                                <input type="hidden" name="chatRoomId" value="{{$orderStatus[0] -> chatRoomId}}" />
                                                <div class="form-group center-div">
                                                    <fieldset class="rating">
                                                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group center-div">
                                                    <label class="mr-2">Comment</label>
                                                    <textarea class="form-control" name="review"></textarea>
                                                </div>
                                                <small class="form-text text-muted">You won't change any rating or review comment after submitted.</small>
                                                
                                                {{ csrf_field() }}
                                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <p class="center-div">Rate and review your tourist</p>
                            @else
                            <p class="center-div chat-status">Status: Reviewed</p>
                            <p class="center-div">Everything has completed. Thank you for using Jourlaney :)</p>
                            @endif
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
                                    <input type="hidden" name="chatRoomId" value="{{$orderStatus[0] -> chatRoomId}}" />
                                            <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                                                data-key="pkey_test_5d13mw1sktn0oad4nei"
                                                data-image="http://52.221.186.101/pic/add.png"
                                                data-frame-label="Jourlaney"
                                                data-button-label="Pay now"
                                                data-submit-label="Submit"
                                                data-location="no"
                                                data-amount="{{$orderStatus[0] -> tripCost}}00" 
                                                data-currency="thb"
                                                >
                                            </script>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            <p class="center-div">You must transfer trip cost to system to confirm this order</p>
                            <p class="center-div chat-order-status">Trip name: {{ $query -> tripName }}</p>
                            <p class="center-div">Details: {{ $orderStatus[0] -> agreementDetails }}</p>
                            <p class="center-div">Start date: {{ $orderStatus[0] -> tripStartDate }}</p>
                            <p class="center-div">Cost: ฿{{ $orderStatus[0] -> tripCost }}.00</p>
                        
                        @elseif(($orderStatus[0] -> status) == "Confirmed")
                            <div class="check_mark">
                                <div class="sa-icon sa-success animate">
                                    <span class="sa-line sa-tip animateSuccessTip"></span>
                                    <span class="sa-line sa-long animateSuccessLong"></span>
                                    <div class="sa-placeholder"></div>
                                    <div class="sa-fix"></div>
                                </div>
                            </div>
                            <script>
                                $("body").onload(function() {
                                    $(".sa-success").addClass("hide");
                                    setTimeout(function() {
                                        $(".sa-success").removeClass("hide");
                                    }, 10);
                                });
                            </script>
                            <p class="center-div chat-status animated pulse">Status: Trip Confirmed</p>
                            <p class="center-div">Meet up at selected place and time.</p>
                            <div class="center-div">
                                <button type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#confirmOrder">Confirm Trip</button>
                            </div>
                            <div class="modal fade" id="confirmOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <form name="confirmOrder" method="POST" action="/confirmOrder">
                                        <input type="hidden" name="chatRoomId" value="{{$orderStatus[0] -> chatRoomId}}" />
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm Trip</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            <p class="center-div">Confirm trip and transfer trip cost to guide.</p>
                            <form name="report" method="POST" action="/reportForm">
                                <input type="hidden" name="chatRoomId" value="{{ $chatRoomId }}">
                                <div class="center-div">
                                    <button type="submit" class="btn btn-secondary btn-sm mb-2">Have a problem? Contact us.</button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                            <p class="center-div chat-order-status">Trip name: {{ $query -> tripName }}</p>
                            <p class="center-div">Details: {{ $orderStatus[0] -> agreementDetails }}</p>
                            <p class="center-div">Start date: {{ $orderStatus[0] -> tripStartDate }}</p>
                            <p class="center-div">Cost: ฿{{ $orderStatus[0] -> tripCost }}.00</p>
                        
                        @elseif(($orderStatus[0] -> status) == "Review")
                            @if(empty($orderStatus[0] -> guideRating))
                            <p class="center-div chat-status">Status: Review</p>
                            <div class="center-div">
                                <button type="submit" class="btn btn-primary btn-block mb-2" data-toggle="modal" data-target="#ratereview">Rate and review your guide</button>
                            </div>
                            <div class="modal fade" id="ratereview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Rate and Review</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{URL::to('/rateReview')}}" method="POST" name="rateReview" enctype="multipart/form-data">
                                                <input type="hidden" name="chatRoomId" value="{{$orderStatus[0] -> chatRoomId}}" />
                                                <div class="form-group center-div">
                                                    <fieldset class="rating">
                                                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group center-div">
                                                    <label class="mr-2">Comment</label>
                                                    <textarea class="form-control" name="review"></textarea>
                                                </div>
                                                <small class="form-text text-muted">You won't change any rating or review comment after submitted.</small>
                                                
                                                {{ csrf_field() }}
                                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <p class="center-div">Rate and review your guide</p>
                            @else
                            <p class="center-div chat-status">Status: Reviewed</p>
                            <p class="center-div">Everything has completed. Thank you for using Jourlaney :)</p>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <form method="POST" action="{{URL::to('/searchChat')}}" autocomplete="off">                    
                    <div class="row chat-sentbox">
                        <div class="col-12">
                            <div class="input-group chat-form">
                                <input type="text" class="form-control" id="chatSearch" name="chatSearch">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <form method="POST" action="{{URL::to('/sendChat')}}" autocomplete="off">
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
<script>
    $(document).ready(function() {
        var message = document.getElementById('chat-middle');
        message.scrollTop = message.scrollHeight;


        $("#chat-middle").mouseleave(function(){
        var timeout = setInterval(reloadChat, 1000);
        var chatRoomId = document.getElementById('chatRoomId');
            function reloadChat () {
            $('#chat-middle').load('{{ action('ChatController@ShowChatOnly', ['chatRoomId' => $chatRoomId]) }}');
            
            var message = document.getElementById('chat-middle-only');
            message.scrollTop = message.scrollHeight;
            
            }
        });

});
</script>
@endsection
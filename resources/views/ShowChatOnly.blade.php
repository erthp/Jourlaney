<head>
<link href="{{ URL::asset('css/jourlaney.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<div class="chat-middle-only" id="chat-middle-only">
            @if(Session::get('touristid') == ($query[0] -> touristId) || Session::get('guideid') == ($query[0] -> guideId))
                @foreach( $query as $query )
                    @if(Session::get('touristid'))
                        @if(($query -> sender) == "Tourist")
                        <div class="row text-right mb-2">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <span class="badge badge-pill badge-info chat-text">
                                {{ $query -> chatText }}
                                </span>
                                <span class="chat-time-right"><br>{{ $query -> chatTime }} @if(($query -> readStatus) == 1)|<b>Read</b>@endif</span>
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
                                <span class="chat-time-right"><br>{{ $query -> chatTime }} @if(($query -> readStatus) == 1)| <b>Read</b>@endif</span>
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
            @endif
        </div>
        <script>
    $(document).ready(function() {

    var message = document.getElementById('chat-middle');
    message.scrollTop = message.scrollHeight;


});
</script>
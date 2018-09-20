<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{ URL::asset('css/chat.css') }}" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

@extends('headernav')
@section('page')
<div class = "row">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                <div class="srch_bar">
                    <div class="stylish-input-group">
                        <input type="text" class="search-bar"  placeholder="Search" >
                        <span class="input-group-addon">
                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </span> 
                    </div>
                </div>
            </div>
            <div class="inbox_chat">
                <div class="chat_list active_chat">
                    <div class="chat_people">
                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions 
                                    astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions 
                                    astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions 
                                    astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions 
                                    astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions 
                                    astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions 
                                    astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
            </div>       
        </div>
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar"  placeholder="Search" >
                            <span class="input-group-addon">
                                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span> 
                        </div>
                    </div>
                </div>
            <div class="mesgs">               
                <div class="msg_history">
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>Test which is a new approach to have all
                                    solutions</p>
                                    <span class="time_date"> 11:01 AM    |    June 9</span></div>
                                </div>
                            </div>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>Test which is a new approach to have all
                            solutions</p>
                            <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                        </div>
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>Test, which is a new approach to have</p>
                                    <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                                </div>
                            </div>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>Apollo University, Delhi, India Test</p>
                            <span class="time_date"> 11:01 AM    |    Today</span> </div>
                        </div>
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>We work directly with our designers and suppliers,
                                    and sell direct to you, which means quality, exclusive
                                    products, at a price anyone can afford.</p>
                                    <span class="time_date"> 11:01 AM    |    Today</span></div>
                                </div>
                            </div>
                        </div>
                    <!--<div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>-->
                </div>
            </div>
    </div>
<<<<<<< HEAD
    <div class="row mt-4 chat-body">
        <div class="col-3 chat-left"></div>
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
    var load_chat;
    var first_load=1;
    load_chat = function(userID){
    var maxID = $("#h_maxID").val();
    $.post("ajax_chat.php",{
        viewData:first_load,
        userID:userID,
        maxID:maxID
    },function(data){
        if(first_load==1){
            for(var k=0;k<data.length;k++){
                if(parseInt(data[0].max_id)>parseInt(maxID)){
                    $("#h_maxID").val(data[k].max_id);
                    $("#messagesDiv").append("<div class=""+data[k].data_align+"_box_chat">"+data[k].data_msg+"</div>"); 
                    $("#messagesDiv")[0].scrollTop = $("#messagesDiv")[0].scrollHeight;
                }
            };
        }else{
            if(parseInt(data[0].max_id)>parseInt(maxID)){
                $("#h_maxID").val(data[0].max_id);
                $("#messagesDiv").append("<div class=""+data[0].data_align+"_box_chat">"+data[0].data_msg+"</div>"); 
                $("#messagesDiv")[0].scrollTop = $("#messagesDiv")[0].scrollHeight;
            }
        }
        first_load++;
    });     
}

setInterval(function(){
    var userID = $("#userID2").val();
    load_chat(userID);
},1000);    
$(function(){
  $("#msg").keypress(function (e) {
    if (e.keyCode == 13) {
      var user1 = $("#userID1").val();
      var user2 = $("#userID2").val();
      var msg = $("#msg").val(); 
      $.post("ajax_chat.php",{
          user1:user1,
          user2:user2,
          msg:msg
      },function(data){
            load_chat(user2);
            $("#msg").val("");
      });
 
    }  
  });  
   
});
 
</script>
=======
</div> 

>>>>>>> 60118de5bf550806241f07abdf886e6a48000449
@endsection
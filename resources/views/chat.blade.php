@extends('headerNav')
@section('page')
<div class="container">
    <div class="row navGap">
        <div class="col-12">
            <h3>Chat with</h3>
            <h4 class="chat-trip-title">on trip..</h4>
        </div>
    </div>
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
@endsection
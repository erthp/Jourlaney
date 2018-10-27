<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ChatController extends Controller
{
    public function CreateChat(Request $request){
        $lastChatId = DB::select("select chatRoomId from ChatRoom order by chatRoomId desc limit 1");
        $chatIdObj = $lastChatId[0]->chatRoomId;
        $chatId = $chatIdObj+1;

        $touristId = $request->input('touristId');
        $guideId = $request->input('guideId');
        $guideTripId = $request->input('tripId');
        $createChat = DB::insert("insert into ChatRoom(chatRoomId, guideId, touristId, guideTripId) values(?,?,?,?)",[$chatId,$guideId,$touristId,$guideTripId]);
        $createOrder = DB::insert("insert into Order(chatRoomId, status values(?,?)",[$chatId,"Chat"]);

        $touristId = Session::get('touristid');
        $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users gu on g.username=gu.username where c.touristId=".$touristId." group by c.chatRoomId desc");
        $maxChatRoomId = DB::select("select MAX(c.chatRoomId) as chatRoomId from ChatRoom c join Tourist t on c.touristId=t.touristId where t.touristId=".$touristId);
        $chatRoomId = $maxChatRoomId[0]->chatRoomId;
        $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on t.username=u.username where c.chatRoomId =".$chatRoomId);
        return view('chat',['query' => $query])->with('chatList',$chatList)->with('chatRoomId',$chatRoomId);
    }

    public function ShowChatPage(){
        if(Session::get('guideid')){
            $guideId = Session::get('guideid');
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users tu on t.username=tu.username where c.guideId=".$guideId." group by c.chatRoomId desc");
            if(!empty($chatList)){
            $maxChatRoomId = DB::select("select MAX(c.chatRoomId) as chatRoomId from ChatRoom c join Guide g on c.guideId=g.guideId where g.guideId=".$guideId);
            $chatRoomId = $maxChatRoomId[0]->chatRoomId;
            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on t.username=u.username where c.chatRoomId =".$chatRoomId);
            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);
            }else{
                return view('404');
            }
        }elseif(Session::get('touristid')){
            $touristId = Session::get('touristid');
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users gu on g.username=gu.username join GuideTrip gt on c.guideTripId=gt.tripId where c.touristId=".$touristId." group by c.chatRoomId desc");
            if(!empty($chatList)){
                $maxChatRoomId = DB::select("select MAX(c.chatRoomId) as chatRoomId from ChatRoom c join Tourist t on c.touristId=t.touristId where t.touristId=".$touristId);
                $chatRoomId = $maxChatRoomId[0]->chatRoomId;
                $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on g.username=u.username where c.chatRoomId =".$chatRoomId);
                $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);
                //dd($orderStatus);
            }else{
                return view('404');
            }
        }else{
            return view('404');
        }
        
        return view('chat',['query' => $query])->with('chatList',$chatList)->with('chatRoomId',$chatRoomId)->with('orderStatus',$orderStatus);
    }

    public function ShowChat($chatRoomId){
        if(Session::get('guideid')){
            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on t.username=u.username where c.chatRoomId =".$chatRoomId);
            $guideId = Session::get('guideid');
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users tu on t.username=tu.username join GuideTrip gt on c.guideTripId=gt.tripId where c.guideId=".$guideId." group by c.chatRoomId desc");
            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);
        }elseif(Session::get('touristid')){
            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on g.username=u.username where c.chatRoomId =".$chatRoomId);
            $touristId = Session::get('touristid');
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users gu on g.username=gu.username join GuideTrip gt on c.guideTripId=gt.tripId where c.touristId=".$touristId." group by c.chatRoomId desc");
            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);
        }else{
            return view('404');
        }
        //dd($query);
        return view('chat',['query' => $query])->with('chatList',$chatList)->with('chatRoomId',$chatRoomId)->with('orderStatus',$orderStatus);
    }

    public function SendChat(Request $request){
        date_default_timezone_set('Asia/Bangkok');
        $time = date('Y-m-d H:i:s', time());
        $chatRoomId = $request->input('chatRoomId');
        if(Session::get('guideid')){
            $guideId = Session::get('guideid');
            $message = $request->input('msg');
            $add = DB::insert("insert into ChatRoom(chatRoomId, guideId, touristId, guideTripId, chatTime, chatText, sender) values(?,?,?,?,?,?,?)",[$chatRoomId, $request->input('guideId'), $request->input('touristId'), $request->input('guideTripId'), $time, $message, "Guide"]);
        
            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on t.username=u.username where c.chatRoomId =".$chatRoomId);
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users tu on t.username=tu.username where c.guideId=".$guideId." group by c.chatRoomId desc");
            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);

            return view('chat',['query' => $query])->with('chatList',$chatList)->with('chatRoomId',$chatRoomId)->with('orderStatus',$orderStatus);
        }elseif(Session::get('touristid')){
            $touristId = Session::get('touristid');
            $message = $request->input('msg');
            $add = DB::insert("insert into ChatRoom(chatRoomId, guideId, touristId, guideTripId, chatTime, chatText, sender) values(?,?,?,?,?,?,?)",[$chatRoomId, $request->input('guideId'), $request->input('touristId'), $request->input('guideTripId'), $time, $message, "Tourist"]);

            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on g.username=u.username where c.chatRoomId =".$chatRoomId);
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users gu on g.username=gu.username where c.touristId=".$touristId." group by c.chatRoomId desc");
            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);

            return view('chat',['query' => $query])->with('chatList',$chatList)->with('chatRoomId',$chatRoomId)->with('orderStatus',$orderStatus);
        }else{
            return view('404');
        }
    }
}

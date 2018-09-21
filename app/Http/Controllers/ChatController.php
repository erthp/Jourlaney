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
        $query = DB::insert("insert into ChatRoom(chatRoomId, guideId, touristId, guideTripId) values(?,?,?,?)",[$chatId,$guideId,$touristId,$guideTripId]);
        return view('chat')->with('chatRoomId',$chatId);
    }

    public function ShowChat($chatRoomId){
        $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on g.username=u.username where c.chatRoomId =".$chatRoomId);
        if(Session::get('guideid')){
            $guideId = Session::get('guideid');
            $chatList = DB::select("select c.chatRoomId, c.guideId, c.touristId, MAX(c.chatText) from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users gu on g.username=gu.username join Users tu on t.username=t.username where c.guideId=".$guideId." group by c.chatRoomId");
        }elseif(Session::get('touristid')){
            $touristId = Session::get('touristid');
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users gu on g.username=gu.username where c.touristId=".$touristId." group by c.chatRoomId");
        }else{
            return view('404.blade.php');
        }
        //dd($query);
        return view('chat',['query' => $query])->with('chatList',$chatList);
    }
}

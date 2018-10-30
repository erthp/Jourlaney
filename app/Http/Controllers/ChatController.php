<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;

class ChatController extends Controller
{
    public function CreateChat(Request $request){
        $lastChatId = DB::select("select chatRoomId from ChatRoom order by chatRoomId desc limit 1");
        $chatIdObj = $lastChatId[0]->chatRoomId;
        $chatId = $chatIdObj+1;

        date_default_timezone_set('Asia/Bangkok');
        $time = date('Y-m-d H:i:s', time());

        $touristId = $request->input('touristId');
        $guideId = $request->input('guideId');
        $guideTripId = $request->input('tripId');
        $createChat = DB::insert("insert into ChatRoom(chatRoomId, guideId, touristId, guideTripId, chatText, chatTime, sender) values(?,?,?,?,?,?,?)",[$chatId,$guideId,$touristId,$guideTripId,'Interested!',$time,'Tourist']);
        $createOrder = DB::insert("insert into TripOrder(chatRoomId, status) values(?,?)",[$chatId,'Chat']);

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
            $chatList = DB::select("select *, MIN(c.readStatus) as unread from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users tu on t.username=tu.username join GuideTrip gt on c.guideTripId=gt.tripId where c.guideId=".$guideId." group by c.chatRoomId desc order by MAX(c.chatTextId) desc");
            if(!empty($chatList)){
            $maxChatRoomId = DB::select("select MAX(c.chatRoomId) as chatRoomId from ChatRoom c join Guide g on c.guideId=g.guideId where g.guideId=".$guideId);
            $chatRoomId = $maxChatRoomId[0]->chatRoomId;
            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on t.username=u.username where c.chatRoomId =".$chatRoomId);

            $NotificationCount = DB::select("select count(distinct chatRoomId) as notiCount from ChatRoom where readStatus is null and sender = 'Tourist' and guideId=".$guideId);
            Session::put('NotificationCount', $NotificationCount[0]->notiCount);

            $chatReadStatus = DB::select("select readStatus from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId where c.guideId=".$guideId." and sender = 'Tourist' group by c.chatRoomId desc");

            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);
            if($orderStatus[0]->status == "Confirmed"){
                $orderCheck = DB::select("select tripStartDate from TripOrder where chatRoomId =".$chatRoomId);
                $orderDate = $orderCheck[0];
                $sub3 = Carbon::today('Asia/Bangkok')->sub('3 days')->isoFormat('YYYY-MM-DD');
                if($sub3 >= $orderCheck[0]->tripStartDate){
                    return app('App\Http\Controllers\OrderController')->ConfirmOrder();
                }
            }
            }else{
                return view('404');
            }
        }elseif(Session::get('touristid')){
            $touristId = Session::get('touristid');
            $chatList = DB::select("select *, MIN(c.readStatus) as unread from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users gu on g.username=gu.username join GuideTrip gt on c.guideTripId=gt.tripId where c.touristId=".$touristId." group by c.chatRoomId desc order by MAX(c.chatTextId) desc");
            if(!empty($chatList)){
                $maxChatRoomId = DB::select("select MAX(c.chatRoomId) as chatRoomId from ChatRoom c join Tourist t on c.touristId=t.touristId where t.touristId=".$touristId);
                $chatRoomId = $maxChatRoomId[0]->chatRoomId;
                $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on g.username=u.username where c.chatRoomId =".$chatRoomId);
                $readStatus = DB::update("update ChatRoom set readStatus = 1 where sender = 'Guide' and chatRoomId =".$chatRoomId);
                
                $NotificationCount = DB::select("select count(distinct chatRoomId) as notiCount from ChatRoom where readStatus is null and sender = 'Guide' and touristId=".$touristId);
                Session::put('NotificationCount', $NotificationCount[0]->notiCount);

                $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);
                //dd($orderStatus);
            }else{
                return view('404');
            }
        }else{
            return view('404');
        }
        
        //dd($chatList);
        return view('chat',['query' => $query])->with('chatList',$chatList)->with('chatRoomId',$chatRoomId)->with('orderStatus',$orderStatus);
    }

    public function ShowChat($chatRoomId){
        $today = Carbon::today('Asia/Bangkok')->isoFormat('YYYY-MM-DD');
        $sub3 = Carbon::today('Asia/Bangkok')->sub('3 days')->isoFormat('YYYY-MM-DD');
        if(Session::get('guideid')){
            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on t.username=u.username where c.chatRoomId =".$chatRoomId);
            $guideId = Session::get('guideid');
            $chatList = DB::select("select *, MIN(c.readStatus) as unread from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users tu on t.username=tu.username join GuideTrip gt on c.guideTripId=gt.tripId where c.guideId=".$guideId." group by c.chatRoomId desc order by MAX(c.chatTextId) desc");
            $readStatus = DB::update("update ChatRoom set readStatus = 1 where sender = 'Tourist' and chatRoomId =".$chatRoomId);

            $NotificationCount = DB::select("select count(distinct chatRoomId) as notiCount from ChatRoom where readStatus is null and sender = 'Tourist' and guideId=".$guideId);
            Session::put('NotificationCount', $NotificationCount[0]->notiCount);

            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);
        }elseif(Session::get('touristid')){
            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on g.username=u.username where c.chatRoomId =".$chatRoomId);
            $touristId = Session::get('touristid');
            $chatList = DB::select("select *, MIN(c.readStatus) as unread from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users gu on g.username=gu.username join GuideTrip gt on c.guideTripId=gt.tripId where c.touristId=".$touristId." group by c.chatRoomId desc order by MAX(c.chatTextId) desc");
            $readStatus = DB::update("update ChatRoom set readStatus = 1 where sender = 'Guide' and chatRoomId =".$chatRoomId);
            
            $NotificationCount = DB::select("select count(distinct chatRoomId) as notiCount from ChatRoom where readStatus is null and sender = 'Guide' and touristId=".$touristId);
            Session::put('NotificationCount', $NotificationCount[0]->notiCount);

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
            $add = DB::insert("insert into ChatRoom(chatRoomId, guideId, touristId, guideTripId, chatTime, chatText, sender, readStatus) values(?,?,?,?,?,?,?,?)",[$chatRoomId, $request->input('guideId'), $request->input('touristId'), $request->input('guideTripId'), $time, $message, "Guide",0]);
        
            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on t.username=u.username where c.chatRoomId =".$chatRoomId);
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join Users tu on t.username=tu.username join GuideTrip gt on c.guideTripId=gt.tripId where c.guideId=".$guideId." group by c.chatRoomId desc");
            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);

            return view('chat',['query' => $query])->with('chatList',$chatList)->with('chatRoomId',$chatRoomId)->with('orderStatus',$orderStatus);
        }elseif(Session::get('touristid')){
            $touristId = Session::get('touristid');
            $message = $request->input('msg');
            $add = DB::insert("insert into ChatRoom(chatRoomId, guideId, touristId, guideTripId, chatTime, chatText, sender, readStatus) values(?,?,?,?,?,?,?)",[$chatRoomId, $request->input('guideId'), $request->input('touristId'), $request->input('guideTripId'), $time, $message, "Tourist",0]);

            $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on g.username=u.username where c.chatRoomId =".$chatRoomId);
            $chatList = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users gu on g.username=gu.username where c.touristId=".$touristId." group by c.chatRoomId desc");
            $orderStatus = DB::select("select * from TripOrder where chatRoomId =".$chatRoomId);
            
            //dd($chatList);
            return view('chat',['query' => $query])->with('chatList',$chatList)->with('chatRoomId',$chatRoomId)->with('orderStatus',$orderStatus);
        }else{
            return view('404');
        }
    }

    public function reportForm(Request $request){
        $chatRoomId = $request->input('chatRoomId');
        $touristId = Session::get('touristid');
        $query = DB::select("select * from ChatRoom c join Guide g on c.guideId=g.guideId join Tourist t on c.touristId=t.touristId join GuideTrip gt on c.guideTripId=gt.tripId join Users u on g.username=u.username join TripOrder ord on c.chatRoomId=ord.chatRoomId where c.chatRoomId =".$chatRoomId);
        return view('Report',['query' => $query]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
require_once dirname(__FILE__).'/omise/lib/Omise.php';
use OmiseTransfer;
define('OMISE_PUBLIC_KEY', 'pkey_test_5d13mw1sktn0oad4nei');
define('OMISE_SECRET_KEY', 'skey_test_5d13mw1svuw4e05c05q');

class OrderController extends Controller
{
    public function CreateOrder(Request $request){
    
        $chatRoomId = $request->input('chatRoomId');
        $agreementDetails = $request->input('tripDetails');
        $tripStartDate = $request->input('startDate');
        $tripCost = $request->input('tripCost');
        $tripCostWithVat = ($tripCost * 83) / 100;

        $query = DB::update('update TripOrder set status = ?, agreementDetails = ?, tripStartDate = ?, tripCost = ?, tripCostWithVat = ? where chatRoomId = ?',["Transfer",$agreementDetails,$tripStartDate,$tripCost,$tripCostWithVat,$chatRoomId]);
        return app('App\Http\Controllers\ChatController')->ShowChatPage();
    }

    public function ConfirmOrder(Request $request){
        
        $chatRoomId = $request->input('chatRoomId');
        $query = DB::update('update TripOrder set status = ? where chatRoomId = ?',["Review",$chatRoomId]);
        
        $guideBankAccount = DB::select('select bankAccountNumber from GuideBankAccount gba join ChatRoom cr on gba.guideId=cr.guideId where cr.chatRoomId ='.$chatRoomId);
        $transferCost = DB::select('select tripCostWithVat from TripOrder where chatRoomId ='.$chatRoomId);
        $costVat = ($transferCost[0]->tripCostWithVat)."00";
        $intAmount = (int)$costVat;

        $transfer = OmiseTransfer::create(array(
            'amount' => $intAmount,
            'recipient' => $guideBankAccount
            ));
        return app('App\Http\Controllers\ChatController')->ShowChatPage();
    
    }

    public function CancelOrder(Request $request){
        
        $chatRoomId = $request->input('chatRoomId');
        $query = DB::update('update TripOrder set status = ? where chatRoomId = ?',["Chat",$chatRoomId]);
        
        return app('App\Http\Controllers\ChatController')->ShowChatPage();
    
    }
}

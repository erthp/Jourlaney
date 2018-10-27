<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
}

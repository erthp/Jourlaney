<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowTripDetail extends Model
    {
       public $timestamps = false;
       protected $table = 'GuideTrip'; //เพื่อแสดงข้อมูลตารางทริปที่ถูก add ค่าเข้ามา
    }
    
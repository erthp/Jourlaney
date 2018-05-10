<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $guideTrip = 'GuideTrip';
    protected $touristTrip = 'TouristTrip';
    public $timestamps = false;
    protected $table = "GuideTrip";
    protected $primarykey = "tripId";

}
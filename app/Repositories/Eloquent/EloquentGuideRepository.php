<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use app\Model\Guide;
use app\Model\Trip;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\GuideRepository;

class EloquentGuideRepository implements GuideRepository
{
    public function entity(){
        return Guide::class;
    }

    public static function guideRegister(Request $request){
        
    }
}

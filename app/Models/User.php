<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $table = "Users";
    protected $primarykey = "username";

    protected $fill = ['username','userPassword'];
}

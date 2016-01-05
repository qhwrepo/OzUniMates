<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $fillable = ['username','password','email','wechat','degree','country','university','skills'];
}

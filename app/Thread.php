<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';
    protected $fillable = ['student_id','consultant_id'];
}

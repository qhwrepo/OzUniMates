<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function students() {
    	return $this->belongsToMany('App\Student');
    }
}

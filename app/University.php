<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'universities';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function students() {
    	return $this->belongsToMany('App\Student');
    }
}

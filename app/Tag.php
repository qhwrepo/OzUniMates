<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function consultants() {
    	return $this->belongsToMany('App\Consultant');
    }
}

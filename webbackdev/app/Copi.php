<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copi extends Model
{
    protected $table = 'ap_copi';
	
	public function state()
    {
    	return $this->belongsTo(State::class);
    }
}

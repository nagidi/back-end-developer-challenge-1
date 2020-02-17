<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'ap_states';
	
	public function copis()
    {
    	return $this->hasMany(Copi::class);
    }
}

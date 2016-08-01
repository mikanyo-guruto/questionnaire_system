<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';

	public function member()
	{
		return $this->hasMany('App\Member');
	}

    public function evaluation()
    {
    	return $this->hasMany('App\Evaluation');
    }
}

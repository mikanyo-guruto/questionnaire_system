<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public function product()
    {
    	echo 'ok';
    	return $this->belongsTo('QuList');
    }
}

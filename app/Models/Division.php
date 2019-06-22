<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Division extends Model
{
    public function districts()
    {
    	return $this->hasMany(District::class);
    }
}

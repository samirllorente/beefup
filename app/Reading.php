<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = [
    	'user_id','title','content',
    ];
}

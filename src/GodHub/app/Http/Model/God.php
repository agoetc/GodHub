<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class God extends Model
{
    protected $table = 'gods';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

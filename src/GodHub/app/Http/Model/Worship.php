<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    protected $table = 'worships';

    public function god(){
        return $this->belongsTo('App\Model\God', 'god_id');
    }
}

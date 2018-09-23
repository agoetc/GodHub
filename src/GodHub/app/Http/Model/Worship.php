<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    protected $table = 'worships';

    protected $guarded = ['id', 'god_id', 'user_id'];

    public function god(){
        return $this->belongsTo('App\Model\God', 'god_id');
    }
}

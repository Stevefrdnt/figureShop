<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    public $timestamps=false;

    public function figure(){
        return $this->hasMany(Figure::class);
    }
}

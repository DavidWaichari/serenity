<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function sponsors()
    {
        return $this->belongsToMany('App\Sponsor');
    }
}

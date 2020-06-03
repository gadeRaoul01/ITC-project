<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function typeTransaction(){
        return $this->belongsTo('App\typeTransaction');
    }

    public function numCompte(){
        return $this->belongsTo('App\numCompte');
    }
}

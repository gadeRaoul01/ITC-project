<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portefeuille extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}

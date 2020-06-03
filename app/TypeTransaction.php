<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTransaction extends Model
{
    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
}

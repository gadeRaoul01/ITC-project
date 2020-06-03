<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{

    public  function  JoursFerie(){
        return $this->hasMany('App\JourFerie');
    }
}

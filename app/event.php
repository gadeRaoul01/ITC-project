<?php

namespace App;




use Illuminate\Support\Carbon;

class event
{
    public $title;
    public $start;
    public $className;
    public $end;
    public $id;
//    public $allDay;


    function __construct($id, $start, $duree, $title)
    {

        $this->id = $id;
        $this->title = $title;
        $this->start = Carbon::create($start . '00:00:00');
        $this->className = 'fc-event-danger';
        $this->end =Carbon::create($this->start->year.'-'.$this->start->month.'-'.$this->start->day.' 24:00:00' );

//        $this->end = strtotime('02:00');
//        $this->allDay = true ;


    }


}

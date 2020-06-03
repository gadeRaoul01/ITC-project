<?php

namespace App\Http\Controllers;

use App\Annee;
use App\event;
use App\JourFerie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CalendrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $annees = Annee::all();
        return  view('admin.gestionCalendrier.index', compact('annees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateArray = explode('/',($request->input('jourDate') ) ) ;
        $date =  Carbon::create($dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0]);
        $jourF = JourFerie::where('date','=',$date)->first();
        if ($jourF){
            return ['code'=> true,'message'=>'Date déja enregistré comme ferié'];
        }else{
            $annee= Annee::where('libelle','=',$request->input('anneeL'))->first();

            if($annee){
                $jour = new JourFerie();

                $jour->date = $date;
                $jour->motif = $request->input('motif');
                $jour->annee_id = $annee->id ;
                $jour->save();
            }
            return ['code'=> false,'message'=>'Date  enregistré '];
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $JF = JourFerie::find($id);
$testt = new Carbon($JF->created_at);
//$JF->created_at = $JF->created_at->to;
        return $testt->format('d/m/Y H:m:s') ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dateArray = explode('/',($request->input('jourDate') ) ) ;
        $date =  Carbon::create($dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0]);
        $dateSearch = JourFerie::where('date','=',$date)->first();

        if ($dateSearch){
            return ['code'=> true,'message'=>'Cette date exite déjà en tant que jour férié '];
        }else{
            $jour =  JourFerie::find($request->input('id'));

            $jour->date = $date;
            $jour->motif = $request->input('motif');
            $jour->update();

            return ['code'=> false,'message'=>'Date  modifié '];
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDateFerie($annee){
        $annee = Annee::where('libelle','=',$annee)->first();
        $JF = $annee->JoursFerie ;

        $JourFeriers= array();

        foreach ($JF as $el) {

            $event = new event($el->id,$el->date,'24:00:00',$el->motif);

            $JourFeriers[] = $event;
        }


        return $JourFeriers;

    }
}

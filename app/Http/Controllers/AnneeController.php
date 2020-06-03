<?php

namespace App\Http\Controllers;

use App\Annee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $annees = Annee::all();
        return view('admin.annee.index', compact('annees'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $an = Annee::where('libelle', '=', $request->input('annee'))->first();


        if ($an) {
            return ['code' => true, 'message' => 'Année déja enregistré'];
        } else {
            $annee = new Annee();
            $annee->libelle = $request->input('annee');
            $annee->save();

            return ['code' => false, 'message' => 'Date  enregistré '];
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDateFerie($annee)
    {
        $annee = Annee::where('libelle', '=', $annee)->first();
        $JFs = $annee->JoursFerie;
        return datatables()->of($JFs)
            ->addColumn('action', function ($JF) {


                if ($JF->flag_etat == true) {

                    return '
             
      <a onclick="editJF(' . $JF->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateJF(' . $JF->id . ')" >
                <i class="fa fa-fw ti-unlock text-danger actions_icon" title="Débloquer le jour ferié"></i>
             </a>


                    ';


                } else {
                    return '
       
         <a onclick="editJF(' . $JF->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateJF(' . $JF->id . ')" >
                <i class="fa fa-fw ti-unlock text-danger actions_icon" title="Débloquer le jour ferié"></i>
             </a>

                    ';
                }


            })
            ->addColumn('etat', function ($Approvsionement) {
                $string = '';
                if ($Approvsionement->flag_supp == true) {
                    $string = 'Innactif';
                } else if ($Approvsionement->flag_supp == false) {
                    $string = 'Actif';
                }
                return $string;
            })
            ->addColumn('created_at', function ($JF) {

               $created_at = new Carbon($JF->created_at) ;
                $created_at = $created_at->format('d/m/Y H:m:s') ;
                return $created_at;

            })
            ->addColumn('updated_at', function ($JF) {

               $updated_at = new Carbon($JF->updated_at) ;
                $updated_at = $updated_at->format('d/m/Y H:m:s') ;
                return $updated_at;

            })->addColumn('date', function ($JF) {

               $date = new Carbon($JF->date) ;
                $date = $date->format('d/m/Y') ;
                return $date;

            })
            ->rawColumns(['action', 'etat','created_at'])
            ->make(true);


    }
}

<?php

namespace App\Http\Controllers\api;

use App\Annee;
use App\Http\Controllers\Controller;
use App\Investissement;
use App\Portefeuille;
use App\Systeme;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvestissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $portefeuille = Portefeuille::where('user_id', '=', $request->user()->id)->first();
        $portefeuille->solde = (int)$portefeuille->solde - (int)$request->sommes;
        $portefeuille->update();
        $configurations = Systeme::where('flag_etat', '=', false)->get(['id', 'group', 'description', 'param1', 'param2', 'param3', 'param4', 'flag_etat']);
        $taux = '';$nb_jr = ''; $nb_recup = '';

        foreach ($configurations as $conf) {
                if ($conf->group =='taux'){
                    $taux = $conf->param1 ;
                }else if ($conf->group == 'nb_jr'){
                    $nb_jr = $conf->param1 ;
                }else if ($conf->group == 'nb_recup'){
                    $nb_recup = $conf->param1;
                }
        }

        $annee = getDate();
        $annee = $annee['year'] ;
        $annee = Annee::where('libelle','=',$annee)->first();

        $investissement = new Investissement();
        $investissement->identifiant = '#'.Str::random(10);
        $investissement->montant = $request->sommes;
        $investissement->taux = $taux;
        $investissement->nb_jr = $nb_jr;
        $investissement->nb_jr_fait = 0;
        $investissement->nb_recup =$nb_recup;
        $investissement->annee_id = $annee->id;
        $investissement->portefeuille_id = $portefeuille->id;
        $investissement->save();

        return ['investissement'=>$investissement,'solde'=>$portefeuille->solde];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function getInvestissement(Request $request)
    {
        $investissements = DB::table('investissements')
            ->join('annees', 'investissements.annee_id', 'annees.id')
            ->join('portefeuilles', 'investissements.portefeuille_id', 'portefeuilles.id')
            ->join('users', 'portefeuilles.user_id', 'users.id')
            ->where('users.id', '=', $request->user()->id)
            ->select(['investissements.identifiant', 'investissements.montant',
                'investissements.taux', 'investissements.nb_jr', 'investissements.nb_jr_fait','investissements.flag_etat'])
            ->get();


        return response()
            ->json([
                'investissements' => $investissements
            ]);


    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Portefeuille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortefeuilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        $portefeuille = Portefeuille::with('transactions','transactions.numCompte','transactions.typeTransaction')->where('id','=',$request->user()->id)->first();
        $portefeuille = DB::table('portefeuilles')
            ->where('portefeuilles.user_id','=',$request->user()->id)
            ->select('portefeuilles.id as portefeuillesId','portefeuilles.solde',
                'portefeuilles.identifiant')
            ->first() ;
        $transactions =DB::table('transactions')
            ->join('num_comptes','transactions.numCompte_id','num_comptes.id')
            ->join('type_transactions','transactions.typeTransaction_id','type_transactions.id')
            ->where('transactions.portefeuille_id','=',$portefeuille->portefeuillesId)
            ->select('transactions.numero as numeroTransaction','transactions.montant as transactionMontant',
                'type_transactions.libelle as typeLibelle','num_comptes.numero as numeroCompte','transactions.identifiant as transactionIdentifiant')
            ->get() ;
        $portefeuille->transactions = $transactions;

        return response()
            ->json([
                'portefeuille' => $portefeuille
            ] );
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
        //
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
}

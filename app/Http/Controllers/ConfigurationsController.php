<?php

namespace App\Http\Controllers;

use App\Systeme;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfigurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $taux = Systeme::where('group','=','taux')->get();
//        dd($taux);
        return view('admin.configurations.index',compact(['taux']));
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
    public function store(Request $request,$group)
    {
        if ($group == 'nb_recup'){
            $config = Systeme::where('group','=',$group)->where('param1','=',$request->input('nb_recup'))->first();

            if ($config){
                return ['code'=> true,'message'=>'Nombre déja existant veuillez l\'activé'];
            }else{
                $sys = Systeme::where('group','=',$group)->where('flag_etat','=',false)->first();


                $config = new Systeme();
                $config->group = $group;
                $config->description = $sys->description ;

                $config->param1 = $request->input('nb_recup');

                $config->save();
                $sys->flag_etat = true ;
                $sys->update();

                return ['code'=> false,'message'=>'Configuration enregistré'];
            }
        }
        elseif($group == 'intervalle_invest'){
            $config = Systeme::where('group','=',$group)->where('param1','=',$request->input('min'))->where('param2','=',$request->input('max'))->first();

            if ($config){
                return ['code'=> true,'message'=>'Intervalle déja existante veuillez l\'activé'];
            }else{
                $sys = Systeme::where('group','=',$group)->where('flag_etat','=',false)->first();


                $config = new Systeme();
                $config->group = $group;
                $config->description = $sys->description ;

                $config->param1 = $request->input('min');
                $config->param2 = $request->input('max');

                $config->save();
                $sys->flag_etat = true ;
                $sys->update();

                return ['code'=> false,'message'=>'Configuration enregistré'];
            }
        }
        elseif ($group == 'nb_jr'){
            $config = Systeme::where('group','=',$group)->where('param1','=',$request->input('nb_jr'))->first();

            if ($config){
                return ['code'=> true,'message'=>'Nombre déja existant veuillez l\'activé'];
            }else{
                $sys = Systeme::where('group','=',$group)->where('flag_etat','=',false)->first();


                $config = new Systeme();
                $config->group = $group;
                $config->description = $sys->description ;

                $config->param1 = $request->input('nb_jr');

                $config->save();
                $sys->flag_etat = true ;
                $sys->update();

                return ['code'=> false,'message'=>'Configuration enregistré'];
            }
        }
        elseif ($group == 'Nb_Invest_simultane'){
            $config = Systeme::where('group','=',$group)->where('param1','=',$request->input('nbInvest'))->first();

            if ($config){
                return ['code'=> true,'message'=>'Nombre déja existant veuillez l\'activé'];
            }else{
                $sys = Systeme::where('group','=',$group)->where('flag_etat','=',false)->first();


                $config = new Systeme();
                $config->group = $group;
                $config->description = $sys->description ;

                $config->param1 = $request->input('nbInvest');

                $config->save();
                $sys->flag_etat = true ;
                $sys->update();

                return ['code'=> false,'message'=>'Configuration enregistré'];
            }
        }
        elseif ($group == 'taux'){
            $config = Systeme::where('group','=',$group)->where('param1','=',$request->input('taux'))->first();

            if ($config){
                return ['code'=> true,'message'=>'Taux déja existant veuillez l\'activé'];
            }else{
                $sys = Systeme::where('group','=',$group)->where('flag_etat','=',false)->first();


                $config = new Systeme();
                $config->group = $group;
                $config->description = $sys->description ;

                $config->param1 = $request->input('taux');

                $config->save();
                $sys->flag_etat = true ;
                $sys->update();

                return ['code'=> false,'message'=>'Configuration enregistré'];
            }
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $message ='';
        $code = true ;
        $config = Systeme::find($id);
        $confs = Systeme::where('group','=',$config->group)->where('flag_etat','=',false) ;
        if ($config->flag_etat == true){
            $configs = $confs->get();
            foreach ($configs as $conf){
                $conf->flag_etat = true;
                $conf->update();
            }
        }
        $config->flag_etat = !$config->flag_etat ;
        $config->update();


        $nbActif =  $confs->count();

        if ($nbActif >0){
         $message = 'Configuration modifier';

        }else{
            $message = 'Impossible de bloquer cette configuration car il n\'y a plus d\'autre configuration qui soit actif';
            $code = false ;

            $config->flag_etat = !$config->flag_etat ;
            $config->update();
        }




        return ['group'=>$config->group,'code'=>$code,'message'=>$message] ;
    }


    public function getConfig($group){

        if ($group == 'taux'){
            $taux = Systeme::where('group','=',$group)->get(['id','param1','flag_etat']);


          return datatables()->of($taux)
                ->addColumn('action', function ($tau) {


                    if ($tau->flag_etat == true) {

                        return '
             
      <a onclick="editTaux(' . $tau->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $tau->id . ')" >
                <i class="fa fa-fw ti-unlock text-danger actions_icon" title="Débloquer"></i>
             </a>

                    ';


                    } else {
                        return '
       
         <a onclick="editTaux(' . $tau->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $tau->id . ')" >
                <i class="fa fa-fw ti-lock text-danger actions_icon" title="Bloquer"></i>
             </a>

                    ';
                    }


                })
                ->addColumn('etat', function ($tau) {
                    $string = '';
                    if ($tau->flag_etat == true) {
                        $string = 'Innactif';
                    } else if ($tau->flag_etat == false) {
                        $string = 'Actif';
                    }
                    return $string;
                })
              ->addColumn('param1', function ($tau) {

                    return $tau->param1.' %';
                })
                ->rawColumns(['action', 'etat','param1'])
                ->make(true);
        }
        elseif ($group  == 'Nb_Invest_simultane'){
            $nbs = Systeme::where('group','=',$group)->get(['id','param1','flag_etat']);


            return datatables()->of($nbs)
                ->addColumn('action', function ($nb) {


                    if ($nb->flag_etat == true) {

                        return '
             
      <a onclick="editNb(' . $nb->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $nb->id . ')" >
                <i class="fa fa-fw ti-unlock text-danger actions_icon" title="Débloquer"></i>
             </a>
           
                    ';


                    } else {
                        return '
       
         <a onclick="editNb(' . $nb->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $nb->id . ')" >
                <i class="fa fa-fw ti-lock text-danger actions_icon" title="Bloquer"></i>
             </a>

                    ';
                    }


                })
                ->addColumn('etat', function ($tau) {
                    $string = '';
                    if ($tau->flag_etat == true) {
                        $string = 'Innactif';
                    } else if ($tau->flag_etat == false) {
                        $string = 'Actif';
                    }
                    return $string;
                })
                ->rawColumns(['action', 'etat'])
                ->make(true);
        }
        elseif ($group  == 'intervalle_invest'){
            $intervalles = Systeme::where('group','=',$group)->get(['id','param1','param2','flag_etat']);


            return datatables()->of($intervalles)
                ->addColumn('action', function ($intervalle) {


                    if ($intervalle->flag_etat == true) {

                        return '
             
      <a onclick="editIntervalle(' . $intervalle->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $intervalle->id . ')" >
                <i class="fa fa-fw ti-unlock text-danger actions_icon" title="Débloquer"></i>
             </a>
     
                    ';


                    } else {
                        return '
       
         <a onclick="editIntervalle(' . $intervalle->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $intervalle->id . ')" >
                <i class="fa fa-fw ti-lock text-danger actions_icon" title="Bloquer"></i>
             </a>
                    ';
                    }


                })
                ->addColumn('etat', function ($intervalle) {
                    $string = '';
                    if ($intervalle->flag_etat == true) {
                        $string = 'Innactif';
                    } else if ($intervalle->flag_etat == false) {
                        $string = 'Actif';
                    }
                    return $string;
                })
                ->rawColumns(['action', 'etat'])
                ->make(true);
        }
        elseif ($group  == 'nb_jr'){
            $nb_jrs = Systeme::where('group','=',$group)->get(['id','param1','flag_etat']);


            return datatables()->of($nb_jrs)
                ->addColumn('action', function ($nb_jr) {


                    if ($nb_jr->flag_etat == true) {

                        return '
             
      <a onclick="editNbJr(' . $nb_jr->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $nb_jr->id . ')" >
                <i class="fa fa-fw ti-unlock text-danger actions_icon" title="Débloquer"></i>
             </a>
            
                    ';


                    } else {
                        return '
       
         <a onclick="editNbJr(' . $nb_jr->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $nb_jr->id . ')" >
                <i class="fa fa-fw ti-lock text-danger actions_icon" title="Bloquer"></i>
             </a>

                    ';
                    }


                })
                ->addColumn('etat', function ($nb_jr) {
                    $string = '';
                    if ($nb_jr->flag_etat == true) {
                        $string = 'Innactif';
                    } else if ($nb_jr->flag_etat == false) {
                        $string = 'Actif';
                    }
                    return $string;
                })
                ->rawColumns(['action', 'etat'])
                ->make(true);
        }
        elseif ($group  == 'nb_recup'){
            $nb_recups = Systeme::where('group','=',$group)->get(['id','param1','flag_etat']);


            return datatables()->of($nb_recups)
                ->addColumn('action', function ($nb_recup) {


                    if ($nb_recup->flag_etat == true) {

                        return '
             
      <a onclick="editNbRecup(' . $nb_recup->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $nb_recup->id . ')" >
                <i class="fa fa-fw ti-unlock text-danger actions_icon" title="Débloquer"></i>
             </a>
            
                    ';


                    } else {
                        return '
       
         <a onclick="editNbRecup(' . $nb_recup->id . ')" >
                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="Modifier"></i>
             </a>

             <a onclick="changeStateConfig(' . $nb_recup->id . ')" >
                <i class="fa fa-fw ti-lock text-danger actions_icon" title="Bloquer"></i>
             </a>
                    ';
                    }


                })
                ->addColumn('etat', function ($nb_recup) {
                    $string = '';
                    if ($nb_recup->flag_etat == true) {
                        $string = 'Innactif';
                    } else if ($nb_recup->flag_etat == false) {
                        $string = 'Actif';
                    }
                    return $string;
                })
                ->rawColumns(['action', 'etat'])
                ->make(true);
        }


    }
}

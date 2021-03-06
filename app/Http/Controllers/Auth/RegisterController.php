<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Portefeuille;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

//            'name' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255',],
            'prenom' => ['required', 'string', 'max:255',],
            'sexe' => ['required', 'string', 'max:255',],
            'dateNaissance' => ['required', 'string', 'max:255',],
            'contact' => ['required', 'string', 'max:255',],
            'adresse' => ['required', 'string', 'max:255',],
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string', 'max:255',],
//            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

//        dd($data);
        $user = User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'sexe' => $data['sexe'],
            'dateNaissance' => $data['dateNaissance'],
            'contact' => $data['contact'],
            'adresse' => $data['adresse'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $portefeuille = new Portefeuille();
        $portefeuille->identifiant = Str::random(12);
        $portefeuille->codePin = '1234';
        $portefeuille->user_id = $user->id;

        $portefeuille->save();

        $role = Role::where('name','=','Utilisateur')->first();
        $user->assignRole($role);
        return $user;
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

}

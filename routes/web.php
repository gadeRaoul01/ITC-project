<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ITC_MOBILE_SERVER', function () {
    return view('welcome');
});



//Route::get('/home', 'HomeController@index')->name('home');


//Login utilisateurs routes


Auth::routes();

//Route::post('logout', 'Auth\UtilisateurController@logout')->name('logout');
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('UtilisateurRegister');
//Route::post('register', 'Auth\UtilisateurController@register');
//
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//
//Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
//
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');




//end

Route::prefix('admin')->group(function () {


    Route::get('login', 'Auth\UtilisateurController@showLoginForm')->name('userLogin');
    Route::post('login', 'Auth\UtilisateurController@login')->name('PostUserLogin');


    Route::group(['middleware' => 'auth:admin'], function () {


        Route::get('/home', 'AdminHomeController@index')->name('home');
        Route::get('/calendriers', 'CalendrierController@index')->name('getCalendar');
        Route::get('/getFerieDate-{annee}', 'CalendrierController@getDateFerie');

        Route::post('/store/jourFerie', 'CalendrierController@store');
        Route::post('/edit/jourFerie', 'CalendrierController@update');
        Route::get('/showJF-{id}', 'CalendrierController@show');

        Route::get('/années', 'AnneeController@index')->name('getAnnee');
        Route::post('/anneesPost', 'AnneeController@store')->name('postAnnee');
        Route::get('/getDateFerie-{annee}', 'AnneeController@getDateFerie');



        Route::get('/configurations', 'ConfigurationsController@index')->name('configurations');
        Route::get('/getConfig-{group}', 'ConfigurationsController@getConfig');
        Route::post('/postConfig-{group}', 'ConfigurationsController@store');
        Route::post('/changeConfigState-{id}', 'ConfigurationsController@destroy');

        Route::get('/transactions','TransactionController@index')->name('transactions');


    });;

});


Route::group(['middleware' => 'auth:web'], function () {

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/portefeuille', 'PortefeuilleController@index')->name('portefeuille');
    Route::get('/investissement', 'InvestissementController@index')->name('investissement');



});

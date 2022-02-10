<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin'],function(){
    Route::resource('area','AreaController')->except('destroy');
    Route::get('area/{area}/destroy', [
        'uses'=>'AreaController@destroy',
        'as'=>'area.destroy'
    ]);

    Route::resource('consultorio','ConsultorioController')->except('destroy');
    Route::get('consultorio/{consultorio}/destroy',[
        'uses'=>'ConsultorioController@destroy',
        'as'=>'consultorio.destroy'
    ]);
});

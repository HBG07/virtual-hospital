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

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(User::all()->count()==0) return view('auth.register');
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::post('/dashboard','HomeController@show')->name('home.show');

// Group admin routes
Route::group(['prefix'=>'admin'],function(){
    // Area routes
    Route::resource('area','AreaController')->except('destroy');
    Route::get('area/{area}/destroy', [
        'uses'=>'AreaController@destroy',
        'as'=>'area.destroy'
    ]);

    // Consultorio routes
    Route::resource('consultorio','ConsultorioController')->except('destroy');
    Route::get('consultorio/{consultorio}/destroy',[
        'uses'=>'ConsultorioController@destroy',
        'as'=>'consultorio.destroy'
    ]);

    // Pesquisado routes
    Route::resource('pesquisado','PesquisadoController')->except('destroy');
    Route::get('pesquisado/{pesquisado}/destroy',[
        'uses'=>'PesquisadoController@destroy',
        'as'=>'pesquisado.destroy'
    ]);

    // Pesquisa routes
    Route::resource('pesquisa','PesquisaController')->except(['show','edit','update','destroy']);
    Route::get('pesquisa/{CI}/{fecha}/edit',[
        'uses'=>'PesquisaController@edit',
        'as'=>'pesquisa.edit'
    ]);
    Route::put('pesquisa/{CI}/{fecha}/update',[
        'uses'=>'PesquisaController@update',
        'as'=>'pesquisa.update'
    ]);
    Route::get('pesquisa/{CI}/{fecha}/destroy',[
        'uses'=>'PesquisaController@destroy',
        'as'=>'pesquisa.destroy'
    ]);
    Route::get('pesquisa/{CI}/{fecha}',[
        'uses'=>'PesquisaController@show',
        'as'=>'pesquisa.show'
    ]);

    // Advanced search routes
    Route::get('search/',[
        'uses'=>'SearchController@create',
        'as'=>'search.create'
    ]);
    // FIXME: not used yet
    Route::post('search/',[
        'uses'=>'SearchController@show',
        'as'=>'search.show'
    ]);
});

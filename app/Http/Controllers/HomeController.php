<?php

namespace App\Http\Controllers;

use App\Pesquisa;
use App\Pesquisado;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // last day resume
        if(Pesquisa::all()->count()>0){
            // obtener el último día
            $last_day = Pesquisa::orderBy('fecha', 'DESC')->first()->fecha;
            // obtener las pesquisas realizadas el último día
            $get_data_day = Pesquisa::all()->where('fecha', $last_day);
            // obtener la suma de cada columna por semarado

            return view('home')->with([
                'day' => $last_day,
                'cantidad_pesquisas' => Pesquisa::all()->count(),
                'cantidad_pesquisados' => Pesquisado::all()->count(),
                'cantidad_contactos_historicos' => Pesquisa::all()->where('contacto', 1)->count(),
                'cantidad_anciano_solo' => $get_data_day->sum('anciano_solo'),
                'cantidad_app' => $get_data_day->sum('app'),
                'cantidad_encamado' => $get_data_day->sum('encamado'),
                'cantidad_VIH' => $get_data_day->sum('VIH'),
                'cantidad_diambulante' => $get_data_day->sum('diambulante'),
                'cantidad_familia_riesgo' => $get_data_day->sum('familia_riesgo'),
                'cantidad_embarazada' => $get_data_day->sum('embarazada'),
                'cantidad_puerpera' => $get_data_day->sum('puerpera'),
                'cantidad_contacto' => $get_data_day->sum('contacto'),
                'cantidad_inmunodeprimido' => $get_data_day->sum('inmunodeprimido'),
                'cantidad_t_salud' => $get_data_day->sum('t_salud'),
                'cantidad_t_turismo' => $get_data_day->sum('t_turismo'),
            ]);
        }
        return view('home');
    }

    public function show(Request $request){
        $get_data_day = Pesquisa::all()->where('fecha',$request->fecha);
        if(isset($get_data_day)){
            return view('home')->with([
                'day' => $request->fecha,
                'cantidad_pesquisas' => Pesquisa::all()->count(),
                'cantidad_pesquisados' => Pesquisado::all()->count(),
                'cantidad_contactos_historicos' => Pesquisa::all()->where('contacto', 1)->count(),
                'cantidad_anciano_solo' => $get_data_day->sum('anciano_solo'),
                'cantidad_app' => $get_data_day->sum('app'),
                'cantidad_encamado' => $get_data_day->sum('encamado'),
                'cantidad_VIH' => $get_data_day->sum('VIH'),
                'cantidad_diambulante' => $get_data_day->sum('diambulante'),
                'cantidad_familia_riesgo' => $get_data_day->sum('familia_riesgo'),
                'cantidad_embarazada' => $get_data_day->sum('embarazada'),
                'cantidad_puerpera' => $get_data_day->sum('puerpera'),
                'cantidad_contacto' => $get_data_day->sum('contacto'),
                'cantidad_inmunodeprimido' => $get_data_day->sum('inmunodeprimido'),
                'cantidad_t_salud' => $get_data_day->sum('t_salud'),
                'cantidad_t_turismo' => $get_data_day->sum('t_turismo'),
            ]);
        }
        return view('home');
    }
}

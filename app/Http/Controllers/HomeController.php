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
        if (Pesquisa::all()->count() > 0) {
            // obtener el último día
            $last_day = Pesquisa::orderBy('fecha', 'DESC')->first()->fecha;
            // obtener las pesquisas realizadas el último día
            $get_data_day = Pesquisa::all()->where('fecha', $last_day);
            // obtener la suma de cada columna por semarado
            $chartjs = app()->chartjs
                ->name('lineChartTest')
                ->type('line')
                ->size(['width' => 600, 'height' => 200])
                ->labels([
                    'Ancianos Solos',
                    'Enfermos App',
                    'Encamados',
                    'VIH',
                    'Deambulantes',
                    'Familias con riesgo',
                    'Embarazadas',
                    'Puerperas',
                    'Contactos',
                    'Inmunodeprimidos',
                    'Trabajadores de Salud',
                    'Trabajadores del Turismo'
                ])
                ->datasets([
                    [
                        "label" => "Resumen del día " . $last_day,
                        "fill"=>true,
                        'borderWidth'=>2,
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $get_data_day->sum('anciano_solo'),
                            $get_data_day->sum('app'),
                            $get_data_day->sum('encamado'),
                            $get_data_day->sum('VIH'),
                            $get_data_day->sum('diambulante'),
                            $get_data_day->sum('familia_riesgo'),
                            $get_data_day->sum('embarazada'),
                            $get_data_day->sum('puerpera'),
                            $get_data_day->sum('contacto'),
                            $get_data_day->sum('inmunodeprimido'),
                            $get_data_day->sum('t_salud'),
                            $get_data_day->sum('t_turismo'),
                        ],
                    ]
                ])
                ->options(['responsive'=>true,'maintainAspectRatio'=>false]);
            return view('home')->with([
                'day' => $last_day,
                'cantidad_pesquisas' => Pesquisa::all()->count(),
                'cantidad_pesquisados' => Pesquisado::all()->count(),
                'cantidad_contactos_historicos' => Pesquisa::all()->where('contacto', 1)->count(),
                'chartjs' => $chartjs,
            ]);
        }
        return view('home');
    }

    public function show(Request $request)
    {
        $get_data_day = Pesquisa::all()->where('fecha', $request->fecha);
        if (isset($get_data_day)) {
            $chartjs = app()->chartjs
                ->name('lineChartTest')
                ->type('line')
                ->size(['width' => 600, 'height' => 200])
                ->labels([
                    'Ancianos Solos',
                    'Enfermos App',
                    'Encamados',
                    'VIH',
                    'Deambulantes',
                    'Familias con riesgo',
                    'Embarazadas',
                    'Puerperas',
                    'Contactos',
                    'Inmunodeprimidos',
                    'Trabajadores de Salud',
                    'Trabajadores del Turismo'
                ])
                ->datasets([
                    [
                        "label" => "Resumen del día " . $request->fecha,
                        "fill"=>true,
                        'borderWidth'=>2,
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $get_data_day->sum('anciano_solo'),
                            $get_data_day->sum('app'),
                            $get_data_day->sum('encamado'),
                            $get_data_day->sum('VIH'),
                            $get_data_day->sum('diambulante'),
                            $get_data_day->sum('familia_riesgo'),
                            $get_data_day->sum('embarazada'),
                            $get_data_day->sum('puerpera'),
                            $get_data_day->sum('contacto'),
                            $get_data_day->sum('inmunodeprimido'),
                            $get_data_day->sum('t_salud'),
                            $get_data_day->sum('t_turismo'),
                        ],
                    ]
                ])
                ->options(['responsive'=>true,'maintainAspectRatio'=>false]);
            return view('home')->with([
                'day' => $request->fecha,
                'cantidad_pesquisas' => Pesquisa::all()->count(),
                'cantidad_pesquisados' => Pesquisado::all()->count(),
                'cantidad_contactos_historicos' => Pesquisa::all()->where('contacto', 1)->count(),
                'chartjs' => $chartjs,
            ]);
        }
        return view('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Pesquisa;
use App\Pesquisado;
use App\Consultorio;
use App\Http\Requests\PesquisaRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PesquisaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesquisas = Pesquisa::orderBy('fecha','DESC')->with('pesquisado')->paginate(5);
        $cantidad_pesquisas = Pesquisa::all()->count();
        $cantidad_pesquisados = Pesquisado::all()->count();
        $cantidad_contactos_acumulados = Pesquisa::all()->where('contacto', 1)->count();
        return view('pesquisa.index')->with(['pesquisas' => $pesquisas, 'cantidad_pesquisas' => $cantidad_pesquisas, 'cantidad_pesquisados' => $cantidad_pesquisados, 'cantidad_contactos_acumulados' => $cantidad_contactos_acumulados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesquisados = Pesquisado::all();
        $consultorios = Consultorio::all();
        return view('pesquisa.create')->with(['pesquisados' => $pesquisados, 'consultorios' => $consultorios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesquisaRequest $request)
    {
        $pesquisado = Pesquisado::find($request->CI_pesquisado);
        // en caso de que no exista el pesquisado
        if ($pesquisado == null) {
            $new_pesquisado = new Pesquisado();
            $new_pesquisado->CI = $request->CI_pesquisado;
            $new_pesquisado->nombre = $request->nombre;
            $new_pesquisado->primer_apellido = $request->primer_apellido;
            $new_pesquisado->segundo_apellido = $request->segundo_apellido;
            // añadir edad generada
            $edad = Carbon::createFromFormat('ymd', substr($new_pesquisado->CI, 0, 6));
            $new_pesquisado->edad = $edad->year > Carbon::now()->year ? $edad->year($edad->year - 100)->age : $edad->age;
            $new_pesquisado->numero_consultorio = $request->numero_consultorio;
            $new_pesquisado->save();
        }
        $pesquisa = new Pesquisa([
            'CI_pesquisado' => $request->CI_pesquisado,
            'fecha' => $request->fecha,
            'tipo_pesquisador' => $request->tipo_pesquisador,
            'anciano_solo' => $request->has('anciano_solo'),
            'app' => $request->has('app'),
            'encamado' => $request->has('encamado'),
            'VIH' => $request->has('VIH'),
            'diambulante' => $request->has('diambulante'),
            'familia_riesgo' => $request->has('familia_riesgo'),
            'embarazada' => $request->has('embarazada'),
            'puerpera' => $request->has('puerpera'),
            'contacto' => $request->has('contacto'),
            'inmunodeprimido' => $request->has('inmunodeprimido'),
            't_salud' => $request->has('t_salud'),
            't_turismo' => $request->has('t_turismo')
        ]);
        $pesquisa->save();
        Session::flash('success', 'Agregada pesquisa con fecha ' . $request->fecha . ' para ' . $request->nombre);
        return redirect()->route('pesquisa.index');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesquisa  $pesquisa
     * @return \Illuminate\Http\Response
     */
    public function show(Pesquisa $pesquisa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesquisa  $pesquisa
     * @return \Illuminate\Http\Response
     */
    public function edit($CI, $fecha)
    {
        // dd($CI.' '.$fecha);
        $pesquisa = Pesquisa::where('CI_pesquisado', $CI)->where('fecha', $fecha)->first();
        return view('pesquisa.edit')->with(['pesquisa' => $pesquisa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesquisa  $pesquisa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CI, $fecha)
    {
        $pesquisa = Pesquisa::where('CI_pesquisado', $CI)->where('fecha', $fecha)->first();
        $pesquisa->anciano_solo = 0;
        $pesquisa->app = 0;
        $pesquisa->encamado = 0;
        $pesquisa->VIH = 0;
        $pesquisa->diambulante = 0; // deambulante
        $pesquisa->familia_riesgo = 0;
        $pesquisa->embarazada = 0;
        $pesquisa->puerpera = 0;
        $pesquisa->contacto = 0;
        $pesquisa->inmunodeprimido = 0;
        $pesquisa->t_salud = 0;
        $pesquisa->t_turismo = 0;
        $pesquisa->fill($request->all());
        $pesquisa->save();
        Session::flash('warning', 'Modificada pesquisa de con fecha ' . $CI . ' con fecha ' . $fecha);
        return redirect()->route('pesquisa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesquisa  $pesquisa
     * @return \Illuminate\Http\Response
     */
    public function destroy($CI, $fecha)
    {
        $pesquisa = Pesquisa::where('CI_pesquisado', $CI)->where('fecha', $fecha)->first();
        $pesquisa->delete();
        $pesquisas = Pesquisa::with('pesquisado')->where('CI_pesquisado',$CI);
        $pesquisado = Pesquisado::with('pesquisas');
        $pesquisado = $pesquisado->where('CI',$CI)->first();
        if($pesquisas->count()==0) $pesquisado->delete();
        Session::flash('danger', 'Eliminada pesquisa de ' . $CI . ' con fecha ' . $fecha);
        return redirect()->route('pesquisa.index');
    }
}

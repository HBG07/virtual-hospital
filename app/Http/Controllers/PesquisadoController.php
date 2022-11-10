<?php

namespace App\Http\Controllers;

use App\Pesquisado;
use App\Consultorio;
use App\Http\Requests\PesquisadoRequest;
use App\Pesquisa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PesquisadoController extends Controller
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
        $pesquisados = Pesquisado::paginate(5);
        return view('pesquisado.index')->with('pesquisados',$pesquisados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultorios = Consultorio::all();
        return view('pesquisado.create')->with('consultorios',$consultorios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesquisadoRequest $request)
    {
        $pesquisado = new Pesquisado($request->all());
        // agregar edad automaticamente
        $edad = Carbon::createFromFormat('ymd',substr($pesquisado->CI,0,6));
        $pesquisado->edad = $edad->year>Carbon::now()->year ? $edad->year($edad->year-100)->age:$edad->age;
        Session::flash('success',$request->nombre.' '.$request->primer_apellido.' agregado con exito');
        $pesquisado->save();
        return redirect()->route('pesquisado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesquisado  $pesquisado
     * @return \Illuminate\Http\Response
     */
    public function show(Pesquisado $pesquisado)
    {
        $pesquisas = Pesquisa::with('pesquisado');
        $pesquisas = $pesquisas->join('pesquisados','pesquisados.CI','=','pesquisas.CI_pesquisado');
        $pesquisas = $pesquisas->where('CI',$pesquisado->CI);
        return view('pesquisado.show')->with(['pesquisado'=>$pesquisado,'pesquisas'=>$pesquisas->paginate(5)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesquisado  $pesquisado
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesquisado $pesquisado)
    {
        $consultorios = Consultorio::all();
        return view('pesquisado.edit')->with(['pesquisado'=>$pesquisado,'consultorios'=>$consultorios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesquisado  $pesquisado
     * @return \Illuminate\Http\Response
     */
    public function update(PesquisadoRequest $request, Pesquisado $pesquisado)
    {
        $pesquisado->fill($request->all());
        // editar edad automaticamente
        $edad = Carbon::createFromFormat('ymd',substr($pesquisado->CI,0,6));
        $pesquisado->edad = $edad->year>Carbon::now()->year ? $edad->year($edad->year-100)->age:$edad->age;
        $pesquisado->save();
        Session::flash('warning',$request->nombre.' '.$request->primer_apellido.' editado con exito');
        return redirect()->route('pesquisado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesquisado  $pesquisado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesquisado $pesquisado)
    {
        $pesquisado->delete();
        Session::flash('danger',$pesquisado->nombre.' '.$pesquisado->primer_apellido.' eliminado con exito');
        return redirect()->route('pesquisado.index');
    }
}

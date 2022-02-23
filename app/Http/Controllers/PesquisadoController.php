<?php

namespace App\Http\Controllers;

use App\Pesquisado;
use App\Consultorio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesquisadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesquisados = Pesquisado::paginate(10);
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
    public function store(Request $request)
    {
        $pesquisado = new Pesquisado($request->all());
        // agregar edad automaticamente
        $edad = Carbon::createFromFormat('ymd',substr($pesquisado->CI,0,6));
        $pesquisado->edad = $edad->year>Carbon::now()->year ? $edad->year($edad->year-100)->age:$edad->age;
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
        return view('pesquisado.show')->with('pesquisado',$pesquisado);
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
    public function update(Request $request, Pesquisado $pesquisado)
    {
        $pesquisado->fill($request->all());
        // editar edad automaticamente
        $edad = Carbon::createFromFormat('ymd',substr($pesquisado->CI,0,6));
        $pesquisado->edad = $edad->year>Carbon::now()->year ? $edad->year($edad->year-100)->age:$edad->age;
        $pesquisado->save();
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
        return redirect()->route('pesquisado.index');
    }
}

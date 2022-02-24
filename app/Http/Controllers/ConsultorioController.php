<?php

namespace App\Http\Controllers;

use App\Consultorio;
use App\Area;
use App\Http\Requests\ConsultorioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultorios = Consultorio::paginate(5);
        return view('consultorio.index')->with('consultorios',$consultorios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('consultorio.create')->with('areas',$areas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultorioRequest $request)
    {
        $consultorio = new Consultorio($request->all());
        $consultorio->save();
        Session::flash('success','El consultorio número '.$request->numero.' ha sido agregado con exito');
        return redirect()->route('consultorio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function show(Consultorio $consultorio)
    {
        return view('consultorio.show')->with('consultorio',$consultorio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultorio $consultorio)
    {
        $areas = Area::all();
        return view('consultorio.edit')->with(['consultorio'=>$consultorio,'areas'=>$areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultorioRequest $request, Consultorio $consultorio)
    {
        $consultorio->fill($request->all());
        $consultorio->save();
        Session::flash('warning','El conultorio número '.$request->numero.' ha sido modificado con exito');
        return redirect()->route('consultorio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultorio $consultorio)
    {
        $consultorio->delete();
        Session::flash('danger','El consultorio número '.$consultorio->numero.' ha sido eliminado con exito');
        return redirect()->route('consultorio.index');
    }
}

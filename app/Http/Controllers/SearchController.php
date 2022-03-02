<?php

namespace App\Http\Controllers;

use App\Pesquisa;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Show the form for creating an advance search.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('search.create');
    }

     /**
     * Return a newly advance search response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pesquisas = Pesquisa::with('pesquisado');
        if(isset($request->CI))
            $pesquisas = $pesquisas->where('CI_pesquisado',$request->CI);
        if(isset($request->fecha))
            $pesquisas = $pesquisas->where('fecha',$request->fecha);
        if(isset($request->edad)){
            // FIXME: evitar realizar un join con la tabla pesquisados
            $pesquisas = $pesquisas->join('pesquisados','pesquisados.CI','=','pesquisas.CI_pesquisado');
            switch ($request->edad) {
                case 'menor':
                    $pesquisas = $pesquisas->where('edad','<',18);
                    break;
                case 'medio':
                    $pesquisas = $pesquisas->whereBetween('edad',[18,60]);
                    break;
                default:
                    $pesquisas = $pesquisas->where('edad','>',60);
                    break;
            }
        }
        $cantidad_pesquisas = $pesquisas->count();
        $cantidad_pesquisados = $pesquisas->distinct('CI_pesquisado')->count();
        return view('pesquisa.index')->with(['pesquisas'=>$pesquisas->get(),'cantidad_pesquisas' => $cantidad_pesquisas, 'cantidad_pesquisados' => $cantidad_pesquisados, 'cantidad_contactos_acumulados' => $pesquisas->where('contacto',1)->count()]);
        // return dd($pesquisas->get());
    }
}

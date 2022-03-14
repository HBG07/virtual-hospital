@extends('layouts.app')
@section('title','Pesquisas')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center"><i class="fas fa-file-medical"></i> Pesquisas</h1>
        <a href="{{ route('pesquisa.create') }}" class="btn btn-success m-1"><i class="fas fa-plus"></i> Añadir pesquisa</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary m-1"><i class="fas fa-arrow-rotate-back"></i> Volver</a>
        <div class="card m-1 shadow-sm">
            <div class="card-header bg-dark">
                <div class="card-title text-white m-0 p-0">
                    <p class="d-inline">Total de pesquisas: {{$cantidad_pesquisas}}</p>
                    <p class="d-inline ms-5">Total de pesquisados: {{$cantidad_pesquisados}}</p>
                    <p class="d-inline ms-5">Total de contactos acumulados: {{$cantidad_contactos_acumulados}}</p>
                </div>
            </div>
            <div class="card-body table-responsive m-0 p-0">
                <table class="table table-sm text-center">
                    <thead class="table-dark table-borderless">
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Tipo de Pesquisador</th>
                        <th>Anciano Solo</th>
                        <th>App</th>
                        <th>Encamado</th>
                        <th>VIH</th>
                        <th>Deambulante</th>
                        <th>Riesgo</th>
                        <th>Embarazada</th>
                        <th>Puerpera</th>
                        <th>Contacto</th>
                        <th>Inmuno</th>
                        <th>T Salud</th>
                        <th>T Turismo</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @if (count($pesquisas)>0)
                        @foreach ($pesquisas as $pesquisa)
                            <tr>
                                <td><a href="{{ route('pesquisado.show',$pesquisa->CI_pesquisado) }}" class="text-dark">{{ $pesquisa->CI_pesquisado }}</a></td>
                                <td>{{ $pesquisa->pesquisado->nombre }}</td>
                                <td>{{ $pesquisa->fecha }}</td>
                                <td>{{ $pesquisa->tipo_pesquisador }}</td>
                                <td>@if ($pesquisa->anciano_solo==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->app==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->encamado==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->VIH==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->diambulante==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->familia_riesgo==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->embarazada==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->puerpera==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->contacto==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->inmunodeprimido==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->t_salud==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>@if ($pesquisa->t_turismo==1)<i class="fas fa-check"></i>@else<i class="fas fa-minus"></i>@endif</td>
                                <td>
                                    <form class="form-inline" onsubmit="return confirm('Seguro que desea eliminar a {{$pesquisa->CI_pesquisado}} ?')" action="{{ route('pesquisa.destroy',[$pesquisa->CI_pesquisado,$pesquisa->fecha]) }}" method="get">
                                        <a class="btn btn-warning" href="{{ route('pesquisa.edit',[$pesquisa->CI_pesquisado,$pesquisa->fecha]) }}"><i class="fas fa-pen"></i></a>
                                        <button class="btn btn-outline-danger" type="submit"><i class="fas fa-trash-can"></i></button>
                                    </form>
                                    {{-- <a class="btn btn-outline-danger" onclick="confirm('Seguro que desea eliminar el elemento?')" href="{{ route('pesquisa.destroy',[$pesquisa->CI_pesquisado,$pesquisa->fecha]) }}"><i class="fas fa-trash-can"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr><td colspan="17" class="text-center"><span class="lead text-muted">No hay datos que mostrar.</span></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

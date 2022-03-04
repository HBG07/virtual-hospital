@extends('layouts.app')
@section('title','Pesquisas')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Pesquisas</h1>
        <a href="{{ route('pesquisa.create') }}" class="btn btn-success m-1">Añadir pesquisa</a>
        {{-- <ul class="list-group list-group-horizontal m-1">
            <li class="list-group-item-success p-2"><b>Cantidad pesquisas: {{ $cantidad_pesquisas }}</b></li>
            <li class="list-group-item p-2"><b>Cantidad pesquisado: {{ $cantidad_pesquisados }} </b></li>
            <li class="list-group-item-danger p-2"><b>Cantidad contactos acumulados: {{ $cantidad_contactos_acumulados }} </b></li>
        </ul> --}}
        <div class="card m-1 shadow-sm">
            <div class="card-header bg-dark">
                <div class="card-title text-white m-0 p-0">
                    <p class="d-inline">Total de pesquisas: {{$cantidad_pesquisas}}</p>
                    <p class="d-inline ml-5">Total de pesquisados: {{$cantidad_pesquisados}}</p>
                    <p class="d-inline ml-5">Total de contactos acumulados: {{$cantidad_contactos_acumulados}}</p>
                </div>
            </div>
            <div class="card-body m-0 p-0">
                <table class="table table-responsive-md text-center">
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
                        @foreach ($pesquisas as $pesquisa)
                            <tr>
                                <td><a href="{{ route('pesquisado.show',$pesquisa->CI_pesquisado) }}" class="text-dark">{{ $pesquisa->CI_pesquisado }}</a></td>
                                <td>{{ $pesquisa->pesquisado->nombre }}</td>
                                <td>{{ $pesquisa->fecha }}</td>
                                <td>{{ $pesquisa->tipo_pesquisador }}</td>
                                <td>{{ $pesquisa->anciano_solo }}</td>
                                <td>{{ $pesquisa->app }}</td>
                                <td>{{ $pesquisa->encamado }}</td>
                                <td>{{ $pesquisa->VIH }}</td>
                                <td>{{ $pesquisa->diambulante }}</td>
                                <td>{{ $pesquisa->familia_riesgo }}</td>
                                <td>{{ $pesquisa->embarazada }}</td>
                                <td>{{ $pesquisa->puerpera }}</td>
                                <td>{{ $pesquisa->contacto }}</td>
                                <td>{{ $pesquisa->inmunodeprimido }}</td>
                                <td>{{ $pesquisa->t_salud }}</td>
                                <td>{{ $pesquisa->t_turismo }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('pesquisa.edit',[$pesquisa->CI_pesquisado,$pesquisa->fecha]) }}">Editar</a>
                                    <a class="btn btn-danger" href="{{ route('pesquisa.destroy',[$pesquisa->CI_pesquisado,$pesquisa->fecha]) }}">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

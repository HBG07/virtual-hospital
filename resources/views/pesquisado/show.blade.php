@extends('layouts.app')
@section('title','Detalles de '.$pesquisado->nombre)
@section('content')
    <div class="container-fluid">
        <h1>Detalles de {{$pesquisado->nombre}} {{$pesquisado->primer_apellido}} {{$pesquisado->segundo_apellido}}</h1>
        <a href="{{ route('pesquisado.edit',$pesquisado->CI) }}" class="btn btn-success mb-2">Editar datos del pesquisado</a>
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <div class="card-title text-white m-0 p-0">
                    <p class="d-inline">CI: {{$pesquisado->CI}}</p>
                    <p class="d-inline ml-5">Edad: {{$pesquisado->edad}}</p>
                    <p class="d-inline ml-5">Número de consultorio: {{$pesquisado->numero_consultorio}}</p>
                </div>
            </div>
            <div class="card-body p-0 m-0">
                <table class="table table-responsive-sm text-center">
                    <thead class="table-dark">
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
                        @foreach ($pesquisado->pesquisas as $pesquisa)
                            <tr>
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

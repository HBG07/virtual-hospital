@extends('layouts.app')
@section('title','Pesquisas')
@section('content')
    <h1>Pesquisas</h1>
    <a href="{{ route('pesquisa.create') }}" class="btn btn-success mb-2">Añadir pesquisa</a>
    <table class="table text-center">
        <thead>
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
@endsection

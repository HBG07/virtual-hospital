@extends('layouts.app')
@section('title','Consultorio '.$consultorio->numero)
@section('content')
<div class="container-fluid">
    <h1 class="text-center">Detalles del consultorio número {{ $consultorio->numero }}</h1>
    <a class="btn btn-success m-1" href="{{route('consultorio.edit',$consultorio->numero)}}">Editar consultorio</a>
    <div class="card m-1 shadow-sm">
        <div class="card-header bg-dark">
            <div class="card-title text-white m-0 p-0">
                <p class="d-inline">Dirección: {{ $consultorio->direccion }}</p>
                <p class="d-inline ml-5">Area: {{ $consultorio->nombre_area }}</p>
            </div>
        </div>
        <div class="card-body m-0 p-0">
            <table class="table text-center">
                <thead class="table-dark table-borderless">
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Edad</th>
                    <th>Consultorio</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach ($consultorio->pesquisados as $pesquisado)
                    <tr>
                        <td><a class="text-dark" href="{{ route('pesquisado.show',$pesquisado->CI) }}">{{ $pesquisado->CI }}</a></td>
                        <td>{{ $pesquisado->nombre }}</td>
                        <td>{{ $pesquisado->primer_apellido }}</td>
                        <td>{{ $pesquisado->segundo_apellido }}</td>
                        <td>{{ $pesquisado->edad }}</td>
                        <td>{{ $pesquisado->numero_consultorio }}</td>
                        <td>
                            <a href="{{ route('pesquisado.edit',$pesquisado->CI) }}" class="btn btn-warning">Editar</a>
                            <a href="{{ route('pesquisado.destroy',$pesquisado->CI) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

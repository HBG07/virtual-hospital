@extends('layouts.app')
@section('title',$area->nombre)
@section('content')
    <div class="container-fluid">
        <h1>Detalles de {{ $area->nombre }}</h1>
        <div class="card m-1 shadow-sm">
            <div class="card-header bg-dark">
                <div class="card-title text-white m-0 p-0">
                    <p class="d-inline">Provincia: {{ $area->provincia }}</p>
                    <p class="d-inline ml-5">Municipio: {{ $area->municipio }}</p>
                </div>
            </div>
            <div class="card-body m-0 p-0">
                <table class="table text-center">
                    <thead class="table-dark table-borderless">
                        <th>Número</th>
                        <th>Dirección</th>
                        <th>Area de Salud</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($area->consultorios as $consultorio)
                            <tr>
                                <td><a class="text-dark" href="{{ route('consultorio.show',$consultorio->numero) }}">{{$consultorio->numero}}</a></td>
                                <td>{{ $consultorio->direccion }}</td>
                                <td>{{ $consultorio->nombre_area }}</td>
                                <td>
                                    <a href="{{ route('consultorio.edit',$consultorio->numero) }}" class="btn btn-warning">Editar</a>
                                    <a href="{{ route('consultorio.destroy',$consultorio->numero) }}" class="btn btn-outline-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

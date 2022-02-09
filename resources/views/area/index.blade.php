@extends('layouts.app')
@section('title','Areas')
@section('content')
    <h1>Mostrando todas las áreas</h1>
    <a href="{{ route('area.create') }}" class="btn btn-success mb-2">Añadir Area</a>
    <table class=" table text-center">
        <thead>
            <th>Nombre</th>
            <th>Municipio</th>
            <th>Provincia</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach ($areas as $area)
                <tr>
                    <td><a href="{{ route('area.show',$area->nombre) }}" class="text-dark">{{ $area->nombre }}</a></td>
                    <td>{{ $area->municipio }}</td>
                    <td>{{ $area->provincia }}</td>
                    <td>
                        <a href="{{ route('area.edit',$area->nombre) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('area.destroy',$area->nombre) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $areas->links() }}
@endsection

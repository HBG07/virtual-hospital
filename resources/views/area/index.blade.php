@extends('layouts.app')
@section('title','Areas')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Areas</h1>
        <a href="{{ route('area.create') }}" class="btn btn-success m-1">Añadir Area</a>
        <div class="card m-1 shadow-sm">
            <table class=" table text-center">
                <thead class="table-dark table-borderless">
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
                                <a href="{{ route('area.destroy',$area->nombre) }}" class="btn btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $areas->links() }}
        </div>
    </div>
@endsection

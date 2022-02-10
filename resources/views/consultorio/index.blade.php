@extends('layouts.app')
@section('title','Consultorios')
@section('content')
    <h1>Consultorios</h1>
    <a href="{{ route('consultorio.create') }}" class="btn btn-success mb-2">Añadir Consultorio</a>
    <table class="table text-center">
        <thead>
            <th>Número</th>
            <th>Dirección</th>
            <th>Area de Salud</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach ($consultorios as $consultorio)
                <tr>
                    <td><a class="text-dark" href="{{ route('consultorio.show',$consultorio->numero) }}">{{$consultorio->numero}}</a></td>
                    <td>{{ $consultorio->direccion }}</td>
                    <td>{{ $consultorio->nombre_area }}</td>
                    <td>
                        <a href="{{ route('consultorio.edit',$consultorio->numero) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('consultorio.destroy',$consultorio->numero) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $consultorios->links() }}
@endsection

@extends('layouts.app')
@section('title','Pesquisados')
@section('content')
<h1>Pesquisados</h1>
<a href="{{route('pesquisado.create')}}" class="btn btn-success mb-2">Añadir nuevo pesquisado</a>
<table class=" table text-center">
    <thead>
        <th>CI</th>
        <th>Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Edad</th>
        <th>Consultorio</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach ($pesquisados as $pesquisado)
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
{{ $pesquisados->links() }}
@endsection

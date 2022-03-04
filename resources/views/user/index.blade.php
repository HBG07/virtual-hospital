@extends('layouts.app')
@section('title','Usuarios')
@section('content')
<div class="container-fluid">
    <h1 class="text-center">Usuarios</h1>
    <div class="card m-1 shadow-sm">
        <table class="table text-center">
            <thead class="table-dark table-borderless">
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->type }}</td>
                        <td>
                            <a href="{{ route('user.edit',$usuario->id) }}" class="btn btn-warning">Editar</a>
                            <a href="{{ route('user.destroy',$usuario->id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$usuarios->links()}}
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title','Usuarios')
@section('content')
<div class="container-fluid">
    <h1 class="text-center"><i class="fas fa-users"></i> Usuarios</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary m-1"><i class="fas fa-arrow-rotate-back"></i> Volver</a>
    <div class="card m-1 table-responsive shadow-sm">
        <table class="table text-center">
            <thead class="table-dark table-borderless">
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @if (count($usuarios)>0)
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->type }}</td>
                        <td>
                            <form class="form-inline" action="{{ route('user.destroy',$usuario->id) }}" method="get"></form>
                            <a href="{{ route('user.edit',$usuario->id) }}" class="btn btn-warning"><i class="fas fa-user-gear"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-user-xmark"></i></button>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr><td colspan="4" class="text-center"><span class="lead text-muted">No hay datos que mostrar.</span></td></tr>
                @endif
            </tbody>
        </table>
        {{$usuarios->links()}}
    </div>
</div>
@endsection

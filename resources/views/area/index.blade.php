@extends('layouts.app')
@section('title','Areas de Salud')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center"><i class="fas fa-hospital-wide"></i> Áreas de Salud</h1>
        <a href="{{ route('area.create') }}" class="btn btn-success m-1"><i class="fas fa-plus"></i> Añadir Area</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary m-1"><i class="fas fa-arrow-rotate-back"></i> Volver</a>
        <div class="card m-1 table-responsive shadow-sm">
            <table class=" table table-sm text-center">
                <thead class="table-dark table-borderless">
                    <th>Nombre</th>
                    <th>Municipio</th>
                    <th>Provincia</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @if (count($areas)>0)
                    @foreach ($areas as $area)
                        <tr>
                            <td><a href="{{ route('area.show',$area->nombre) }}" class="text-dark">{{ $area->nombre }}</a></td>
                            <td>{{ $area->municipio }}</td>
                            <td>{{ $area->provincia }}</td>
                            <td>
                                <form class="form-inline" action="{{ route('area.destroy',$area->nombre) }}" onsubmit="return confirm('Seguro que desea eliminar el área {{$area->nombre}} ?')" method="get">
                                    <a href="{{ route('area.edit',$area->nombre) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr><td colspan="4" class="text-center"><span class="lead text-muted">No hay datos que mostrar.</span></td></tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{ $areas->links() }}
    </div>
@endsection

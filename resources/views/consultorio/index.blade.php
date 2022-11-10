@extends('layouts.app')
@section('title','Consultorios')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center"><i class="fas fa-house-medical"></i> Consultorios</h1>
        <a href="{{ route('consultorio.create') }}" class="btn btn-success m-1"><i class="fas fa-plus"></i> Añadir Consultorio</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary m-1"><i class="fas fa-arrow-rotate-back"></i> Volver</a>
        <div class="card m-1 table-responsive shadow-sm">
            <table class="table table-sm text-center">
                <thead class="table-dark table-borderless">
                    <th>Número</th>
                    <th>Dirección</th>
                    <th>Area de Salud</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @if (count($consultorios)>0)
                    @foreach ($consultorios as $consultorio)
                        <tr>
                            <td><a class="text-dark" href="{{ route('consultorio.show',$consultorio->numero) }}">{{$consultorio->numero}}</a></td>
                            <td>{{ $consultorio->direccion }}</td>
                            <td>{{ $consultorio->nombre_area }}</td>
                            <td>
                                <form class="form-inline" action="{{ route('consultorio.destroy',$consultorio->numero) }}" onsubmit="return confirm('Seguro que desea eliminar el consultorio número {{$consultorio->numero}} ?')" method="get"></form>
                                <a href="{{ route('consultorio.edit',$consultorio->numero) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-can"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr><td colspan="4" class="text-center"><span class="lead text-muted">No hay datos que mostrar.</span></td></tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{ $consultorios->links() }}
    </div>
@endsection

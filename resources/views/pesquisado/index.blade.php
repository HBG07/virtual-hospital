@extends('layouts.app')
@section('title','Pesquisados')
@section('content')
<div class="container-fluid">
    <h1 class="text-center"><i class="fas fa-hospital-user"></i> Pesquisados</h1>
    <!-- <a href="{{route('pesquisado.create')}}" class="btn btn-success m-1">Añadir nuevo pesquisado</a> -->
    <a href="{{ route('dashboard') }}" class="btn btn-secondary m-1"><i class="fas fa-arrow-rotate-back"></i> Volver</a>
    <div class="card m-1 table-responsive shadow-sm">
        <table class=" table table-sm text-center">
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
                @if (count($pesquisados)>0)
                @foreach ($pesquisados as $pesquisado)
                    <tr>
                        <td><a class="text-dark" href="{{ route('pesquisado.show',$pesquisado->CI) }}">{{ $pesquisado->CI }}</a></td>
                        <td>{{ $pesquisado->nombre }}</td>
                        <td>{{ $pesquisado->primer_apellido }}</td>
                        <td>{{ $pesquisado->segundo_apellido }}</td>
                        <td>{{ $pesquisado->edad }}</td>
                        <td>{{ $pesquisado->numero_consultorio }}</td>
                        <td>
                            <form action="{{ route('pesquisado.destroy',$pesquisado->CI) }}" onsubmit="return confirm('Seguro que desea eliminar los datos de {{$pesquisado->CI}} ?')" method="get">
                                <a href="{{ route('pesquisado.edit',$pesquisado->CI) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr><td colspan="7" class="text-center"><span class="lead text-muted">No hay datos que mostrar.</span></td></tr>
                @endif
            </tbody>
        </table>
        {{ $pesquisados->links() }}
    </div>
</div>
@endsection

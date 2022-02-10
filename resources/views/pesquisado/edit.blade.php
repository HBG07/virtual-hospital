@extends('layouts.app')
@section('title','Editar pesquisado '.$pesquisado->CI)
@section('content')
    <h1>Editar a {{ $pesquisado->nombre }}</h1>
    <form action="{{ route('pesquisado.update',$pesquisado->CI) }}" method="post">
        @csrf
        @method('PUT')
        <div class=" form-group">
            <label for="CI">CI</label>
            <input class="form-control" type="text" name="CI" id="CI" value="{{ old('CI',$pesquisado->CI) }}">
        </div>
        <div class=" form-group">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre',$pesquisado->nombre) }}">
        </div>
        <div class=" form-group">
            <label for="primer_apellido">Primer Apellido</label>
            <input class="form-control" type="text" name="primer_apellido" id="primer_apellido" value="{{ old('primer_apellido',$pesquisado->primer_apellido) }}">
        </div>
        <div class=" form-group">
            <label for="segundo_apellido">Segundo Apellido</label>
            <input class="form-control" type="text" name="segundo_apellido" id="segundo_apellido" value="{{ old('segundo_apellido',$pesquisado->segundo_apellido) }}">
        </div>
        <div class=" form-group">
            <label for="consultorio">Consultorio</label>
            <select class="form-control" name="numero_consultorio" id="consultorio">
                @foreach ($consultorios as $consultorio)
                    <option value="{{ $consultorio->numero }}" @if($consultorio->numero==$pesquisado->numero_consultorio) selected @endif >{{$consultorio->numero}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Editar" class="btn btn-success">
    </form>
@endsection

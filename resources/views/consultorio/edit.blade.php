@extends('layouts.app')
@section('title','Editar el Consultorio '.$consultorio->numero)
@section('content')
    <h1>Editar el consultorio {{ $consultorio->numero }}</h1>
    <form action="{{ route('consultorio.update',$consultorio->numero) }}" method="post">
        @csrf
        <div class=" form-group">
            <label for="numero">Número</label>
            <input class=" form-control" type="text" name="numero" id="numero" value="{{ $consultorio->numero}}">
        </div>
        <div class=" form-group">
            <label for="direccion">Dirección</label>
            <input class=" form-control" type="text" name="direccion" id="direccion" value="{{ $consultorio->direccion}}">
        </div>
        <div class="form-group">
            <label for="nombre_area">Area de Salud</label>
            <select class=" form-control" name="nombre_area" id="nombre_area">
                @foreach ($areas as $area)
                    <option value="{{$area->nombre}}" @if($consultorio->nombre_area==$area->nombre) selected @endif>{{ $area->nombre }}</option>
                @endforeach
            </select>
        </div>
        <input class="btn btn-success" type="submit" value="Editar">
    </form>
@endsection

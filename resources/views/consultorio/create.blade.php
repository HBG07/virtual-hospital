@extends('layouts.app')
@section('title','Adicionar Consultorio')
@section('content')
<h1>Añadir Consultorio</h1>
<form action="{{ route('consultorio.store') }}" method="post">
    @csrf
    <div class=" form-group">
        <label for="numero">Número</label>
        <input class=" form-control" type="text" name="numero" id="numero" value="{{ old('numero') }}">
    </div>
    <div class=" form-group">
        <label for="direccion">Dirección</label>
        <input class=" form-control" type="text" name="direccion" id="direccion" value="{{ old('direccion') }}">
    </div>
    <div class="form-group">
        <label for="nombre_area">Area de Salud</label>
        <select class=" form-control" name="nombre_area" id="nombre_area">
            @foreach ($areas as $area)
                <option value="{{$area->nombre}}">{{ $area->nombre }}</option>
            @endforeach
        </select>
    </div>
    <input class="btn btn-success" type="submit" value="Añadir">
</form>
@endsection

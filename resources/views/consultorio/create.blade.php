@extends('layouts.app')
@section('title','Adicionar Consultorio')
@section('content')
<div class="container">
    <h1>Añadir Consultorio</h1>
    <form action="{{ route('consultorio.store') }}" method="post">
        @csrf
        <div class=" form-group">
            <label for="numero">Número</label>
            <input class=" form-control @error('numero') is-invalid @enderror" type="text" name="numero" id="numero" value="{{ old('numero') }}">
            @error('numero')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" form-group">
            <label for="direccion">Dirección</label>
            <input class=" form-control @error('direccion') is-invalid @enderror" type="text" name="direccion" id="direccion" value="{{ old('direccion') }}">
            @error('direccion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
        <a href="{{ route('consultorio.index') }}" class="btn btn-secondary m-1"><i class="fas fa-arrow-rotate-back"></i> Volver</a>
    </form>
</div>
@endsection

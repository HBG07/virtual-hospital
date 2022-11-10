@extends('layouts.app')
@section('title','Añadir Area de Salud')
@section('content')
    <div class="container">
        <h1>Añadir Área de Salud</h1>
        {!! Form::open(['route'=>'area.store','method'=>'POST']) !!}
        <div class=" form-group">
            <label for="nombre">Nombre</label>
            <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
            @error('nombre')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class=" form-group">
            <label for="provincia">Provincia</label>
            <input class="form-control @error('provincia') is-invalid @enderror" type="text" name="provincia" id="provincia" value="{{ old('provincia') }}">
            @error('provincia')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class=" form-group">
            <label for="municipio">Municipio</label>
            <input class="form-control @error('municipio') is-invalid @enderror" type="text" name="municipio" id="municipio" value="{{ old('municipio') }}">
            @error('municipio')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <input class="btn btn-primary" type="submit" value="Añadir">
        <a href="{{ route('area.index') }}" class="btn btn-secondary m-1"><i class="fas fa-arrow-rotate-back"></i> Volver</a>
        {!! Form::close() !!}
    </div>
@endsection

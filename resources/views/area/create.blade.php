@extends('layouts.app')
@section('title','Añadir Area')
@section('content')
    <h1>Añadir Area</h1>
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
    {!! Form::close() !!}
@endsection

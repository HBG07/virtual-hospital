@extends('layouts.app')
@section('title','Editar '.$area->nombre)
@section('content')
<div class="container">
    <h1>Editar {{ $area->nombre }}</h1>
        {!! Form::open(['route'=>['area.update',$area->nombre],'method'=>'PUT']) !!}
        <div class=" form-group">
            <label for="nombre">Nombre</label>
            <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" id="nombre" value="{{old('nombre',$area->nombre)}}">
            @error('nombre')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class=" form-group">
            <label for="provincia">Provincia</label>
            <input class="form-control @error('provincia') is-invalid @enderror" type="text" name="provincia" id="provincia" value="{{ old('provincia',$area->provincia) }}">
            @error('provincia')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class=" form-group">
            <label for="municipio">Municipio</label>
            <input class="form-control @error('municipio') is-invalid @enderror" type="text" name="municipio" id="municipio" value="{{ old('municipio',$area->municipio) }}">
            @error('municipio')
                <div>{{$message}}</div>
            @enderror
        </div>
        <input class="btn btn-primary" type="submit" value="Editar">
        {!! Form::close() !!}
</div>
@endsection

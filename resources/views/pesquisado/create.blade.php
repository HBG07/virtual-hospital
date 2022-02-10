@extends('layouts.app')
@section('title','Añadir nuevo pesquisado')
@section('content')
    <h1>Añadir nuevo pesquisado</h1>
    <form action="{{ route('pesquisado.store') }}" method="post">
        @csrf
        <div class=" form-group">
            <label for="CI">CI</label>
            <input class="form-control" type="text" name="CI" id="CI" value="{{ old('CI') }}">
        </div>
        <div class=" form-group">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
        </div>
        <div class=" form-group">
            <label for="primer_apellido">Primer Apellido</label>
            <input class="form-control" type="text" name="primer_apellido" id="primer_apellido" value="{{ old('primer_apellido') }}">
        </div>
        <div class=" form-group">
            <label for="segundo_apellido">Segundo Apellido</label>
            <input class="form-control" type="text" name="segundo_apellido" id="segundo_apellido" value="{{ old('segundo_apellido') }}">
        </div>
        <div class=" form-group">
            <label for="consultorio">Consultorio</label>
            <select class="form-control" name="numero_consultorio" id="consultorio">
                @foreach ($consultorios as $consultorio)
                    <option value="{{ $consultorio->numero }}">{{$consultorio->numero}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Añadir" class="btn btn-success">
    </form>
@endsection

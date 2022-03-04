@extends('layouts.app')
@section('title','Editando a '.$pesquisado->nombre)
@section('content')
    <div class="container">
        <h1>Editar datos de {{ $pesquisado->nombre }} {{ $pesquisado->primer_apellido }} {{ $pesquisado->segundo_apellido }}</h1>
        <form action="{{ route('pesquisado.update',$pesquisado->CI) }}" method="post">
            @csrf
            @method('PUT')
            <div class=" form-group">
                <label for="CI">CI</label>
                <input class="form-control @error('CI') is-invalid @enderror" type="text" name="CI" id="CI" value="{{ old('CI',$pesquisado->CI) }}">
                @error('CI')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class=" form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" id="nombre" value="{{ old('nombre',$pesquisado->nombre) }}">
                @error('nombre')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class=" form-group">
                <label for="primer_apellido">Primer Apellido</label>
                <input class="form-control @error('primer_apellido') is-invalid @enderror" type="text" name="primer_apellido" id="primer_apellido" value="{{ old('primer_apellido',$pesquisado->primer_apellido) }}">
                @error('primer_apellido')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class=" form-group">
                <label for="segundo_apellido">Segundo Apellido</label>
                <input class="form-control @error('segundo_apellido') is-invalid @enderror" type="text" name="segundo_apellido" id="segundo_apellido" value="{{ old('segundo_apellido',$pesquisado->segundo_apellido) }}">
                @error('segundo_apellido')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
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
    </div>
@endsection

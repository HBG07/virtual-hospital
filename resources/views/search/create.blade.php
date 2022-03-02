@extends('layouts.app')
@section('title','Búsqueda Avanzada')
@section('content')
<h1 class="text-center">Búsqueda Avanzada</h1>
    <div class="container">
        <form action="{{ route('search.show') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="CI">Por CI</label>
                <input class="form-control" type="text" name="CI" id="CI">
            </div>
            <div class="form-group">
                <label for="fecha">Por Fecha</label>
                <input class="form-control" type="date" name="fecha" id="fecha">
            </div>
            <div class="form-group">
                <input type="radio" name="edad" id="menor" value="menor">
                <label for="menor">Menor de 18</label> <br>
                <input type="radio" name="edad" id="medio" value="medio">
                <label for="medio">Entre 18 y 60</label> <br>
                <input type="radio" name="edad" id="mayor" value="mayor">
                <label for="mayor">Mayor de 60</label>
            </div>
            <input class="btn btn-primary" type="submit" value="Filtrar">
        </form>
    </div>
@endsection

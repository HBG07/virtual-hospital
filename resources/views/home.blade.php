@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Bienvenido {{ Auth::user()->name }}</h1>
        </div>
    </div>
    <div class="row text-center mt-3">
        <div class="col justify-content-center">
            <div class="bd-callout bd-callout-info">
                <h3>{{ $cantidad_pesquisados ?? 0 }}</h3>
                <h3>Pesquisados</h3>
                <a href="{{ route('pesquisado.index') }}" class="btn btn-lg btn-primary">Ver</a>
            </div>
        </div>
        <div class="col">
            <div class="bd-callout bd-callout-danger">
                <h3>{{ $cantidad_contactos_historicos ?? 0 }}</h3>
                <h3>Contactos</h3>
                <a href="{{ route('pesquisa.index') }}" class="btn btn-lg btn-danger">Ver</a>
            </div>
        </div>
        <div class="col">
            <div class="bd-callout bd-callout-success">
                <h3>{{ $cantidad_pesquisas ?? 0 }}</h3>
                <h3>Pesquisas</h3>
                <a href="{{ route('pesquisa.index') }}" class="btn btn-lg btn-success">Ver</a>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            @isset($day)
            <h2 class=" text-center">Resumen del {{ $day }}</h2>
            @else
            <h2 class="text-center">No hay datos que mostrar</h2>
            @endisset
            <form class="form-inline d-inline-block" action="{{ route('home.show') }}" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="date" name="fecha" id="fecha">
                <input class="btn btn-secondary" type="submit" value="Estadísticas">
            </form>
        </div>
    </div>
    <div class="row text-center mt-2">
        <div class="col">
            <h3>Ancianos solos: {{ $cantidad_anciano_solo ?? 0 }}</h3>
            <h3>Personas con App: {{ $cantidad_app ?? 0 }}</h3>
            <h3>Personas encamadas: {{ $cantidad_encamado ?? 0 }}</h3>
            <h3>Personas con VIH: {{ $cantidad_VIH ?? 0 }}</h3>
        </div>
        <div class="col">
            <h3>Cantidad de Deambulantes: {{ $cantidad_diambulante ?? 0 }}</h3>
            <h3>Familias en riesgo: {{ $cantidad_familia_riesgo ?? 0 }}</h3>
            <h3>Embarazadas: {{$cantidad_embarazada ?? 0}}</h3>
            <h3>Puerperas: {{$cantidad_puerpera ?? 0}} </h3>
        </div>
        <div class="col">
            <h3>Contactos del día: {{$cantidad_contacto ?? 0}}</h3>
            <h3>Personas inmunodeprimidas: {{$cantidad_inmunodeprimido ?? 0}}</h3>
            <h3>Trabajadores de la salud: {{$cantidad_t_salud ?? 0}}</h3>
            <h3>Trabajadores del turismo: {{$cantidad_t_turismo ?? 0}}</h3>
        </div>
    </div>
</div>
@endsection

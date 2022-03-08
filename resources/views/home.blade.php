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
            <div class="card mx-auto" style="width: 95%">
            <div class="card-header bg-success">
                <h3 class="card-title d-inline-flex me-auto">Resumen del {{$day}}</h3>
                <form class="d-flex float-end" action="{{ route('home.show') }}" method="post">
                    @csrf
                    <input class="form-control me-2" type="date" name="fecha" id="fecha">
                    <input class="btn btn-secondary" type="submit" value="Ver Estadísticas">
                </form>
            </div>
                <div class="card-body">
                    <div style="width: 95%">{!! $chartjs->render() !!}</div>
                </div>
            </div>
            @else
            <h2 class="text-center">No hay datos que mostrar</h2>
            @endisset
        </div>
    </div>
</div>
@endsection

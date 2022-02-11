@extends('layouts.app')
@section('title','Editar pesquisa')
@section('content')
    <h1>Editar pesquisa de {{$pesquisa->pesquisado->nombre}} con fecha {{$pesquisa->fecha}}</h1>
    <a href="{{ route('pesquisado.edit',$pesquisa->pesquisado->CI) }}" class="btn btn-primary">Editar datos de {{ $pesquisa->pesquisado->nombre }}</a>
    <form action="{{ route('pesquisa.update',[$pesquisa->CI_pesquisado,$pesquisa->fecha]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="anciano_solo" id="anciano_solo" @if($pesquisa->anciano_solo==1) checked @endif>
                    <label class="form-check-label" for="anciano_solo">Anciano Solo</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="app" id="ap" @if($pesquisa->app==1) checked @endif>
                    <label class="form-check-label" for="ap">App</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="encamado" id="encamado" @if($pesquisa->encamado==1) checked @endif>
                    <label class="form-check-label" for="encamado">Encamado</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="VIH" id="VIH" @if($pesquisa->VIH==1) checked @endif>
                    <label class="form-check-label" for="VIH">VIH</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="diambulante" id="deambulante" @if($pesquisa->diambulante==1) checked @endif>
                    <label class="form-check-label" for="deambulante">Deambulante</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="familia_riesgo" id="familia_riesgo" @if($pesquisa->familia_riesgo==1) checked @endif>
                    <label class="form-check-label" for="familia_riesgo">Familia con riesgo</label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="embarazada" id="embarazada" @if($pesquisa->embarazada==1) checked @endif>
                    <label class="form-check-label" for="embarazada">Embarazada</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="puerpera" id="puerpera" @if($pesquisa->puerpera==1) checked @endif>
                    <label class="form-check-label" for="puerpera">Puerpera</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="contacto" id="contacto" @if($pesquisa->contacto==1) checked @endif>
                    <label class="form-check-label" for="contacto">Contacto</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="inmunodeprimido" id="inmunodeprimido" @if($pesquisa->inmunodeprimido==1) checked @endif>
                    <label class="form-check-label" for="inmunodeprimido">Inmunodeprimido</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="t_salud" id="t_salud" @if($pesquisa->t_salud==1) checked @endif>
                    <label class="form-check-label" for="t_salud">Trabajador de la salud</label>
                </div>
                <div class="form-group">
                    <input class="form-check-inline" value="1" type="checkbox" name="t_turismo" id="t_turismo" @if($pesquisa->t_turismo==1) checked @endif>
                    <label class="form-check-label" for="t_turismo">Trabajador del turismo</label>
                </div>
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="Editar">
    </form>
@endsection

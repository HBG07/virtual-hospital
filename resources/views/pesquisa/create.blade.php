@extends('layouts.app')
@section('title','Añadir nueva pesquisa')
@section('content')
    <h1>Añadir nueva pesquisa</h1>
    <form action="{{ route('pesquisa.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class=" form-group">
                    <label for="CI">CI</label>
                    <input list="CI_pesquisados" class="form-control @error('CI_pesquisado') is-invalid @enderror" type="text" name="CI_pesquisado" id="CI" value="{{ old('CI_pesquisado') }}">
                    <datalist id="CI_pesquisados">
                        @foreach ($pesquisados as $pesquisado)
                            <option value="{{ $pesquisado->CI }}">
                        @endforeach
                    </datalist>
                    @error('CI_pesquisado')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="nombre">Nombre</label>
                    <input list="nombre_pesquisados" class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
                    <datalist id="nombre_pesquisados">
                        @foreach ($pesquisados as $pesquisado)
                            <option value="{{ $pesquisado->nombre }}">
                        @endforeach
                    </datalist>
                    @error('nombre')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="primer_apellido">Primer Apellido</label>
                    <input list="primer_apellido_pesquisados" class="form-control @error('primer_apellido') is-invalid @enderror" type="text" name="primer_apellido" id="primer_apellido" value="{{ old('nombre') }}">
                    <datalist id="primer_apellido_pesquisados">
                        @foreach ($pesquisados as $pesquisado)
                            <option value="{{ $pesquisado->primer_apellido }}">
                        @endforeach
                    </datalist>
                    @error('primer_apellido')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input list="segundo_apellido_pesquisados" class="form-control @error('segundo_apellido') is-invalid @enderror" type="text" name="segundo_apellido" id="segundo_apellido" value="{{ old('nombre') }}">
                    <datalist id="segundo_apellido_pesquisados">
                        @foreach ($pesquisados as $pesquisado)
                            <option value="{{ $pesquisado->segundo_apellido }}">
                        @endforeach
                    </datalist>
                    @error('segundo_apellido')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="numero_consultorio">Número de Consultorio</label>
                    <select class="form-control" name="numero_consultorio" id="numero_consultorio">
                        @foreach ($consultorios as $consultorio)
                            <option value="{{ $consultorio->numero }}">{{ $consultorio->numero }}</option>
                        @endforeach
                    </select>
                    @error('numero_consultorio')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tipo_pesquisador">Tipo de pesquisador</label>
                    <select class="form-control" name="tipo_pesquisador" id="tipo_pesquisador">
                        <option value="médico">Médico</option>
                        <option value="estomatólogo">Estomatólogo</option>
                        <option value="enfermera">Enfermera</option>
                        <option value="técnico">Técnico</option>
                        <option value="estudiante">Estudiante</option>
                        <option value="lider de la comunidad">Lider de la comunidad</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input class="form-control @error('fecha') is-invalid @enderror" type="date" name="fecha" id="fecha">
                    @error('fecha')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="anciano_solo" id="anciano_solo">
                            <label class="form-check-label" for="anciano_solo">Anciano Solo</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="app" id="ap">
                            <label class="form-check-label" for="ap">App</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="encamado" id="encamado">
                            <label class="form-check-label" for="encamado">Encamado</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="VIH" id="VIH">
                            <label class="form-check-label" for="VIH">VIH</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="diambulante" id="deambulante">
                            <label class="form-check-label" for="deambulante">Deambulante</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="familia_riesgo" id="familia_riesgo">
                            <label class="form-check-label" for="familia_riesgo">Familia con riesgo</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="embarazada" id="embarazada">
                            <label class="form-check-label" for="embarazada">Embarazada</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="puerpera" id="puerpera">
                            <label class="form-check-label" for="puerpera">Puerpera</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="contacto" id="contacto">
                            <label class="form-check-label" for="contacto">Contacto</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="inmunodeprimido" id="inmunodeprimido">
                            <label class="form-check-label" for="inmunodeprimido">Inmunodeprimido</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="t_salud" id="t_salud">
                            <label class="form-check-label" for="t_salud">Trabajador de la salud</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-inline" value="1" type="checkbox" name="t_turismo" id="t_turismo">
                            <label class="form-check-label" for="t_turismo">Trabajador del turismo</label>
                        </div>
                    </div>
                </div>
                <input class="btn btn-success" type="submit" value="Añadir">
            </div>
        </div>
    </form>
@endsection

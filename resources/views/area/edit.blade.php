@extends('layouts.app')
@section('title','Editar '.$area->nombre)
@section('content')
<h1>Editar {{ $area->nombre }}</h1>
    {!! Form::open(['route'=>['area.update',$area->nombre],'method'=>'PUT']) !!}
    <div class=" form-group">
        {!! Form::label('nombre','Nombre') !!}
        {!! Form::text('nombre',$area->nombre,['class'=>'form-control']) !!}
    </div>
    <div class=" form-group">
        {!! Form::label('provincia','Provincia') !!}
        {!! Form::text('provincia',$area->provincia,['class'=>'form-control']) !!}
    </div>
    <div class=" form-group">
        {!! Form::label('municipio','Municipio') !!}
        {!! Form::text('municipio',$area->municipio,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection

@extends('layouts.app')
@section('title','Añadir Area')
@section('content')
    <h1>Añadir Area</h1>
    {!! Form::open(['route'=>'area.store','method'=>'POST']) !!}
    <div class=" form-group">
        {!! Form::label('nombre','Nombre') !!}
        {!! Form::text('nombre',null,['class'=>'form-control']) !!}
    </div>
    <div class=" form-group">
        {!! Form::label('provincia','Provincia') !!}
        {!! Form::text('provincia',null,['class'=>'form-control']) !!}
    </div>
    <div class=" form-group">
        {!! Form::label('municipio','Municipio') !!}
        {!! Form::text('municipio',null,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('Añadir',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection

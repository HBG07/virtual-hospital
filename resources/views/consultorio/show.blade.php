@extends('layouts.app')
@section('title','Consultorio '.$consultorio->numero)
@section('content')
<h1>Consultorio {{ $consultorio->numero }}</h1>
<h3>{{ $consultorio->direccion }} | {{ $consultorio->nombre_area }}</h3>
@endsection

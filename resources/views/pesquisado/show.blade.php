@extends('layouts.app')
@section('title','Detalles de '.$pesquisado->nombre)
@section('content')
    <h1>{{ $pesquisado->nombre }}</h1>
    <h3>{{$pesquisado->CI}} | {{$pesquisado->nombre}} | {{$pesquisado->primer_apellido}} | {{$pesquisado->segundo_apellido}} | {{$pesquisado->numero_consultorio}}</h3>
@endsection

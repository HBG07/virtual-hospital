@extends('layouts.app')
@section('title',$area->nombre)
@section('content')
    <h1>{{ $area->nombre }}</h1>
    <h3>{{ $area->provincia }} | {{ $area->municipio }}</h3>
@endsection

@extends('layouts.app')
@section('title','Usuarios')
@section('content')
<div class="container">
<h1>Editar datos de {{$usuario->name}}</h1>
<form action="{{route('user.update',$usuario->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class=" form-group">
        <label for="name">Nombre de usuario</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name',$usuario->name) }}">
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class=" form-group">
        <label for="email">Correo</label>
        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email',$usuario->email) }}">
        @error('email')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="type">Tipo de usuario</label>
        {!! Form::select('type', ['miembro'=>'miembro','administrador'=>'administrador'], $usuario->type, ['class'=>'form-control']) !!}
    </div>
    <div class=" form-group">
        <label for="password">Clave</label>
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{ old('password',$usuario->password) }}">
        @error('password')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class=" form-group">
        <label for="password_confirmation">Confirmar Clave</label>
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password',$usuario->password) }}">
    </div>
    <input class="btn btn-primary" type="submit" value="Modificiar">
</form>

</div>
@endsection

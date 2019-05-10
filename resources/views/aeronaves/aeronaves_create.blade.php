@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/aeronaves" method="post">
        @csrf
        <div class="container">
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula" id="matricula" value="{{ old('matricula') }}">
        </div>
        <div class="container">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        <div class="container">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}">
        </div>
        <div class="container">
            <label for="num_lugares">Numero de Lugares</label>
            <input type="text" name="num_lugares" id="num_lugares" value="{{ old('num_lugares') }}">
        </div>
        <div class="container">
            <label for="conta_horas">Conta-Horas</label>
            <input type="text" name="conta_horas" id="conta_horas" value="{{ old('conta_horas') }}">
        </div>
        <div class="container">
            <label for="preco_hora">Preco-Hora</label>
            <input type="text" name="preco_hora" id="preco_hora" value="{{ old('preco_hora') }}">
        </div>
        <div class="container">
            <label for="tempos">Tempos</label>
            {{-- TODO: Ver a parte do conta-horas, tempos, preços --}}
        </div>
        <div class="row">
            <input class="btn btn-outline-primary" type="submit" value="Confirmar">
        </div>

    </form>
</div>
@endsection
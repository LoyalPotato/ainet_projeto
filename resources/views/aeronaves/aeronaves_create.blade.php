@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/aeronaves">
        @csrf
        <div class="container">
            <label for="matricula" class="mr-2">Matricula</label>
            <input type="text" name="matricula" id="matricula" value="{{ old('matricula') }}">
        </div>
        <div class="container">
            <label for="marca" class="mr-2">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        <div class="container">
            <label for="modelo" class="mr-2">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}">
        </div>
        
        
        <div class="container">
            <label for="conta_horas" class="mr-2">Conta-Horas</label>
            <input type="number" name="conta_horas" id="conta_horas" value="{{ old('conta_horas') }}">
        </div>
        <div class="container">
            <label for="preco_hora" class="mr-2">Preco-Hora</label>
            <input type="number" name="preco_hora" id="preco_hora" value="{{ old('preco_hora') }}">
        </div>
        
        <div class="container">
            <label for="tempos" class="mr-2">Tempos</label>
            <input type="number" name="tempos[]" id="tempos">
        </div>

        <div class="container">
            <label for="precos" class="mr-2">Precos</label>
            <input type="number" name="precos[]" id="precos">
        </div>
        <input class="btn btn-outline-primary m-2" type="submit" value="Confirmar">

        @include('aeronaves.aeronaves_valores')

    </form>
</div>
@endsection
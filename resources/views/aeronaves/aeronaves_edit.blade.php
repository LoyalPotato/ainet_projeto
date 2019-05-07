@extends('layouts.app')

@section('content')
@auth
@if (auth()->user()->direcao)
<div class="container">
    <form method="POST" action="/aeronaves/{{$aeronave->matricula}}">
        @csrf
        {{method_field('PUT')}}

        <div class="container">
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula" id="matricula" value="{{ old('matricula') }}">
        </div>
        <div class="container">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca">
        </div>
        <div class="container">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo">
        </div>
        <div class="container">
            <label for="num_lugares">Numero de Lugares</label>
            <input type="text" name="num_lugares" id="num_lugares">
        </div>
        <div class="container">
            <label for="conta_horas">Conta-Horas</label>
            <input type="text" name="conta_horas" id="conta_horas">
        </div>
        <div class="container">
            <label for="preco_hora">Preco-Hora</label>
            <input type="text" name="preco_hora" id="preco_hora">
        </div>
        <div class="container">
            <label for="tempos">Tempos</label>
            {{-- TODO: Ver a parte do conta-horas, tempos, preços --}}
        </div>
        <div class="container">

        </div>

        <div class="container">
            <input type="submit" value="Confirmar">
        </div>
    </form>
</div>

@endif
@endauth

@endsection
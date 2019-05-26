@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.errors')

    <form method="POST" action="/aeronaves">
        @csrf
        <div class="container">
            <label for="matricula" class="mr-2">Matricula</label>
            <input type="text" name="matricula" id="matricula" value="{{ old('matricula') }}" required>
        </div>
        <div class="container">
            <label for="marca" class="mr-2">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}" required>
        </div>
            <div class="container">
            <label for="modelo" class="mr-2">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}" required>
        </div>
            <div class="container">
            <label for="num_lugares" class="mr-2">Numero de Lugares</label>
            <input type="text" name="num_lugares" id="num_lugares" value="{{ old('num_lugares') }}" required>
        </div>
        <div class="container">
            <label for="conta_horas" class="mr-2">Conta-Horas</label>
            <input type="number" name="conta_horas" id="conta_horas" value="{{ old('conta_horas') }}" required>
        </div>
        <div class="container">
            <label for="preco_hora" class="mr-2">Preco-Hora</label>
            <input type="number" name="preco_hora" id="preco_hora" value="{{ old('preco_hora') }}" required>
        </div>
        @for ($i = 1; $i < 11; $i++) <div class="input-group my-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Unidade Conta-Hora: {{$i}}</span>
            </div>
            <div class="container">
                <label for="precos" class="my-2">Minutos: </label>
                <input type="number" max="60" class="form-control" name="tempos[]" id="tempos" value="{{5*$i}}" required>
                <label for="precos" class="my-2">Precos: </label>
                <input type="number" class="form-control" name="precos[]" id="precos" required>
            </div>
            @endfor
            <button class="btn btn-outline-primary m-2" type="submit" > Confirmar </button>
        </form>
    </div>
{{-- NOTE: No create é preciso ter a tabela dos outros? --}}
    {{-- <div class="container">
    @include('aeronaves.aeronaves_valores')
    </div> --}}
@endsection
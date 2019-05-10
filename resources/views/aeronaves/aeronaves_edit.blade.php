@extends('layouts.app')

@section('content')
@auth
@if (auth()->user()->direcao)
<div class="container">
    <form method="POST" action="/aeronaves/{{$aeronave->matricula}}">
        @csrf
        @method('PUT')
        <div class="container">
            <label for="matricula" class="mr-2">Matricula</label>
            {{-- TODO: Fill with values and after submit if sometihing is wrong keep edited values? --}}
            <input type="text" name="matricula" id="matricula" placeholder="{{ $aeronave->matricula}}">
        </div>
        <div class="container">
            <label for="marca" class="mr-2">Marca</label>
            <input type="text" name="marca" id="marca" placeholder="{{ $aeronave->marca}}">
        </div>
        <div class="container">
            <label for="modelo" class="mr-2">Modelo</label>
            <input type="text" name="modelo" id="modelo" placeholder="{{ $aeronave->modelo}}">
        </div>
        <div class="container">
            <label for="num_lugares" class="mr-2">Numero de Lugares</label>
            <input type="text" name="num_lugares" id="num_lugares" placeholder="{{ $aeronave->num_lugares}}">
        </div>
        <div class="container">
            <label for="conta_horas" class="mr-2">Conta-Horas</label>
            <input type="text" name="conta_horas" id="conta_horas" placeholder="{{ $aeronave->conta_horas}}">
        </div>
        <div class="container">
            <label for="preco_hora" class="mr-2">Preco-Hora</label>
            <input type="text" name="preco_hora" id="preco_hora" placeholder="{{ $aeronave->preco_hora}}">
        </div>
        <div class="container">
            <input  class="btn btn-outline-primary my-2" type="submit" value="Confirmar">
        </div>
    </form>

    @include('aeronaves.aeronaves_valores')
    
</div>

@endif
@endauth

@endsection
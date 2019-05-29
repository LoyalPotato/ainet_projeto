@extends('layouts.app')
{{-- NOTE: Aqui é para editar a tabela dos valores tbm? Tipo redefinir os preços por tempo?
    Nao percebo o que é para por nos campos tempos[] e precos[] --}}

@section('content')

@can('update', $aeronave)

<div class="container">
    @include('layouts.errors')
    <div class="container">
        <p class="display-4 mb-3" > A editar: {{ $aeronave->matricula }} </p>
    </div>

    <form method="POST" action="/aeronaves/{{$aeronave->matricula}}">
        @csrf
        @method('PUT')

        @include('aeronaves.partials.create-edit')
        {{-- <div class="container">
            <label for="marca" class="mr-2">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ $aeronave->marca}}" >
        </div>

        <div class="container">
            <label for="modelo" class="mr-2">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="{{ $aeronave->modelo}}" >
        </div>

        <div class="container">
            <label for="num_lugares" class="mr-2">Numero de Lugares</label>
            <input type="text" name="num_lugares" id="num_lugares" value="{{ $aeronave->num_lugares}}" >
        </div>

        <div class="container">
            <label for="conta_horas" class="mr-2">Conta-Horas</label>
            <input type="text" name="conta_horas" id="conta_horas" value="{{ $aeronave->conta_horas }}" >
        </div>

        <div class="container">
            <label for="preco_hora" class="mr-2">Preco-Hora</label>
            <input type="text" name="preco_hora" id="preco_hora" value="{{ $aeronave->preco_hora }}" >
        </div> --}}

        @foreach ($aeronave->valores as $valor) 
        <div class="input-group my-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Unidade Conta-Hora: {{$valor->unidade_conta_horas}}</span>
            </div>
            <div class="container">
                <label for="precos" class="my-2">Minutos: </label>
                <input type="number" max="60" class="form-control" name="tempos[]" id="tempos" value="{{$valor->minutos}}" >
                <label for="precos" class="my-2">Precos: </label>
                <input type="number" class="form-control" name="precos[]" id="precos" value = {{$valor->preco}} >
            </div>
            @endforeach
            <button class="btn btn-outline-primary m-2" type="submit"> Confirmar </button>
    </form>


    <div class="container">
        @include('aeronaves.aeronaves_valores')
    </div>
</div>

@endcan

@endsection
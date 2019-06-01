@extends('layouts.app')
{{-- NOTE: Aqui é para editar a tabela dos valores tbm? Tipo redefinir os preços por tempo?
    Nao percebo o que é para por nos campos tempos[] e precos[] --}}

@section('content')

@can('update', Auth::user(),  $aeronave)

<div class="container">
    @include('layouts.errors')
    <div class="container">
        <p class="display-4 mb-3" > A editar: {{ $aeronave->matricula }} </p>
    </div>

    <form method="POST" action="/aeronaves/{{$aeronave->matricula}}">
        @csrf
        @method('PUT')

        @include('aeronaves.partials.create-edit')
        
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
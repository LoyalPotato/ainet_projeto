@extends('layouts.app')
{{-- NOTE: Aqui é para editar a tabela dos valores tbm? Tipo redefinir os preços por tempo?
    Nao percebo o que é para por nos campos tempos[] e precos[] --}}

@section('content')

@can('view', $aeronave)
    
<div class="container">
    <form method="POST" action="/aeronaves/{{$aeronave->matricula}}">
        @csrf
        @method('PUT')
        <div class="container">
            <label for="matricula" class="mr-2">Matricula</label>
            <input type="text" name="matricula" id="matricula" placeholder="{{ $aeronave->matricula}}">
            <label for="marca" class="mr-2">Marca</label>
            <input type="text" name="marca" id="marca" placeholder="{{ $aeronave->marca}}">
            <label for="modelo" class="mr-2">Modelo</label>
            <input type="text" name="modelo" id="modelo" placeholder="{{ $aeronave->modelo}}">
            <label for="num_lugares" class="mr-2">Numero de Lugares</label>
            <input type="text" name="num_lugares" id="num_lugares" placeholder="{{ $aeronave->num_lugares}}">
            <label for="conta_horas" class="mr-2">Conta-Horas</label>
            <input type="text" name="conta_horas" id="conta_horas" placeholder="{{ $aeronave->conta_horas}}">
            <label for="preco_hora" class="mr-2">Preco-Hora</label>
            <input type="text" name="preco_hora" id="preco_hora" placeholder="{{ $aeronave->preco_hora}}">
            <button  class="btn btn-outline-primary my-2" type="submit" value="Confirmar">
        </div>
    </form>

    @include('aeronaves.aeronaves_valores')
    
</div>

@endcan

@endsection
@extends('layouts.app')
@section('content')
<div class="container">

    @include('layouts.errors')
    <div class="container">
        <p class="display-4 mb-3"> A editar: {{ $aerodromo->code }} </p>
    </div>

    <form method="POST" action="/aerodromos/{{$aerodromo->code}}">
        @csrf
        @method('PUT')

        <div class="container">
            <label for="nome" class="mr-2">Marca: </label>
            <input type="text" name="nome" id="nome" value="{{old('nome', $aerodromo->nome)}}" required>
        </div>
        <button class="btn btn-outline-primary m-2" type="submit"> Confirmar </button>


    </form>


    @endsection
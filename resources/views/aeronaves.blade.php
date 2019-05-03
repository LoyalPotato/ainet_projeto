@extends('template')

@section('content')

@auth
<a href="{{ url('/home') }}">Home</a>
@endauth

@if (count($naves))
<table class="table table-striped">
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Numero de Lugares</th>
            <th>Conta-horas</th>
            <th>Preco-hora</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($naves as $nave)
        <tr>
            <td>{{$nave->matricula}}</td>
            <td>{{$nave->marca}}</td>
            <td>{{$nave->modelo}}</td>
            <td>{{$nave->num_lugares}}</td>
            <td>{{$nave->conta_horas}}</td>
            <td>{{$nave->preco_hora}}</td>
        </tr>
        @endforeach
</table>
@else
<h2>Nao existem aeronaves</h2>
@endif
@endsection
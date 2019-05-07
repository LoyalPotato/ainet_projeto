@extends('layouts.app')

@section('content')

<div class="container">
    <p>
        <a href="{{ url('/home') }}">Home</a>
    </p>
</div>

@if (count($naves)>1)

<div class="container">
    <p>
        <a href="{{ url('/aeronaves/create') }}"> Nova nave </a>
    </p>
</div>

@endif

@if (count($naves))
<div class="container">
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
                <td>
                    <a href="/aeronaves/{{$nave->matricula}}">
                        {{$nave->matricula}}
                    </a>
                </td>
                <td>{{$nave->marca}}</td>
                <td>{{$nave->modelo}}</td>
                <td>{{$nave->num_lugares}}</td>
                <td>{{$nave->conta_horas}}</td>
                <td>{{$nave->preco_hora}}</td>
            </tr>
            @endforeach
    </table>
</div>
{{-- Esta linha serve para paginaçao. Sao enviadas quatro naves --}}
@if (count($naves)>1)
{{ $naves->links() }}
@endif
@else
<h2>Nao existem aeronaves</h2>
@endif
@endsection
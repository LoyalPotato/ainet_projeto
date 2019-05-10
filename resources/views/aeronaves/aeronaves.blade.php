@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn btn-outline-primary m-3" href="{{ url('/home') }}">Home</a>
    @if (count($naves)>1)
    <a class="btn btn-outline-primary" href="{{ url('/aeronaves/create') }}"> Nova nave </a>
    @endif
</div>



@if (count($naves))
<div class="container">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Numero de Lugares</th>
                <th>Horas</th>
                <th>Preco-hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($naves as $nave)
            @if ($nave->deleted_at == null )
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
            @endif
            @endforeach
    </table>
    @if (count($naves)>1)
    {{ $naves->links() }}
    @endif
    {{-- @include('aeronaves.aeronaves_valores') --}}
</div>
{{-- Esta linha serve para paginaçao. Sao enviadas quatro naves --}}
@else
<h2>Nao existem aeronaves</h2>
@endif


@endsection
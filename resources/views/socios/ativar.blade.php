@extends('layouts.app')

@section('title', 'Tabela socios')
@section('content')

<div class="container mb-4">
    <h3> Ativar/Desativar Sócios </h3>
</div>

@can('create', \App\User::class)
<div class="container">
    @if (count($users)>1)
        <button onclick="desativarALL()" class="btn btn-outline-primary mb-2 mr-2 float-left">Desativar todos os sócios sem quotas em dia</button>
    @endif
</div>
@endcan


@if(count($users))

<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Nº Sócio</th>
            <th>Nome Informal</th>
            <th>Direção</th>
            <th>Sócio Ativo</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->num_socio}}</td>
            <td>{{$user->nome_informal}}</td>
            <td>{{$user->direcao}}</td>
            <td>{{$user->ativo}}</td>
            @can('create', \App\User::class)
            <td>
                <button onclick="ativar()" class="btn btn-primary mb-2 mr-2 float-left">Ativar</button>
                <button onclick="desativar()" class="btn btn-danger mb-2 mr-2 float-left">Desativar</button>
            </td>
            @endcan
        </tr>
    @endforeach
    </table>
    @if (count($users) > 1)
    {{ $users->links() }}
    @endif
</div>

@else
    <h2>Não foram encontrados sócios</h2>
@endif
@endsection
@extends('layouts.app')

@section('title', 'Tabela socios')
@section('content')

<div class="container ml-2 mb-4">
    <h3> Lista fichas sócios</h3>
</div>

@if(count($users))
<div class="container ml-2">
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nº Sócio</th>
            <th>Nome Informal</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Tipo Sócio</th>
            <th>Numero licença</th>
            <th>Direção</th>
            <th>Ativo</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->foto_url}}</td>
            <td>{{$user->num_socio}}</td>
            <td>{{$user->nome_informal}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->telefone}}</td>
            <td>{{$user->tipo_socio}}</td>
            <td>{{$user->num_licenca}}</td>
            <td>{{$user->direcao}}</td>
            <td>{{$user->ativo}}</td>
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
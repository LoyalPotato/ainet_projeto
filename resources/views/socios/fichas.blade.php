@extends('layouts.app')

@section('title', 'Tabela socios')
@section('content')

<div class="container mb-4">
    <h3> Lista de sócios</h3>
</div>

@if(count($users))
<div class="container">
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nº Sócio</th>
            <th>Nome Completo</th>
            <th>Nome Informal</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Direção</th>
            <th>Ativo</th>
            <th>Tipo Sócio</th>
            <th>Numero licença</th>
            <th>Tipo licença</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    @if($user->ativo)
        <tr>
            <td>
                <img src="{{ $user->foto_url == null ? asset('storage/fotos/noimage.jpg') : asset('storage/fotos/' . $user->foto_url)}}" width="200px" height="200px" class="img-thumbnail"/>
            </td>
            <td>{{$user->num_socio}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->nome_informal}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->telefone}}</td>
            <td>{{$user->direcao}}</td>
            <td>{{$user->ativo}}</td>
            <td>{{$user->tipo_socio}}</td>
            <td>{{$user->num_licenca}}</td>
            <td>{{$user->tipo_licenca}}</td>
        </tr>
    @endif
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
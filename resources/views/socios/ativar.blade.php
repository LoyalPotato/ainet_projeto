@extends('layouts.app')

@section('title', 'Tabela socios')
@section('content')


<div class="container mb-4">
    <h3> Ativar/Desativar Sócios </h3>
    <form action="{{route('socios.ativar')}}" method="POST">
        @method('PATCH')
        @csrf
        <button onclick="deactivateSocios()" class="btn btn-outline-primary mb-2">Desativar sócios</button>
    </form>
</div>


@if(count($users))
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Nº Sócio</th>
            <th>Nome Informal</th>
            <th>Direção</th>
            <th>Quotas Pagas</th>
            <th>Sócio Ativo</th>
            <th>Alterar estado sócio</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->num_socio}}</td>
            <td>{{$user->nome_informal}}</td>
            <td>{{$user->direcao}}</td>
            <td>{{$user->quota_paga}}</td>
            <td>{{$user->ativo}}</td>
            @can('create', \App\User::class)
            <td>
            <form method="POST" action="{{route('ativarDesativarSocio', $user->id)}}">
                @method('PATCH')
                @csrf
                <div class="form-group mb-2">
                    <select name="ativo" id="ativo" class="form-control" value="{{ $user->ativo}}">
                        <option disabled selected> -- Selecione uma opção -- </option>
                        <option value="1" {{ old('ativo', strval($user->ativo)) == 1 ? 'selected' : '' }} >Ativo</option>
                        <option value="0" {{ old('ativo', strval($user->ativo)) == 0 ? 'selected' : '' }} >Desativado</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit" name="name=">Submeter</button>
            </form>
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
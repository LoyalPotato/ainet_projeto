@extends('layouts.app')

@section('title', 'Tabela socios')
@section('content')

<div class="container mb-4">
    <h3> Ativar/Desativar Sócios </h3>
</div>




@can('ativarDesativar', auth()->user())
{{-- TODO: --}}
<div class="container">
    @if (count($users) > 1)
    <form method="POST" action="{{route('mudarAtivo', $users)}}" role="form" class="inline">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-primary ml-2">Ativar</button>
    </form>
    <form method="POST" action="{{route('mudarAtivo', $users)}}" role="form" class="inline">
        @csrf
        <button type="submit" class="btn btn-primary ml-2">Ativar</button>
    </form>
    <button class="btn btn-outline-primary mb-2 mr-2 float-left">Desativar sócios</button>
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
                <th>Alterar estado sócio</th>
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
                    <form method="POST" action="/socios/{{$user->user}}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group mb-2">
                            <select name="ativo" id="ativo" class="form-control" value="{{ $user->ativo}}">
                                <option disabled selected> -- Selecione uma opção -- </option>
                                <option value="1" {{ old('ativo', strval($user->ativo)) == 1 ? 'selected' : '' }}>Ativo
                                </option>
                                <option value="0" {{ old('ativo', strval($user->ativo)) == 0 ? 'selected' : '' }}>
                                    Desativado</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Submeter</button>
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
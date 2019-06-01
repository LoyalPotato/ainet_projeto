@extends('layouts.app')

@section('content')

@if (session('sucesso'))
<div class="alert alert-success">
    <p>{{ session('sucesso') }}</p>
</div>
@endif

<div class="container">
    <p class="display-4 mb-3"> Pilotos Autorizados </p>
</div>



@if(count($users_auto))

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nº Sócio</th>
                <th>ID</th>
                <th>Nome Informal</th>
                <th>Nome Completo</th>
                <th>Sexo</th>
                <th>Data Nascimento</th>
                <th>Email</th>
                <th>NIF</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Tipo Sócio</th>
                <th>Quotas em dia</th>
                <th>Sócio Ativo</th>
                <th>Direção</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users_auto as $user_auto)
            <tr>
                <td>{{$user_auto->num_socio}}</td>
                <td>{{$user_auto->id}}</td>
                <td>{{$user_auto->nome_informal}}</td>
                <td>{{$user_auto->name}}</td>
                <td>{{$user_auto->sexo}}</td>
                <td>{{$user_auto->data_nascimento}}</td>
                <td>{{$user_auto->email}}</td>
                <td>{{$user_auto->nif}}</td>
                <td>{{$user_auto->telefone}}</td>
                <td>{{$user_auto->endereco}}</td>
                <td>{{$user_auto->tipo_socio}}</td>
                <td>{{$user_auto->quota_paga}}</td>
                <td>{{$user_auto->ativo}}</td>
                <td>{{$user_auto->direcao}}</td>
                <td>
                    <form method="POST" action="{{ route('destroy_apiloto',[$aeronave->matricula, $user_auto->id])}}"
                        role="form" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-2">Remover autorização</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
    @if (count($users_auto) > 1)
    {{ $users_auto->links() }}
    @endif
    </table>
</div>

@else
<h2>Não foram encontrados sócios autorizados</h2>
@endif

<div class="container">
    <p class="display-4 mb-3"> Pilotos Não Autorizados </p>
</div>

@if(count($users_not_auto))

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nº Sócio</th>
                <th>ID</th>
                <th>Nome Informal</th>
                <th>Nome Completo</th>
                <th>Sexo</th>
                <th>Data Nascimento</th>
                <th>Email</th>
                <th>NIF</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Tipo Sócio</th>
                <th>Quotas em dia</th>
                <th>Sócio Ativo</th>
                <th>Direção</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users_not_auto as $user_not_auto)
            <tr>
                <td>{{$user_not_auto->num_socio}}</td>
                <td>{{$user_not_auto->id}}</td>
                <td>{{$user_not_auto->nome_informal}}</td>
                <td>{{$user_not_auto->name}}</td>
                <td>{{$user_not_auto->sexo}}</td>
                <td>{{$user_not_auto->data_nascimento}}</td>
                <td>{{$user_not_auto->email}}</td>
                <td>{{$user_not_auto->nif}}</td>
                <td>{{$user_not_auto->telefone}}</td>
                <td>{{$user_not_auto->endereco}}</td>
                <td>{{$user_not_auto->tipo_socio}}</td>
                <td>{{$user_not_auto->quota_paga}}</td>
                <td>{{$user_not_auto->ativo}}</td>
                <td>{{$user_not_auto->direcao}}</td>
                <td>
                    <form method="POST" action="{{route('store_apiloto', [$aeronave->matricula, $user_not_auto->id])}}"
                        role="form" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-primary mb-2 float-left">Adicionar autorização</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
    @if (count($users_not_auto) > 1)
    {{ $users_not_auto->links() }}
    @endif
    </table>
</div>

@else
<h2>Não foram encontrados sócios não autorizados</h2>
@endif

@endsection
@extends('master')

@section('title', 'List users')

@section('content')
@can('create', App\User::class)
<div>
    <a class="btn btn-primary" href="{{route('users.add')}}">Adicionar Sócio</a>
</div>
@endcan

@if(count($users))
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Nº Sócio</th>
            <th>Nome Informal</th>
            <th>Nome Completo</th>
            <th>Sexo</th>
            <th>Data Nascimento</th>
            <th>Email</th>
            <th>Foto</th>
            <th>NIF</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Tipo Sócio</th>
            <th>Quotas em dia</th>
            <th>Sócio Ativo</th>
            <th>Password Inicial</th>
            <th>Direção</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->numeroSocio}}</td>
            <td>{{$user->nomeInformal}}</td>
            <td>{{$user->nomeCompleto}}</td>
            <td>{{$user->sexo()}}</td>
            <td>{{$user->dataNascimento}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->foto}}</td>
            <td>{{$user->nif}}</td>
            <td>{{$user->telefone}}</td>
            <td>{{$user->endereco}}</td>
            <td>{{$user->tipoSocio()}}</td>
            <td>{{$user->quotasEmDia}}</td>
            <td>{{$user->socioAtivo}}</td>
            <td>{{$user->passwordInicial}}</td>
            <td>{{$user->direcao}}</td>
            <td>
                @can('update', $user)
                <a class="btn btn-xs btn-primary" href="{{route('users.edit', $user)}}">Editar</a>
                @endcan
                @can('delete', $user)
                <form action="{{route('users.destroy', $user)}}" method="POST" role="form" class="inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                </form>
                @endcan
            </td>
        </tr>
    @endforeach
    </table>
@else
    <h2>Não foram encontrados sócios</h2>
@endif
@endsection

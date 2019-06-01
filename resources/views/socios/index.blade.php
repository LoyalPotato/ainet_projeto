@extends('layouts.app')

@section('content')

@can('create', \App\User::class)
<div class="container">

    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/create') }}"> Novo sócio </a>
    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/quotas') }}"> Gerir quotas </a>
    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/ativar') }}"> Ativar/Desativar sócios
    </a>
    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/fichas') }}"> Fichas sócios </a>
    
</div>
@endcan

{{-- BUG: DEBUG --}}


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
            <tr>
                <td>{{$user->num_socio}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->nome_informal}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->sexo}}</td>
                <td>{{$user->data_nascimento}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->nif}}</td>
                <td>{{$user->telefone}}</td>
                <td>{{$user->endereco}}</td>
                <td>{{$user->tipo_socio}}</td>
                <td>{{$user->quota_paga}}</td>
                <td>{{$user->ativo}}</td>
                <td>{{$user->direcao}}</td>

                @can('update', $user)
                <td>
                    <a class="btn btn-primary mb-2" href="{{route('socios.edit', $user)}}">Editar</a>

                    <form action="{{route('socios.destroy', $user)}}" method="POST" role="form" class="inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                    </form>


                </td>
                @endcan
            </tr>
    </table>

</div>

@endsection
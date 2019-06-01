@extends('layouts.app')

@section('content')

@can('fichas', $user)
<div class="container">
    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/fichas') }}"> Fichas sócios </a>
</div>
@endcan

@can('create', \App\User::class)
<div class="container mb-2">
    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/fichas_direcao') }}"> Fichas sócios </a>
    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/ativar') }}"> Ativar/Desativar sócios </a>
    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/quotas') }}"> Gerir quotas </a>
    <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/socios/create') }}"> Novo sócio </a>
</div>
@endcan

@include('layouts.errors')

@if(auth()->id())
@if($user->email_verified_at != null)

<form method="GET" action="{{route('socios.index', $user)}}" enctype="multipart/form-data">
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nº Sócio</th>
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
            <td>
                <img src="{{ $user->foto_url == null ? asset('storage/fotos/noimage.jpg') : asset('storage/fotos/' . $user->foto_url)}}" height="150" width="150" class="img-thumbnail"/>
            </td>
            <td>{{$user->num_socio}}</td>
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
            <td>
                <a class="btn btn-primary mb-2" href="{{route('socios.edit', $user)}}">Editar</a>
                @can('update', $user)
                <form action="{{route('socios.destroy', $user)}}" method="POST" role="form" class="inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-xs btn-danger">Remover</button>  
                </form>
                @endcan
            </td>
        </tr>
    </table>
</div>
</form>

@endif
@endif
@endsection

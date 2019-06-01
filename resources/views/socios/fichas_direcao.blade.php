@extends('layouts.app')

@section('title', 'Tabela socios')
@section('content')

@can('create', \App\User::class)
<div class="container mb-4">
    <a class="btn btn-outline-primary mb-2 mr-2 float-right " href="{{ url('/socios/ativar') }}"> Ativar/Desativar sócios </a>
    <a class="btn btn-outline-primary mb-2 mr-2 float-right " href="{{ url('/socios/quotas') }}"> Gerir quotas </a>
    <a class="btn btn-outline-primary mb-4 mr-2 float-right " href="{{ url('/socios/create') }}"> Novo sócio </a>
</div>
@endcan

@if (count($users))
<div class="container">
    <form action="/socios/fichas_direcao" method="GET" class="inline">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <p style="color:blue;">Nº Sócio: <p>
                                    <input
                                            type="text" class="form-control"
                                            name="num_socio" id="num_socio"
                                            value="{{ old('num_socio') }}"/>
                                </th>
                                <th>
                                    <p style="color:blue;">Nome Informal: <p>
                                        <input
                                            type="text" class="form-control"
                                            name="nome_informal" id="nome_informal"
                                            value="{{ old('nome_informal') }}"/>
                                </th>
                                <th>
                                    <p style="color:blue;">Email: <p>
                                        <input
                                            type="email" class="form-control"
                                            name="email" id="email"
                                            value="{{old('email')}}"/> 
                                </th>
                            </tr>
                        </thead>
                    </table>
                
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <p style="color:blue;">Tipo Sócio: <p>                        
                                    <select name="tipo_socio" id="tipo_socio" class="form-control">
                                    <option disabled selected> -- Selecione uma opção -- </option>
                                        <option value="P">Piloto</option>
                                        <option value="NP">Não Piloto</option>
                                        <option value="A">Aeromodelista</option>
                                    </select> 
                                </th>

                                <th>
                                    <p style="color:blue;">Direção: <p>                        
                                    <select name="sexo" id="sexo" class="form-control">
                                    <option disabled selected> -- Selecione uma opção -- </option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </th>


                            </tr>
                        </thead>
                    </table>
                    <div class="container float-left mb-4">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
        </form>
</div>


<div class="container mt-4 mb-4">
    <h3> Lista de sócios</h3>
</div>


<div class="container">
@csrf
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
            <th> </th>
        </tr>
    </thead>
    <tbody id="myTable">
    @foreach ($users as $user)
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
            <td>
                @can('edit', $user)
                <a class="btn btn-primary mb-2" href="{{route('socios.edit', $user)}}">Editar</a>
                <form action="{{route('socios.destroy', $user)}}" method="POST" role="form" class="inline">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-xs btn-danger">Remover</button>  
                </form>
                @endcan
            </td>
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
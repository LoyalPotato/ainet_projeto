@extends('layouts.app')

@section('title', 'Tabela socios')
@section('content')


@include('layouts.errors')
@if (count($users))
<div class="container">
    <form method="GET" action="{{route('socios.fichas')}}"  role="form" class="inline">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>
                                <label for="num_socio" class="mr-2" style="color:blue;">Numero Socio</label>
                                    <input type="text" class="form-control" name="num_socio" id="num_socio" value="{{ old('num_socio') }}">
                                </th>
                                <th>
                                <label for="nome_informal" class="mr-2" style="color:blue;">Nome Informal</label>
                                    <input type="text" class="form-control" name="nome_informal" id="nome_informal" value="{{ old('nome_informal') }}">
                                </th>
                                <th>
                                <label for="email" class="mr-2" style="color:blue;">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                </th>
                            </tr>
                        </thead>
                    </table>
                
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>
                                <label for="tipo_socio" style="color:blue;">Tipo Sócio</label>
                                    <select name="tipo_socio" id="tipo_socio" class="form-control">
                                            <option value =""disabled selected>Selecione uma opcao</option>
                                            <option value="P">Piloto</option>
                                            <option value="NP">Não piloto</option>
                                            <option value="A">Aeromodelista</option>
                                    </select>
                                </th>

                                <th>
                                <label for="sexo" style="color:blue;">Sexo</label>
                                    <select name="sexo" id="sexo" class="form-control">
                                            <option value =""disabled selected>Selecione uma opcao</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                    </select>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <button type="submit" class="btn btn-primary m-2">Filtrar</button>    
        </form>
</div>

<div class="container mb-4">
    <h3> Lista de sócios</h3>
</div>



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
            <th> </th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    @can('fichas', $user)
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
            <td>
                @if($user == Auth::user())
                  <a class="btn btn-primary mb-2" href="{{route('socios.edit', $user)}}">Editar</a>
                @endif
            </td>
        </tr>
    @endif
    @endcan
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
@extends('layouts.app')

@section('title', 'Editar Sócio')
@section('content')


<div class="container mb-4">
    <h3> Editar sócio </h3>
</div>


@include('layouts.errors')

<div class="container">
    <form method="POST" action="{{route('socios.update', $user)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container mb-4">
            <img src="{{ $user->foto_url == null ? asset('storage/fotos/noimage.jpg') : asset('storage/fotos/' . $user->foto_url)}}"
                class="img-thumbnail" />
            <br /><br />
            <input type="file" name="foto_url" class="form-control">
        </div>

        <div class="container mb-2">
            <label for="num_socio" class="mr-2">Numero Socio</label>
            <input type="text" name="num_socio" id="num_socio" size="4" value="{{ $user->num_socio}}">
        </div>

        <div class="container mb-2">
            <label for="name" class="mr-2">Nome Completo</label>
            <input type="text" name="name" id="name" size="40" value="{{ $user->name}}">
        </div>

        <div class="container mb-2">
            <label for="nome_informal" class="mr-2">Nome Informal</label>
            <input type="text" name="nome_informal" id="nome_informal" value="{{ $user->nome_informal}}">
        </div>

        <div class="container mb-2">
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo" class="form-control" value="{{ $user->sexo}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="M" {{ old('sexo', strval($user->sexo)) == "M" ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('sexo', strval($user->sexo)) == "F" ? 'selected' : '' }}>Feminino</option>
            </select>
        </div>

        <div class="container mb-2">
            <label for="date" class="mr-2">Data Nascimento</label>
            <input type="date" name="date" id="date" value="{{ $user->data_nascimento}}">
        </div>

        <div class="container mb-2">
            <label for="email" class="mr-2">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email}}">
        </div>

        <div class="container mb-2">
            <label for="nif" class="mr-2">NIF</label>
            <input type="number" name="nif" id="nif" size="10" value="{{ $user->nif}}">
        </div>

        <div class="container mb-2">
            <label for="telefone" class="mr-2">Telefone</label>
            <input type="text" name="telefone" id="telefone" size="20" value="{{ $user->telefone}}">
        </div>

        <div class="container mb-2">
            <label for="endereco" class="mr-2">Endereço Morada</label>
            <input type="text" name="endereco" id="endereco" size="40" value="{{ $user->endereco}}">
        </div>

        <div class="container mb-2">
            <label for="quota_paga">Quota Paga</label>
            <select name="quota_paga" id="quota_paga" class="form-control" value="{{ $user->quota_paga}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('quota_paga', strval($user->quota_paga)) == 0 ? 'selected' : '' }}>Nao</option>
                <option value="1" {{ old('quota_paga', strval($user->quota_paga)) == 1 ? 'selected' : '' }}>Sim</option>
            </select>
        </div>

        <div class="col-md-12 mb-2">
            <label for="ativo">Socio Ativo</label>
            <select name="ativo" id="ativo" class="form-control" value="{{ $user->ativo}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('ativo', strval($user->ativo)) == 0 ? 'selected' : '' }}>Nao</option>
                <option value="1" {{ old('ativo', strval($user->ativo)) == 1 ? 'selected' : '' }}>Sim</option>
            </select>
        </div>

        <div class="col-md-12 mb-2">
            <label for="direcao">Direçao</label>
            <select name="direcao" id="direcao" class="form-control" value="{{ $user->direcao}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('direcao', strval($user->direcao)) == 0 ? 'selected' : '' }}>Nao</option>
                <option value="1" {{ old('direcao', strval($user->direcao)) == 1 ? 'selected' : '' }}>Sim</option>
            </select>
        </div>

        <div class="col-md-12 mb-6">
            <label for="classe_socio">Classe de Socio</label>
            <select name="classe_socio" id="classe_socio" class="form-control" value="{{ $user->classe_socio}}">
                <option value="" selected>Nenhuma</option>
                <option value="N" {{ old('classe_socio', strval($user->classe_socio)) == "N" ? 'selected' : '' }}>Normal </option>
                <option value="C" {{ old('classe_socio', strval($user->classe_socio)) == "M" ? 'selected' : '' }}>Correspondente</option>
                <option value="M" {{ old('classe_socio', strval($user->classe_socio)) == "C" ? 'selected' : '' }}>Menor</option>
                <option value="H" {{ old('classe_socio', strval($user->classe_socio)) == "H" ? 'selected' : '' }}>Honorário</option>
            </select>
        </div>
        

        <div class="col-md-12 mb-6">
            <label for="tipo_socio">Tipo Sócio</label>
            <select name="tipo_socio" id="tipo_socio" class="form-control" value="{{ $user->tipo_socio}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="P" {{ old('tipo_socio', strval($user->tipo_socio)) == "P" ? 'selected' : '' }}>Piloto
                </option>
                <option value="NP" {{ old('tipo_socio', strval($user->tipo_socio)) == "NP" ? 'selected' : '' }}>Nao
                    piloto</option>
                <option value="A" {{ old('tipo_socio', strval($user->tipo_socio)) == "A" ? 'selected' : '' }}>
                    Aeromodelista</option>
            </select>
        </div>

        @if($user->tipo_socio == "P")
        <div class=" col-md-12 mb-2 mt-5">
            <h4> Dados Piloto </h4>
        </div>
        @include('socios.pilotos.edit_piloto')
        @endif

        <div class="container mt-3">
            <button type="submit" class="btn btn-success" name="ok">Guardar</button>
            <a type="submit" class="btn btn-default" name="cancel" href="{{route('socios.index')}}">Cancelar</a>
        </div>
    </form>
    
    <form method="GET" action="{{route('verification.resend')}}" role="form" >
        {{-- TODO: Funcao para que seja redirecionado para tras --}}
            @csrf
            <button type="submit" class="btn btn-primary m-3 float-left" >Reenviar confirmação email</button>

            {{-- <a type="submit" class="btn btn-primary float-right" href="">Reenviar confirmação email</a> --}}
        </form>

</div>
@endsection
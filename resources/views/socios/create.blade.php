@extends('layouts.app')

@section('title', 'Adicionar Sócio')
@section('content')

<div class="container ml-4">
    <h2> Adicionar Sócio  </h2>
</div>


@can('view', $user)

<div class="row ml-4">
<form method="POST" action="/socios" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12 mb-4">
        <img src="{{ $user->foto_url == null ? asset('storage/fotos/noimage.jpg') : asset('storage/fotos/' . $user->foto_url)}}" class="img-thumbnail"/>
        <br/><br/>
        <input type="file" name="foto_url" class="form-control">  
    </div> 

    <div class="container mb-2">
        <label for="num_socio" class="mr-2">Numero Socio</label>
        <input type="text" name="num_socio" id="num_socio" value="{{ old('num_socio') }}">
    </div>

    <div class="container mb-2">
        <label for="name" class="mr-2">Nome Completo</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>

    <div class="container mb-2">
        <label for="nome_informal" class="mr-2">Nome Informal</label>
        <input type="text" name="nome_informal" id="nome_informal" value="{{ old('nome_informal') }}">
    </div>

    <div class="container mb-2">
        <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('sexo', strval($user->sexo)) == 0 ? 'selected' : '' }} >Masculino</option>
                <option value="1" {{ old('sexo', strval($user->sexo)) == 1 ? 'selected' : '' }} >Feminino</option>
            </select>
    </div>

    <div class="container mb-2">
        <label for="email" class="mr-2">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
    </div>

    <div class="container mb-2">
        <label for="date" class="mr-2">Data Nascimento</label>
        <input type="date" name="date" id="date" value="{{ old('date') }}">
    </div>

    <div class="container mb-2">
        <label for="nif" class="mr-2">NIF</label>
        <input type="text" name="nif" id="nif" value="{{ old('nif') }}">
    </div>

    <div class="container mb-2">
        <label for="telefone" class="mr-2">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}">
    </div>

    <div class="container mb-2">
        <label for="endereco" class="mr-2">Endereço Morada</label>
        <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}">
    </div>

    <div class="container mb-2">
        <label for="quota_paga">Quota Paga</label>
            <select name="quota_paga" id="quota_paga" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('quota_paga', strval($user->quota_paga)) == 0 ? 'selected' : '' }} >Sim</option>
                <option value="1" {{ old('quota_paga', strval($user->quota_paga)) == 1 ? 'selected' : '' }} >Nao</option>
            </select>
    </div>

    <div class="container mb-2">
        <label for="ativo">Socio Ativo</label>
            <select name="ativo" id="ativo" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('ativo', strval($user->ativo)) == 0 ? 'selected' : '' }} >Sim</option>
                <option value="1" {{ old('ativo', strval($user->ativo)) == 1 ? 'selected' : '' }} >Nao</option>
            </select>
    </div>

    <div class="container mb-2">
        <label for="direcao">Direçao</label>
            <select name="direcao" id="direcao" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('direcao', strval($user->direcao)) == 0 ? 'selected' : '' }} >Sim</option>
                <option value="1" {{ old('direcao', strval($user->direcao)) == 1 ? 'selected' : '' }} >Nao</option>
            </select>
    </div>

    <div class="container mb-4">
        <label for="tipo_socio">Tipo Sócio</label>
            <select name="tipo_socio" id="tipo_socio" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('tipo_socio', strval($user->tipo_socio)) == 0 ? 'selected' : '' }} >Piloto</option>
                <option value="1" {{ old('tipo_socio', strval($user->tipo_socio)) == 1 ? 'selected' : '' }} >Nao piloto</option>
                <option value="2" {{ old('tipo_socio', strval($user->tipo_socio)) == 2 ? 'selected' : '' }} >Aeromodelista</option>
            </select>
    </div>


    <div class="container mb-4">
        <button type="submit" class="btn btn-success" name="ok">Adicionar</button>
        <a type="submit" class="btn btn-default" href="{{route('socios.index')}}">Cancelar</a>
    </div>

</form>
</div>

@endcan
@endsection


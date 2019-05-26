@extends('layouts.app')

@section('title', 'Editar Sócio')
@section('content')

<div class="container ml-4 mb-3">
    <h3> Editar sócio </h3>
</div>

@can('view', $user)

<div class="container row ml-4">
<form method="GET" action="/socios/{{$user->user}}/edit">
    @method('PUT')
    @csrf

    <div class="col-md-12 mb-4">
        <img src="{{ $user->foto_url == null ? asset('storage/fotos/noimage.jpg') : asset('storage/fotos/' . $user->foto_url)}}" class="img-thumbnail"/>
        <br/><br/>
        <input type="file" name="foto_url" class="form-control" placeholder="{{ $user->foto_url}}">  
    </div> 

    <div class=" col-md-12 mb-2">
        <label for="num_socio" class="mr-2">Numero Socio</label>
        <input type="text" name="num_socio" id="num_socio" size="4" placeholder="{{ $user->num_socio}}">
    </div>

    <div class="col-md-12 mb-2">
        <label for="name" class="mr-2">Nome Completo</label>
        <input type="text" name="name" id="name" size="40" placeholder="{{ $user->name}}">
    </div>

    <div class="col-md-12 mb-2">
        <label for="nome_informal" class="mr-2">Nome Informal</label>
        <input type="text" name="nome_informal" id="nome_informal" placeholder="{{ $user->nome_informal}}">
    </div>

    <div class="col-md-12 mb-2">
        <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('sexo', strval($user->sexo)) == 0 ? 'selected' : '' }} >Masculino</option>
                <option value="1" {{ old('sexo', strval($user->sexo)) == 1 ? 'selected' : '' }} >Feminino</option>
            </select>
    </div>

    <div class="col-md-12 mb-2">
        <label for="date" class="mr-2">Data Nascimento</label>
        <input type="date" name="date" id="date" placeholder="{{ $user->dataNascimento}}">
    </div>

    <div class="col-md-12 mb-2">
        <label for="email" class="mr-2">Email</label>
        <input type="email" name="email" id="email" placeholder="{{ $user->email}}">
    </div>

    <div class="col-md-12 mb-2">
        <label for="nif" class="mr-2">NIF</label>
        <input type="text" name="nif" id="nif" size="10" placeholder="{{ $user->nif}}">
    </div>

    <div class="col-md-12 mb-2">
        <label for="telefone" class="mr-2">Telefone</label>
        <input type="text" name="telefone" id="telefone" size="10"  placeholder="{{ $user->telefone}}">
    </div>

    <div class="col-md-12 mb-2">
        <label for="endereco" class="mr-2">Endereço Morada</label>
        <input type="text" name="endereco" id="endereco" size="40"  placeholder="{{ $user->endereco}}">
    </div>

    <div class="col-md-12 mb-2">
        <label for="quota_paga">Quota Paga</label>
            <select name="quota_paga" id="quota_paga" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('quota_paga', strval($user->quota_paga)) == 0 ? 'selected' : '' }} >Sim</option>
                <option value="1" {{ old('quota_paga', strval($user->quota_paga)) == 1 ? 'selected' : '' }} >Nao</option>
            </select>
    </div>

    <div class="col-md-12 mb-2">
        <label for="ativo">Socio Ativo</label>
            <select name="ativo" id="ativo" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('ativo', strval($user->ativo)) == 0 ? 'selected' : '' }} >Sim</option>
                <option value="1" {{ old('ativo', strval($user->ativo)) == 1 ? 'selected' : '' }} >Nao</option>
            </select>
    </div>

    <div class="col-md-12 mb-2">
        <label for="direcao">Direçao</label>
            <select name="direcao" id="direcao" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('direcao', strval($user->direcao)) == 0 ? 'selected' : '' }} >Sim</option>
                <option value="1" {{ old('direcao', strval($user->direcao)) == 1 ? 'selected' : '' }} >Nao</option>
            </select>
    </div>

    <div class="col-md-12 mb-4">
        <label for="tipo_socio">Tipo Sócio</label>
            <select name="tipo_socio" id="tipo_socio" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('tipo_socio', strval($user->tipo_socio)) == 0 ? 'selected' : '' }} >Piloto</option>
                <option value="1" {{ old('tipo_socio', strval($user->tipo_socio)) == 1 ? 'selected' : '' }} >Nao piloto</option>
                <option value="2" {{ old('tipo_socio', strval($user->tipo_socio)) == 2 ? 'selected' : '' }} >Aeromodelista</option>
            </select>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Guardar</button>
        <a type="submit" class="btn btn-default" name="cancel" href="{{route('socios.index')}}">Cancelar</a>
    </div>
</form>
</div>



@endcan
@endsection

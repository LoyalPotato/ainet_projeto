@extends('layouts.app')

@section('title', 'Adicionar Sócio')
@section('content')

<div class="container mb-4">
    <h2> Adicionar Sócio  </h2>
</div>



<script>
    function yesnoCheck(that) {
        if (that.value == "P") {
            alert("Campos de piloto adicionados!!");
            document.getElementById("create_piloto_forms").style.display = "block";
        } else {
            document.getElementById("create_piloto_forms").style.display = "none";
        }
    }   
</script>




@include('layouts.errors')
@can('view', $user)

<div class="container">
<form method="POST" action="/socios" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12 mb-4">
        <img src="{{ $user->foto_url == null ? asset('storage/fotos/noimage.jpg') : asset('storage/fotos/' . $user->foto_url)}}" class="img-thumbnail"/>
        <br/><br/>
        <input type="file" name="file_foto" class="form-control" required>
    </div> 

    <div class="container mb-2">
        <label for="num_socio" class="mr-2">Numero Socio</label>
        <input type="text" name="num_socio" id="num_socio" value="{{ old('num_socio') }}" required>
    </div>

    <div class="container mb-2">
        <label for="name" class="mr-2">Nome Completo</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <div class="container mb-2">
        <label for="nome_informal" class="mr-2">Nome Informal</label>
        <input type="text" name="nome_informal" id="nome_informal" value="{{ old('nome_informal') }}" required>
    </div>

    <div class="container mb-2">
        <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="M" {{ old('sexo', strval($user->sexo)) == "M" ? 'selected' : '' }} >Masculino</option>
                <option value="F" {{ old('sexo', strval($user->sexo)) == "F" ? 'selected' : '' }} >Feminino</option>
            </select>
    </div>

    <div class="container mb-2">
        <label for="email" class="mr-2">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <div class="container mb-2">
        <label for="data_nascimento" class="mr-2">Data Nascimento</label>
        <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}" required>
    </div>

    <div class="container mb-2">
        <label for="nif" class="mr-2">NIF</label>
        <input type="number" name="nif" id="nif" value="{{ old('nif') }}" required>
    </div>

    <div class="container mb-2">
        <label for="telefone" class="mr-2">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" required>
    </div>

    <div class="container mb-2">
        <label for="endereco" class="mr-2">Endereço Morada</label>
        <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}" required>
    </div>

    <div class="container mb-2">
        <label for="quota_paga">Quota Paga</label>
            <select name="quota_paga" id="quota_paga" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('quota_paga', strval($user->quota_paga)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('quota_paga', strval($user->quota_paga)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
    </div>

    <div class="container mb-2">
        <label for="ativo">Socio Ativo</label>
            <select name="ativo" id="ativo" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('ativo', strval($user->ativo)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('ativo', strval($user->ativo)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
    </div>

    <div class="container mb-2">
        <label for="direcao">Direçao</label>
            <select name="direcao" id="direcao" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('direcao', strval($user->direcao)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('direcao', strval($user->direcao)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
    </div>

    <div class="container mb-4">
        <label for="tipo_socio">Tipo Sócio</label>
            <select name="tipo_socio" onchange="yesnoCheck(this);" id="tipo_socio" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="P" {{ old('tipo_socio', strval($user->tipo_socio)) == "P" ? 'selected' : '' }} >Piloto</option>
                <option value="NP" {{ old('tipo_socio', strval($user->tipo_socio)) == "NP" ? 'selected' : '' }} >Nao piloto</option>
                <option value="A" {{ old('tipo_socio', strval($user->tipo_socio)) == "A" ? 'selected' : '' }} >Aeromodelista</option>
            </select>
    </div>

    <div id="create_piloto_forms" style="display: none;">
        @include('socios.pilotos.create_piloto')
    </div>
    
    <div class="container mb-2">
        <button type="submit" class="btn btn-success">Adicionar</button>
        <a type="submit" class="btn btn-default" href="{{route('socios.index')}}">Cancelar</a>
    <a type="submit" class="btn btn-primary float-right" href="route{{'verification.resend'}}">Reenviar confirmação email</a>
    {{-- TEST: --}}
    </div>


</form>
</div>

@endcan
@endsection


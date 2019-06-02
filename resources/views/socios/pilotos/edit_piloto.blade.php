<div class="col-md-12 mb-2">
        <label for="aluno">Aluno</label>
            <select name="aluno" id="aluno" class="form-control" value="{{ $user->aluno}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('aluno', strval($user->aluno)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('aluno', strval($user->aluno)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
</div>

<div class="col-md-12 mb-4">
        <label for="instrutor">Instrutor</label>
            <select name="instrutor" id="instrutor" class="form-control" value="{{ $user->instrutor}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('instrutor', strval($user->instrutor)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('instrutor', strval($user->instrutor)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
</div>


<div class="container md-8 mb-2">
    <label for="num_licenca" class="mr-2">Numero Licença</label>
    <input type="number" name="num_licenca" id="num_licenca" value="{{ $user->num_licenca}}">
</div>

<div class="container mb-4">
        <label for="tipo_licenca">Tipo Licença</label>
            <select name="tipo_licenca" id="tipo_licenca" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="CPL(A)" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "CPL(A)" ? 'selected' : '' }} >CPL(A)</option>
                <option value="ATPL" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "ATPL" ? 'selected' : '' }} >ATPL</option>
                <option value="ALUNO-PPL(A)" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "ALUNO-PPL(A)" ? 'selected' : '' }} >ALUNO-PPL(A)</option>
                <option value="ALUNO-PU" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "ALUNO-PU" ? 'selected' : '' }} >ALUNO-PU</option>
                <option value="PPL(A)" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "PPL(A)" ? 'selected' : '' }} >PPL(A)</option>
                <option value="PU" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "PU" ? 'selected' : '' }} >PU</option>
            </select>
    </div>


<div class="container mb-4">
<label for="file_licenca" class="mr-2">Licença piloto</label>
    @can('viewCertLice', auth()->user())
    <a class="navbar-brand" href="{{ route('piloto_lic', $user->id) }}">
            Ver licença atual
        </a>
    <input type="file" name="file_licenca" id="file_licenca" class="form-control" value="{{ $user->file_licenca }}">
    @endcan
    <?php
        $user->licenca_confirmada = 0;
    ?>
</div>     


<div class="container mb-2">
    <label for="validade_licenca" class="mr-2">Validade Licença</label>
    <input type="date" name="validade_licenca" id="validade_licenca" value="{{ $user->validade_licenca}}">
</div>

<div class="container mb-4">
        <label for="licenca_confirmada">Licença Confirmada</label>
            <select name="licenca_confirmada" id="licenca_confirmada" class="form-control" value="{{ $user->licenca_confirmada}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('licenca_confirmada', strval($user->licenca_confirmada)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('licenca_confirmada', strval($user->licenca_confirmada)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
</div>



<div class="container md-8 mb-2">
    <label for="num_certificado" class="mr-2">Numero Certificado</label>
    <input type="text" name="num_certificado" id="num_certificado" value="{{ $user->num_certificado}}">
</div>

<div class="container mb-4">
        <label for="classe_certificado">Classe Certificado</label>
            <select name="classe_certificado" id="classe_certificado" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="Class 1" {{ old('classe_certificado', strval($user->classe_certificado)) == "Class 1" ? 'selected' : '' }} >Class 1</option>
                <option value="Class 2" {{ old('classe_certificado', strval($user->classe_certificado)) == "Class 2" ? 'selected' : '' }} >Class 2</option>
                <option value="LAPL" {{ old('classe_certificado', strval($user->classe_certificado)) == "LAPL" ? 'selected' : '' }} >LAPL</option>
            </select>
</div>

<div class="container mb-4">
<label for="file_certificado" class="mr-2">Certificado piloto</label>
    @can('viewCertLice', auth()->user())
    <a class="navbar-brand" href="{{ route('piloto_cert', $user->id) }}">
        Ver certificado atual
    </a>
    <input type="file" name="file_certificado" id="file_certificado" class="form-control" value="{{ $user->file_certificado}}">
    @endcan
    <?php
        $user->certificado_confirmado = 0;
    ?>
</div> 

<div class="container mb-2">
    <label for="validade_certificado" class="mr-2">Validade Certificado</label>
    <input type="date" name="validade_certificado" id="validade_certificado" value="{{ $user->validade_certificado}}">
</div>

<div class="col-md-12 mb-2">
        <label for="certificado_confirmado">Certificado Confirmado</label>
            <select name="certificado_confirmado" id="certificado_confirmado" class="form-control" value="{{ $user->certificado_confirmado}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('certificado_confirmado', strval($user->certificado_confirmado)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('certificado_confirmado', strval($user->certificado_confirmado)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
</div>



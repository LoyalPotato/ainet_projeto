<div class="container mb-2">
        <label for="aluno">Aluno</label>
            <select name="aluno" id="aluno" class="form-control" value="{{ old('aluno') }}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('aluno', strval($user->aluno)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('aluno', strval($user->aluno)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
</div>

<div class="container mb-4">
        <label for="instrutor">Instrutor</label>
            <select name="instrutor" id="instrutor" class="form-control" value="{{ old('instrutor') }}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('instrutor', strval($user->instrutor)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('instrutor', strval($user->instrutor)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
</div>


<div class="container mb-2">
    <label for="numero_licenca" class="mr-2">Numero Licença</label>
    <input type="number" name="numero_licenca" id="numero_licenca" value="{{ old('numero_licenca') }}">
</div>

<div class="container mb-4">
        <label for="tipo_licenca">Tipo Licença</label>
            <select name="tipo_licenca" id="tipo_licenca" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "CPL(A)" ? 'selected' : '' }} >CPL(A)</option>
                <option value="1" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "ATPL" ? 'selected' : '' }} >ATPL</option>
                <option value="2" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "ALUNO-PPL(A)" ? 'selected' : '' }} >ALUNO-PPL(A)</option>
                <option value="3" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "ALUNO-PU" ? 'selected' : '' }} >ALUNO-PU</option>
                <option value="4" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "PPL(A)" ? 'selected' : '' }} >PPL(A)</option>
                <option value="5" {{ old('tipo_licenca', strval($user->tipo_licenca)) == "PU" ? 'selected' : '' }} >PU</option>
            </select>
</div>

<div class="container mb-4">
<label for="file_licenca" class="mr-2">Licença piloto</label>
    <input type="file" name="file_licenca" id="file_licenca" value="{{ old('file_licenca') }}">
</div> 

<div class="container mb-2">
    <label for="validade_licenca" class="mr-2">Validade Licença</label>
    <input type="date" name="validade_licenca" id="validade_licenca" value="{{ old('validade_licenca') }}">
</div>

<div class="container mb-2">
        <label for="licenca_confirmada">Licença Confirmada</label>
            <select name="licenca_confirmada" id="licenca_confirmada" class="form-control" value="{{ old('licenca_confirmada') }}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('licenca_confirmada', strval($user->licenca_confirmada)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('licenca_confirmada', strval($user->licenca_confirmada)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
</div>


<div class="container md-8 mb-2">
    <label for="num_certificado" class="mr-2">Numero Certificado</label>
    <input type="text" name="num_certificado" id="num_certificado" value="{{ old('num_certificado') }}">
</div>

<div class="container mb-4">
        <label for="classe_certificado">Classe Certificado</label>
            <select name="classe_certificado" id="classe_certificado" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('classe_certificado', strval($user->classe_certificado)) == "Class 1" ? 'selected' : '' }} >Class 1</option>
                <option value="1" {{ old('classe_certificado', strval($user->classe_certificado)) == "Class 2" ? 'selected' : '' }} >Class 2</option>
                <option value="2" {{ old('classe_certificado', strval($user->classe_certificado)) == "LAPL" ? 'selected' : '' }} >LAPL</option>
            </select>
</div>

<div class="container mb-4">
<label for="file_certificado" class="mr-2">Certificado piloto</label>
    <input type="file" name="file_certificado" id="file_certificado" value="{{ old('file_certificado') }}">
</div> 

<div class="container mb-2">
    <label for="validade_certificado" class="mr-2">Validade Certificado</label>
    <input type="date" name="validade_certificado" id="validade_certificado" value="{{ old('validade_certificado') }}">
</div>

<div class="container mb-2">
        <label for="certificado_confirmado">Certificado Confirmado</label>
            <select name="certificado_confirmado" id="certificado_confirmado" class="form-control" value="{{ $user->certificado_confirmado}}">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('certificado_confirmado', strval($user->certificado_confirmado)) == 0 ? 'selected' : '' }} >Nao</option>
                <option value="1" {{ old('certificado_confirmado', strval($user->certificado_confirmado)) == 1 ? 'selected' : '' }} >Sim</option>
            </select>
</div>






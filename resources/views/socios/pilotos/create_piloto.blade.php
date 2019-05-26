@csrf
<div class="container mb-2">
    <label for="aluno">Aluno</label>
    <input type="radio" name="aluno"
        <?php if (isset($aluno) && $aluno=="Sim") echo "checked";?>
            value="Sim">Sim
    <input type="radio" name="aluno"
        <?php if (isset($aluno) && $aluno=="Nao") echo "checked";?>
            value="Nao">Nao
</div>

<div class="container mb-2">
    <label for="instrutor">Instrutor</label>
    <input type="radio" name="instrutor"
        <?php if (isset($instrutor) && $instrutor=="Sim") echo "checked";?>
            value="Sim">Sim
    <input type="radio" name="instrutor"
        <?php if (isset($instrutor) && $instrutor=="Nao") echo "checked";?>
            value="Nao">Nao
</div>

<div class="container md-8 mb-2">
    <label for="numero_licenca" class="mr-2">Numero Licença</label>
    <input type="text" name="numero_licenca" id="numero_licenca" value="{{ old('numero_licenca') }}">
</div>

<div class="container mb-2">
        <label for="tipo_licenca">Tipo Licença</label>
            <select name="tipo_licenca" id="tipo_licenca" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('tipo_licenca', strval($user->tipo_licenca)) == 0 ? 'selected' : '' }} >CPL(A)</option>
                <option value="1" {{ old('tipo_licenca', strval($user->tipo_licenca)) == 1 ? 'selected' : '' }} >ATPL</option>
                <option value="2" {{ old('tipo_licenca', strval($user->tipo_licenca)) == 2 ? 'selected' : '' }} >ALUNO-PPL(A)</option>
                <option value="3" {{ old('tipo_licenca', strval($user->tipo_licenca)) == 3 ? 'selected' : '' }} >PPL(A)</option>
                <option value="4" {{ old('tipo_licenca', strval($user->tipo_licenca)) == 4 ? 'selected' : '' }} >PU</option>
            </select>
    </div>

<div class="container mb-2">
    <label for="validade_licenca" class="mr-2">Validade Licença</label>
    <input type="date" name="validade_licenca" id="validade_licenca" value="{{ old('validade_licenca') }}">
</div>

<div class="container mb-2">
    <label for="licenca_confirmada">Licença Confirmada</label>
    <input type="radio" name="licenca_confirmada"
        <?php if (isset($licenca_confirmada) && $licenca_confirmada=="Sim") echo "checked";?>
            value="Sim">Sim
    <input type="radio" name="licenca_confirmada"
        <?php if (isset($licenca_confirmada) && $licenca_confirmada=="Nao") echo "checked";?>
            value="Nao">Nao
</div>

<div class="container md-8 mb-2">
    <label for="num_certificado" class="mr-2">Numero Certificado</label>
    <input type="text" name="num_certificado" id="num_certificado" value="{{ old('num_certificado') }}">
</div>

<div class="container mb-2">
    <label for="validade_certificado" class="mr-2">Validade Certificado</label>
    <input type="date" name="validade_certificado" id="validade_certificado" value="{{ old('validade_certificado') }}">
</div>

<div class="container mb-2">
    <label for="certificado_confirmado">Certificado Confirmado</label>
    <input type="radio" name="certificado_confirmado"
        <?php if (isset($certificado_confirmado) && $certificado_confirmado=="Sim") echo "checked";?>
            value="Sim">Sim
    <input type="radio" name="certificado_confirmado"
        <?php if (isset($certificado_confirmado) && $certificado_confirmado=="Nao") echo "checked";?>
            value="Nao">Nao
</div>






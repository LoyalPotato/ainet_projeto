{{csrf_field()}}
<div class="form-group">
    <label for="inputNumeroSocio">Nº Sócio</label>
    <input type="text" class="form-control" name="numeroSocio" id="inputNumeroSocio" placeholder="numeroSocio"
        value="{{old('NumeroSocio', $user->numeroSocio)}}" />
</div>
<div class="form-group">
    <label for="inputNomeInFormal">Nome Informal</label>
    <input type="text" class="form-control" name="nomeInformal" id="inputNomeInFormal" placeholder="nomeInformal"
        value="{{old('nomeInformal', $user->nomeInformal)}}" />
</div>
<div class="form-group">
    <label for="inputNomeCompleto">Nome Completo</label>
    <input type="text" class="form-control" name="nomeCompleto" id="inputNomeCompleto" placeholder="nomeCompleto"
        value="{{old('nomeCompleto', $user->nomeCompleto)}}" />
</div>
<div class="form-group">
    <label for="inputSexo">Sexo</label>
    <select name="sexo" id="inputSexo" class="form-control">
        <option disabled selected> -- Seleciona uma opcao -- </option>
        <option <?= is_selected(old('sexo', $user->sexo), '0') ?> value="0">Masculino</option>
        <option <?= is_selected(old('sexo', $user->sexo), '1') ?> value="1">Feminino</option>
    </select>
</div>
<div class="form-group">
    <label for="inputDataNascimento">Data Nascimento</label>
    <input type="text" class="form-control" name="dataNascimento" id="inputDataNascimento" placeholder="dataNascimento"
        value="{{old('dataNascimento', $user->dataNascimento)}}" />
</div>
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email address"
        value="{{old('email', $user->email)}}" />
</div>
<div class="form-group">
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="inputFoto">Foto:</label>
        <input type="file" name="foto" id="foto" />
        <br />
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>
<div class="form-group">
    <label for="inputNIF">NIF</label>
    <input type="text" class="form-control" name="nif" id="inputNIF" placeholder="nif"
        value="{{old('nif', $user->nif)}}" />
</div>
<div class="form-group">
    <label for="inputTelefone">Telefone</label>
    <input type="text" class="form-control" name="telefone" id="inputTelefone" placeholder="telefone"
        value="{{old('telefone', $user->telefone)}}" />
</div>
<div class="form-group">
    <label for="inputEndereco">Endereco</label>
    <input type="text" class="form-control" name="endereco" id="inputEndereco" placeholder="endereco"
        value="{{old('endereco', $user->endereco)}}" />
</div>
<!-- TODO: blade directive to select -->
<div class="form-group">
    <label for="inputTipoSocio">Tipo Socio</label>
    <select name="tipoSocio" id="inputTipoSocio" class="form-control">
        <option disabled selected> -- Seleciona uma opcao -- </option>
        <option <?= is_selected(old('tipoSocio', $user->tipoSocio), '0') ?> value="0">Piloto</option>
        <option <?= is_selected(old('tipoSocio', $user->tipoSocio), '1') ?> value="1">Nao Piloto</option>
        <option <?= is_selected(old('tipoSocio', $user->tipoSocio), '2') ?> value="2">Aeromodelista</option>
    </select>
</div>
<form action="" method="post">
    <input type="radio" name="sexo" value="sexo">Sim
    <input type="radio" name="sexo" value="sexo">Nao
    <input type="submit" name="submit" value="Recebe opcao escolhida" />
</form>
<?php
  if (isset($_POST['submit'])) {
    if(isset($_POST['radio'])){
      echo "You have selected :".$_POST['radio'];  //  Displaying Selected Value
        }
    }
?>
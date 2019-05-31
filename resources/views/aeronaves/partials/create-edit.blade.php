{{-- NOTE: Find better way to do this --}}
<div class="container">
    <label for="marca" class="mr-2">Marca: </label>
    <input type="text" name="marca" id="marca"
        value="<?php if(isset($aeronave)) :?> {{$aeronave->marca}} <?php else : ?> {{old('marca')}} <?php endif; ?>"
        required>
</div>
<div class="container">
    <label for="modelo" class="mr-2">Modelo: </label>
    <input type="text" name="modelo" id="modelo" value="<?php if(isset($aeronave)) :?> {{$aeronave->modelo}} <?php else : ?> {{old('modelo')}} <?php endif; ?>" required>
</div>

<div class="container">
    <label for="num_lugares" class="mr-2">Numero de Lugares: </label>
    <input type="text" name="num_lugares" id="num_lugares" value="<?php if(isset($aeronave)) :?> {{$aeronave->num_lugares}} <?php else : ?> {{old('num_lugares')}} <?php endif; ?>"
        required>
</div>

<div class="container">
    <label for="conta_horas" class="mr-2">Conta-Horas: </label>
    <input type="text" name="conta_horas" id="conta_horas" value="<?php if(isset($aeronave)) :?> {{$aeronave->conta_horas}} <?php else : ?> {{old('conta_horas')}} <?php endif; ?>"
        required>
</div>

<div class="container">
    <label for="preco_hora" class="mr-2">Preco-Hora: </label>
    <input type="text" name="preco_hora" id="preco_hora" value="<?php if(isset($aeronave)) :?> {{$aeronave->preco_hora}} <?php else : ?> {{old('preco_hora')}} <?php endif; ?>" required>
</div>
{{--     
    <div class="container">
        <label for="modelo" class="mr-2">Modelo: </label>
        <input type="text" name="modelo" id="modelo" value="{{old( $aeronave->modelo,'modelo')}}" required>
</div>

<div class="container">
    <label for="num_lugares" class="mr-2">Numero de Lugares: </label>
    <input type="text" name="num_lugares" id="num_lugares" value="{{old($aeronave->num_lugares,'num_lugares')}}"
        required>
</div>

<div class="container">
    <label for="conta_horas" class="mr-2">Conta-Horas: </label>
    <input type="text" name="conta_horas" id="conta_horas" value="{{ old($aeronave->conta_horas, 'conta_horas')}}"
        required>
</div>

<div class="container">
    <label for="preco_hora" class="mr-2">Preco-Hora: </label>
    <input type="text" name="preco_hora" id="preco_hora" value="{{old($aeronave->preco_hora, 'preco_hora')}}" required>
</div>
--}}
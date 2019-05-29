    {{-- TODO: Fix condition
        BUG: Estava so a enviar a marca --}}
    <div class="container">
        <label for="marca" class="mr-2">Marca: </label>
    <input type="text" name="marca" id="marca" value="{{old('marca', $aeronave->marca)}}" required>
    </div>
    <div class="container">
        <label for="modelo" class="mr-2">Modelo: </label>
        <input type="text" name="modelo" id="modelo" value="{{old('marca', $aeronave->modelo)}}" required>
    </div>
    
    <div class="container">
        <label for="num_lugares" class="mr-2">Numero de Lugares: </label>
        <input type="text" name="num_lugares" id="num_lugares" value="{{old('num_lugares', $aeronave->num_lugares)}}" required>
    </div>
    
    <div class="container">
        <label for="conta_horas" class="mr-2">Conta-Horas: </label>
        <input type="text" name="conta_horas" id="conta_horas" value="{{ old('conta_horas', $aeronave->conta_horas)}}" required>
    </div>
    
    <div class="container">
        <label for="preco_hora" class="mr-2">Preco-Hora: </label>
        <input type="text" name="preco_hora" id="preco_hora" value="{{old('preco_hora', $aeronave->preco_hora)}}" required>
    </div>
    
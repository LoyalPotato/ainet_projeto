@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.errors')

    <form method="POST" action="/movimentos/{{$movimento->id}}">
        @method('PUT')
        @csrf
        <div class="container">
            <label for="data" class="mr-2">Data do voo</label>
            <input name="data" id="data" type="date" value="{{date(("Y-m-d"), strtotime($movimento->data))}}">
            
        </div>
        <div class="container">
            <label for="hora descolagem" class="mr-2">Hora descolagem</label>
            <input type="time" name="hora_descolagem" id="hora_descolagem" value="{{date("h:i", strtotime($movimento->hora_descolagem))}}">
        </div>
        <div class="container">
            <label for="hora_aterragem" class="mr-2">Hora aterragem</label>
            <input type="time" name="hora_aterragem" id="hora_aterragem" value="{{date("h:i", strtotime($movimento->hora_aterragem))}}">
        </div>
        <div class="container">
            <label for="aeronave" class="mr-2">Aeronave</label>      
            <select id="aeronave" name="aeronave" class="form-control" style="width:150px;">
                <option value="{{$movimento->aeronave}}">{{$movimento->aeronave}}</option>
                @foreach ($aeronaves as $aeronave)                
                                    <option value="{{$aeronave->matricula}}">{{$aeronave->matricula}}</option>               
                @endforeach                    
            </select>
        </div>
       
        <div class="container">
            <label for="marca" class="mr-2">Número de diário</label>
            <input type="number" min="0" step="1" name="num_diario" id="num_diario" value={{$movimento->num_diario}}>
        </div>
        <div class="container">
            <label for="marca" class="mr-2">Número de serviço</label>
            <input type="number" min="0" step="1" name="num_servico" id="num_servico" value={{$movimento->num_servico}}>
        </div>
        
        <div class="container">
            <label for="marca" class="mr-2">Piloto</label>
            <input type="text" name="piloto_id" id="piloto_id" value={{$movimento->piloto_id}}>
        </div>
        <div class="form-group">
            <label for="inputNatureza">Natureza</label>
            <select name="natureza" id="natureza" class="form-control" style="width:150px;">
                <option value="I" {{ old('user_type', strval($movimento->natureza)) == 'I' ? 'selected' : '' }} >Instrução</option>
                <option value="T" {{ old('user_type', strval($movimento->natureza)) == 'T' ? 'selected' : '' }} >Treino</option>
                <option value="E" {{ old('user_type', strval($movimento->natureza)) == 'E' ? 'selected' : '' }} >Especial</option>
            </select>
        </div>
        <div class="container">
            <label for="aerodromo_partida" class="mr-2">Aeródromo de partida</label>
            <select name="aerodromo_partida" id="aerodromo_partida" class="form-control" > 

                                <option value="{{$movimento->aerodromo_partida}}">Codigo:{{$movimento->aerodromo_partida}}              Nome:{{$movimento->aerodromoPartida->nome}}</option> 
                                            @foreach ($aerodromos as  $aerodromo)                
                                    <option value="{{$aerodromo->code}}">Codigo Aerodromo:{{$aerodromo->code}}              Nome Aerodromo:{{$aerodromo->nome}}</option>               
                                            @endforeach 
                                            
                                            
                                        </select>
            
        </div>
         <div class="container">
            <label for="aerodromo_chegada" class="mr-2">Aeródromo de chegada</label>
            <select name="aerodromo_chegada" id="aerodromo_chegada" class="form-control" > 

                                <option value="{{$movimento->aerodromo_chegada}}">Codigo:{{$movimento->aerodromo_chegada}}              Nome:{{$movimento->aerodromoChegada->nome}}</option> 
                                            @foreach ($aerodromos as  $aerodromo)                
                                    <option value="{{$aerodromo->code}}">Codigo Aerodromo:{{$aerodromo->code}}              Nome Aerodromo:{{$aerodromo->nome}}</option>               
                                            @endforeach 
                                            
                                            
                                        </select>
            
            
        </div>
        <div class="container">
            <label for="num_aterragens" class="mr-2">Número de Aterragens</label>
            <input type="number" min="0" step="1" name="num_aterragens" id="num_aterragens" value={{$movimento->num_aterragens}}>
        </div>
        <div class="container">
            <label for="num_descolagens" class="mr-2">Número de Descolagens</label>
            <input type="number" min="0" step="1" name="num_descolagens" id="num_descolagens" value={{$movimento->num_descolagens}}>
        </div>
        <div class="container">
            <label for="num_pessoas" class="mr-2">Número de pessoas</label>
            <input type="number" min="0" step="1" name="num_pessoas" id="num_pessoas" value={{$movimento->num_pessoas}}>
        </div>
        <div class="container">
            <label for="conta_horas_inicio" class="mr-2">Conta horas inicial</label>
            <input type="number" min="0" step="1" name="conta_horas_inicio" id="conta_horas_inicio" value={{$movimento->conta_horas_inicio}}>
        </div>
        <div class="container">
            <label for="conta_horas_fim" class="mr-2">Conta horas final</label>
            <input type="number" min="0" step="1" name="conta_horas_fim" id="conta_horas_fim" value={{$movimento->conta_horas_fim}}>
        </div>
        
        <div class="form-group">
            <label for="modo_pagamento" class="mr-2">Modo de pagamento</label>      
            <select name="modo_pagamento" id="modo_pagamento" class="form-control" style="width:150px;">
                                            
                                            <option value="N" {{ old('user_type', strval($movimento->modo_pagamento)) == 'N' ? 'selected' : '' }}>Numerário</option>
                                            <option value="M" {{ old('user_type', strval($movimento->modo_pagamento)) == 'M' ? 'selected' : '' }}>Multibanco</option>
                                            <option value="T" {{ old('user_type', strval($movimento->modo_pagamento)) == 'N' ? 'selected' : '' }}>Transferência</option>
                                            <option value="P" {{ old('user_type', strval($movimento->modo_pagamento)) == 'N' ? 'selected' : '' }}>Pacote de horas</option>
                                        </select>
        </div>

        
        <div class="container">
            <label for="num_recibo" class="mr-2">Numero de recibo</label>
            <input type="number" min="0" step="1" name="num_recibo" id="num_recibo" value={{$movimento->num_recibo}}>
        </div>
        <div class="container">
            <label for="observacoes" class="mr-2">Observações</label>
            <input type="text" name="observacoes" id="observacoes" value={{$movimento->observacoes}}>
        </div>        
        
        
        <div class="form-group">
            <label for="inputtipo_instrucao">Tipo de Instrução</label>
            <select name="tipo_instrucao" id="tipo_instrucao" class="form-control" style="width:150px;">
                <option value="D" {{ old('user_type', strval($movimento->tipo_instrucao)) == 'D' ? 'selected' : '' }} >Duplo Comando</option>
                <option value="S" {{ old('user_type', strval($movimento->tipo_instrucao)) == 'S' ? 'selected' : '' }} >Solo</option>
                <option value="">Nao definido</option>
            </select>
        </div>
        <div class="container">
            <label for="instrutor_id" class="mr-2">Id instrutor</label>
            <input type="number" min="0" step="1" name="instrutor_id" id="instrutor_id" value={{$movimento->instrutor_id}}>
        </div>
        
        @can('admin', App\Movimento::class)

            <div class="container">
            <label for="confirmado" class="mr-2">Confirmado</label>      
            <select id="confirmado" name="confirmado" class="form-control" style="width:150px;">

                <option value="0">Não</option>
                <option value="1">Sim</option>
                                 
            </select>
        </div>
                   
                @endcan   

                        @if(isset($movimento->tipo_conflito))

            <div class="container">
            <label for="tipo_conflito" class="mr-2">Tipo de Conflito</label>      
            <select name="tipo_conflito" id="tipo_conflito" class="form-control" style="width:150px; ">
                                            <option value="{{$movimento->tipo_conflito}}">{{$movimento->justificacao_conflito}}</option>
                                            <option value="S">Sobreposição</option>
                                            <option value="B">Buraco</option>
                                        </select>
        </div>

        <div class="container">
            <label for="justificacao_conflito" class="mr-2">Observações</label>
            <input type="justificacao_conflito" name="justificacao_conflito" id="justificacao_conflito" value={{$movimento->justificacao_conflito}}>
        </div>

         @endif 



        
        
        
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Guardar</button>
        <a type="submit" class="btn btn-default" name="cancel" href="{{route('movimentos.index')}}">Cancelar</a>
    </div>



    </form>

                </td> 
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.errors')
    <form method="POST" action="/movimentos">
        @csrf
        <div class="container">
            <label for="data" class="mr-2">Data do voo</label>
            <input name="data" id="data" type="date" value={{old('data do voo')}}>
            
        </div>
        <div class="container">
            <label for="hora_descolagem" class="mr-2">Hora descolagem</label>
            <input type="time" name="hora_descolagem" id="hora_descolagem" value={{$movimento->hora_aterragem}}>
        </div>
        <div class="container">
            <label for="hora_aterragem" class="mr-2">Hora aterragem</label>
            <input type="time" name="hora_aterragem" id="hora_aterragem" value={{$movimento->hora_aterragem}}>
        </div>
        <div class="container">
            <label for="aeronave" class="mr-2">Aeronave</label>      
            <select id="aeronave" name="aeronave" class="form-control form-control-sm" >
                <option value=""></option>
                @foreach ($aeronaves as $aeronave)                
                                    <option value="{{$aeronave->matricula}}">{{$aeronave->matricula}}</option>               
                @endforeach                    
            </select>
        </div>
        
        <div class="container">
            <label for="num_diario" class="mr-2">Número de diário</label>
            <input type="number" min="0" step="1" name="num_diario" id="num_diario" value={{$movimento->num_diario}}>
        </div>
        <div class="container">
            <label for="num_servico" class="mr-2">Número de serviço</label>
            <input type="number" min="0" step="1" name="num_servico" id="num_servico" value={{$movimento->num_servico}}>
        </div>
        
        <div class="container">
            <label for="piloto_id" class="mr-2">Piloto</label>
            <input type="text" name="piloto_id" id="piloto_id" value={{$movimento->piloto_id}}>
        </div>
        <div class="container">
            <label for="natureza" class="mr-2">Natureza do voo</label>      
            <select id="natureza" name="natureza" class="form-control">
                                            <option value="T">{{$movimento->natureza}}</option>
                                            <option value="T">Treino</option>
                
                                            <option value="I">Instrução</option>
                
                                            <option value="E">Especial</option>
                
                                        </select>
        </div>
        <div class="container">
            <label for="aerodromo_partida" class="mr-2">Aeródromo de partida</label>
            <select name="aerodromo_partida" id="aerodromo_partida" class="form-control" > 
                 <option value=""></option>
                                            @foreach ($aerodromos as  $aerodromo)                
                                    <option value="{{$aerodromo->code}}">Codigo Aerodromo:{{$aerodromo->code}}              Nome Aerodromo:{{$aerodromo->nome}}</option>               
                                            @endforeach 
                                            
                                            
                                        </select>
            
        </div>
         <div class="container">
            <label for="aerodromo_chegada" class="mr-2">Aeródromo de chegada</label>
            <select name="aerodromo_chegada" id="aerodromo_chegada" class="form-control" > 
                                                                    <option value=""></option> 

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
       
      
        <div class="container">
            <label for="modo_pagamento" class="mr-2">Modo de pagamento</label>      
            <select name="modo_pagamento" id="modo_pagamento" class="form-control" >
                                            <option value=""></option>
                                            <option value="N">Numerário</option>
                                            <option value="M">Multibanco</option>
                                            <option value="T">Transferência</option>
                                            <option value="P">Pacote de horas</option>
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
        <div class="container">
            <label for="tipo_instrucao" class="mr-2">Tipo de Instrução</label>      
            <select name="tipo_instrucao" id="tipo_instrucao" class="form-control" style="width:150px; ">
                                            <option value=""></option>
                                            <option value="D">Duplo Comando</option>
                                            <option value="S">Solo</option>
                                            <option value="">Nao definido</option>
                                        </select>
        </div>

        
        <div class="container">
            <label for="instrutor_id" class="mr-2">Id instrutor</label>
            <input type="text" name="instrutor_id" id="instrutor_id" value={{$movimento->instrutor_id}}>
        </div>
        


        @if(isset($movimento->tipo_conflito))

            <div class="container">
            <label for="tipo_conflito" class="mr-2">Tipo de Conflito</label>      
            <select name="tipo_conflito" id="tipo_conflito" class="form-control" style="width:150px; ">
                                            <option value=""></option>
                                            <option value="S">Sobreposição</option>
                                            <option value="B">Buraco</option>
                                        </select>
        </div>

        <div class="container">
            <label for="justificacao_conflito" class="mr-2">Justificação de conflito</label>
            <input type="justificacao_conflito" name="justificacao_conflito" id="justificacao_conflito" value={{$movimento->justificacao_conflito}}>
        </div>

         @endif 

        

        
        
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Guardar</button>
        <a type="submit" class="btn btn-default" name="cancel" href="{{route('movimentos.index')}}">Cancelar</a>
    </div>
        

    </form>
</div>
@endsection
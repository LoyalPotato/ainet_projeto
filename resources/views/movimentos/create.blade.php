@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.errors')

    can('view', $user)

    <form method="GET" action="/movimentos">
        @csrf
        <div class="container">
            <label for="data" class="mr-2">Data</label>
            <input type="date" name="data" id="data" value="{{ old('data') }}" required>
        </div>

        <div class="container">
            <label for="hora_descolagem" class="mr-2">Hora Descolagem</label>
            <input type="datetime-local" name="hora_descolagem" id="hora_descolagem" value="{{ old('hora_descolagem') }}" required>
        </div>

            <div class="container">
            <label for="hora_aterragem" class="mr-2">Hora Aterragem</label>
            <input type="datetime-local" name="hora_aterragem" id="hora_aterragem" value="{{ old('hora_aterragem') }}" required>
        </div>

        <div class="container">
        <label for="aeronave">Aeronave</label>
            <select name="aeronave" id="aeronave" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('aeronave', strval($movimento->aeronave)) == "CS-AQN" ? 'selected' : '' }} >CS-AQN</option>
                <option value="1" {{ old('aeronave', strval($movimento->aeronave)) == "CS-AYV" ? 'selected' : '' }} >CS-AYV</option>
                <option value="2" {{ old('aeronave', strval($movimento->aeronave)) == "CS-DCX" ? 'selected' : '' }} >CS-DCX</option>
                <option value="3" {{ old('aeronave', strval($movimento->aeronave)) == "D-EAYV" ? 'selected' : '' }} >D-EAYV</option>
                <option value="4" {{ old('aeronave', strval($movimento->aeronave)) == "G-CKIP" ? 'selected' : '' }} >G-CKIP</option>
            </select>
        </div>

        <div class="container">
            <label for="num_diario" class="mr-2">Nº Diário</label>
            <input type="number" name="num_diario" id="num_diario" value="{{ old('num_diario') }}" required>
        </div>

        <div class="container">
            <label for="num_servico" class="mr-2">Nº Serviço</label>
            <input type="number" name="num_servico" id="num_servico" value="{{ old('num_servico') }}" required>
        </div>
        
        <div class="container">
            <label for="piloto" class="mr-2">Piloto ID</label>
            <input type="number" name="piloto" id="piloto" value="{{ old('piloto') }}" required>
        </div>

        <div class="container">
        <label for="natureza">Natureza</label>
            <select name="natureza" id="natureza" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('natureza', strval($movimento->natureza)) == "T" ? 'selected' : '' }} >T</option>
                <option value="1" {{ old('natureza', strval($movimento->natureza)) == "I" ? 'selected' : '' }} >I</option>
                <option value="2" {{ old('natureza', strval($movimento->natureza)) == "E" ? 'selected' : '' }} >E</option>
            </select>
        </div>

        @include('movimentos.aerodromos.aerodromos')

        <div class="container">
            <label for="num_aterragens" class="mr-2">Nº Aterragens</label>
            <input type="number" name="num_aterragens" id="num_aterragens" value="{{ old('num_aterragens') }}" required>
        </div>
        
        <div class="container">
            <label for="num_descolagens" class="mr-2">Nº Descolagens</label>
            <input type="number" name="num_descolagens" id="num_descolagens" value="{{ old('num_descolagens') }}" required>
        </div>

        <div class="container">
            <label for="num_pessoas" class="mr-2">Nº Pessoas</label>
            <input type="number" name="num_pessoas" id="num_pessoas" value="{{ old('num_pessoas') }}" required>
        </div>

        <div class="container">
            <label for="conta_horas_inicio" class="mr-2">Conta-horas Inicio</label>
            <input type="number" name="conta_horas_inicio" id="conta_horas_inicio" value="{{ old('conta_horas_inicio') }}" required>
        </div>

        <div class="container">
            <label for="conta_horas_fim" class="mr-2">Conta-horas Fim</label>
            <input type="number" name="conta_horas_fim" id="conta_horas_fim" value="{{ old('conta_horas_fim') }}" required>
        </div>

        <div class="container">
            <label for="tempo_voo" class="mr-2">Tempo Voo</label>
            <input type="number" name="tempo_voo" id="tempo_voo" value="{{ old('tempo_voo') }}" required>
        </div>

        <div class="container">
            <label for="preco_voo" class="mr-2">Preço Voo</label>
            <input type="number" name="preco_voo" id="preco_voo" value="{{ old('preco_voo') }}" required>
        </div>

        <div class="container">
        <label for="modo_pagamento">Modo Pagamento</label>
            <select name="modo_pagamento" id="modo_pagamento" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('modo_pagamento', strval($movimento->modo_pagamento)) == "N" ? 'selected' : '' }} >N</option>
                <option value="1" {{ old('modo_pagamento', strval($movimento->modo_pagamento)) == "M" ? 'selected' : '' }} >M</option>
                <option value="2" {{ old('modo_pagamento', strval($movimento->modo_pagamento)) == "T" ? 'selected' : '' }} >T</option>
                <option value="3" {{ old('modo_pagamento', strval($movimento->modo_pagamento)) == "P" ? 'selected' : '' }} >P</option>
            </select>
        </div>

        <div class="container">
            <label for="num_recibo" class="mr-2">Nº Recibo</label>
            <input type="number" name="num_recibo" id="num_recibo" value="{{ old('num_recibo') }}" required>
        </div>

        <div class="container">
            <label for="observacoes" class="mr-2">Observações</label>
            <input type="text" name="observacoes" id="observacoes" value="{{ old('observacoes') }}" required>
        </div>

        <div class="container">
        <label for="tipo_instrucao">Tipo Instrucao</label>
            <select name="tipo_instrucao" id="tipo_instrucao" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('tipo_instrucao', strval($movimento->tipo_instrucao)) == "D" ? 'selected' : '' }} >D</option>
                <option value="1" {{ old('tipo_instrucao', strval($movimento->tipo_instrucao)) == "S" ? 'selected' : '' }} >S</option>
            </select>
        </div>

        <div class="container">
            <label for="instrutor_id" class="mr-2">Instrutor ID</label>
            <input type="number" name="instrutor_id" id="instrutor_id" value="{{ old('instrutor_id') }}" required>
        </div>


        </form>
    </div>

@endcan
@endsection
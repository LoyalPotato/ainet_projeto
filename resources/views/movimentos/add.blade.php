@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/aeronaves">
        @csrf
        <div class="container">
            <label for="data do voo" class="mr-2">data do voo</label>
            <input type="text" name="data do voo" id="data do voo" value="{{ old('data do voo') }}">
        </div>
        <div class="container">
            <label for="hora descolagem" class="mr-2">hora descolagem</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        <div class="container">
            <label for="marca" class="mr-2">hora aterragem</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        <div class="container">
            <label for="marca" class="mr-2">aeronave</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        <div class="container">
            <label for="marca" class="mr-2">piloto</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        <div class="container">
            <label for="marca" class="mr-2">natureza do voo</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        <div class="container">
            <label for="marca" class="mr-2">aeródromo de partida</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        <div class="container">
            <label for="marca" class="mr-2">aeródromo de chegada</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}">
        </div>
        
        <input class="btn btn-outline-primary m-2" type="submit" value="Confirmar">

        
        
         códigos e nomes dos aeródromos), "nº de aterragens", "nº de descolagens", "nº pessoas a bordo", "conta-horas inicial", "conta-horas final", "tempo voo" (calcular o tempo total de voo a partir dos valores do conta-horas), "preço voo" (calculado automaticamente – ver US 18), "modo de pagamento" (N – numerário; M – Multibanco; T – Transferência; P – Pacote de horas), "nº de recibo" (nº do recibo em papel onde o voo foi pago) e "observações". Caso 

    </form>
</div>
@endsection
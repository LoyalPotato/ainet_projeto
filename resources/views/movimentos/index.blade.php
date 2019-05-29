@extends('layouts.app')

@section('content')

<div class="container">
    @if (count($movimentos)>=1)
    <a class="btn btn-outline-primary mb-2 float-right" href="{{ url('/movimentos/create') }}"> Criar Movimento </a>
    @endif
</div>



@if (count($movimentos))
<div class="container">
    

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Selecionar movimentos</th>
                <th>Id do movimento</th>
                <th>matrícula da aeronave</th>
                <th>data do voo</th>
                <th>hora descolagem</th>
                <th>hora aterragem</th>
                <th>tempo voo</th>
                <th>natureza do voo</th>
                <th>piloto</th>
                <th>código do aeródromo de partida</th>
                <th>código do aeródromo de chegada</th>
                <th>nº de aterragens</th>
                <th>nº de descolagens</th>
                <th>nº diário</th>
                <th>nº serviço</th>
                <th>conta-horas inicial</th>
                <th>conta-horas final</th>
                <th>nº pessoas a bordo</th>
                <th>tipo de instrução</th>
                <th>instrutor</th>
                <th>confirmado</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($movimentos as $movimento)
            @foreach ($arrayInstrutores as $instrutor)
            @foreach ($arrayPilotos as $piloto)
            
            <tr>

                 @if ($autorizacao=='2')
                <td>
                    <input type="checkbox" name="vehicle1" value="Bike"><br>
                </td>
                @endif

                @if ($autorizacao=='1' || $autorizacao=='2')
                <td>
                    <a href="/movimentos/{{$movimento->id}}/edit">
                        {{$movimento->id}}
                    </a>
                </td>
                @else
                <td>{{$movimento->id}}</td>
                @endif
                <td>{{$movimento->aeronave}}</td>
                <td>{{$movimento->data}}</td>
                <td>{{$movimento->hora_descolagem}}</td>
                <td>{{$movimento->hora_aterragem}}</td>
                <td>{{$movimento->tempo_voo}}</td>
                <td>{{$movimento->natureza}}</td>
                <td>{{$piloto->name}}</td>
                <td>{{$movimento->aerodromo_partida}}</td>
                <td>{{$movimento->aerodromo_chegada}}</td>
                <td>{{$movimento->num_aterragens}}</td>
                <td>{{$movimento->num_descolagens}}</td>
                <td>{{$movimento->num_diario}}</td>
                <td>{{$movimento->num_servico}}</td>
                <td>{{$movimento->conta_horas_inicio}}</td>
                <td>{{$movimento->conta_horas_fim}}</td>
                <td>{{$movimento->num_pessoas}}</td>
                <td>{{$movimento->tipo_instrucao}}</td>
                <td>{{$instrutor->name}}</td>
                <td>{{$movimento->confirmado}}</td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
    </table>
    {{ $movimentos->links() }}

</div>
@else
<h2>Nao existem movimentos registados</h2>
@endif


@endsection



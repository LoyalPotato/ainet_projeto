@extends('layouts.app')

@section('content')

@if (count($movimentos))
<div class="container">
    @include('layouts.errors')

    <form action="{{route('movimentos.index')}}" method="GET" role="form" class="inline">
                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <p style="color:blue;">Natureza: <p>
                                        <select name="natureza" class="form-control form-control-sm" style="width:150px; ">
                                            <option value=""></option>
                                            <option value="T">Treino</option>
                                            <option value="I">Instrução</option>
                                            <option value="E">Especial</option>
                                        </select>
                                </th>
                                <th>
                                    <p style="color:blue;">Id movimento: <p>
                                        <input
                                            type="number" class="form-control"
                                            name="id" id="id_movimento"
                                            placeholder="Id movimento" value="{{ old('id') }}"/>
                                </th>
                                <th>
                                    <p style="color:blue;">Aeronave: <p>      
                                        <input
                                            type="text" class="form-control"
                                            name="aeronave" id="inputAeronave"
                                            placeholder="Aeronave" value="{{old('aeronave')}}"/> 
                                </th>
                                <th>
                                    <p style="color:blue;">Confirmado: <p>                      
                                        <select name="confirmado" class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select> 
                                </th>



                                
                                
                            </tr>
                        </thead>
                    </table>
                
                    <table class="table table-striped">
                        <thead>
                            <tr>


                                @can('piloto', App\Movimento::class)
                                  <th>
                                    <p style="color:blue;">meus_movimentos: <p>                        
                                        <select name="meus_movimentos" class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select> 
                                </th>
                                @endcan


                                <th>
                                    <p style="color:blue;">Id piloto: <p>
                                        <input
                                            type="number" class="form-control"
                                            name="piloto" id="id_piloto"
                                            placeholder="Id piloto" value="{{ old('id_piloto') }}"/>
                                </th>



                                <th>
                                    <p style="color:blue;">Id instrutor: <p>
                                        <input
                                            type="number" class="form-control"
                                            name="instrutor" id="id_intrutor"
                                            placeholder="Id intrutor" value="{{ old('id_intrutor') }}"/>
                                </th>
                                
                                
                               
                                <th>
                                    <p style="color:blue;">Data inferior: <p>
                                        <input name="data_inf" id="data_inf" type="date">

                                </th>

                                <th>
                                    <p style="color:blue;">Data superior: <p>
                                        <input name="data_sup" id="data_sup" type="date">

                                </th>
                               
                               



                            </tr>
                        </thead>
                    </table>
                
                
                <button type="submit" class="btn btn-primary">Filter </button>
            </form>   




    

    
    <a class="btn btn-outline-primary mb-2 float-right" href="{{ url('/movimentos/create') }}"> Criar Movimento </a>
    
</div>




<div class="container">
    

    <table class="table table-striped">
        <thead>
            <tr>
                @can('admin', App\Movimento::class)
                <th>Selecionar movimentos</th>
                @endcan
                
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
            
            <tr>
                @can('admin', App\Movimento::class)
                <td>
                    <input type="checkbox" name="items" value="Select"><br>
                </td>                
                @endcan                     



                <td>{{$movimento->id}}</td>
                <td>{{$movimento->aeronave}}</td>
                <td>{{$movimento->data}}</td>
                <td>{{$movimento->hora_descolagem}}</td>
                <td>{{$movimento->hora_aterragem}}</td>
                <td>{{$movimento->tempo_voo}}</td>
                <td>{{$movimento->natureza}}</td>
                <td>{{$movimento->piloto->nome_informal}}</td>
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
                @if(isset($movimento->instrutor_id))
                <td>{{$movimento->instrutor->nome_informal}}</td>
                @else
                <td>Não tem instrutor</td>
                @endif
                
                @if($movimento->confirmado)
                <td>Sim</td>
                @else
                <td>Não</td>
                @endif

                @can('direcaonConfirmado',$movimento)
                
                <td>                
                <a class="btn btn-xs btn-primary" href="/movimentos/{{$movimento->id}}/edit">Editar</a>

                <form action="{{route('movimentos.destroy', $movimento)}}" method="POST" role="form" class="inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                </form>
               
                </td>

                @elsecan('permissoesPiloto',$movimento)   

                <td>
                
                <a class="btn btn-xs btn-primary" href="/movimentos/{{$movimento->id}}/edit">Editar</a>

                <form action="/movimentos/{{$movimento->id}}/edit" method="POST" role="form" class="inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                </form>
               
                
                </td>
                @endcan


            </tr>

            @endforeach
    </table>
    {{ $movimentos->links() }}

</div>
@else
        <h2>Nao existem movimentos registados</h2>
@endif


@endsection



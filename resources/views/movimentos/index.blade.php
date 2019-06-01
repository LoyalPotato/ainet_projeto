@extends('layouts.app')

@section('content')


@can('create', \App\Movimento::class)
<div class="container">
    @if (count($movimentos)>1)
        <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/movimentos/create') }}"> Criar movimento </a>
        <a class="btn btn-outline-primary mb-2 mr-2 float-left " href="{{ url('/movimentos/estatisticas') }}"> Estatisticas </a>
    @endif
</div>
@endcan



@if(count($movimentos))
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Aeronave</th>
            <th>Data voo</th>
            <th>Piloto ID</th>
            <th>Natureza</th>
            <th>Instrutor ID</th>
            <th>Confirmado</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($movimentos as $movimento)
        <tr>
            <td>{{$movimento->id}}</td>
            <td>{{$movimento->aeronave}}</td>
            <td>{{$movimento->data}}</td>
            <td>{{$movimento->piloto_id}}</td>
            <td>{{$movimento->natureza}}</td>
            <td>{{$movimento->instrutor_id}}</td>
            <td>{{$movimento->confirmado}}</td>
            @can('update', $movimento)
            <td>
                <a class="btn btn-primary mb-2" href="{{route('movimentos.edit', $movimento)}}">Editar</a>
                
                <form action="{{route('movimentos.destroy', $movimento)}}" method="POST" role="form" class="inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </td>
            @endcan
        </tr>
    @endforeach
    </table>
    @if (count($movimentos) > 1)
        {{ $movimentos->links() }}
    @endif
</div>

@else
    <h2>Não foram encontrados movimentos</h2>
@endif
@endsection

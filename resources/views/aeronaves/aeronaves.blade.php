@extends('layouts.app')

@section('content')

@can('create', App\Aeronave::class)
<div class="container">
    @if (count($naves)>1)
    <a class="btn btn-outline-primary mb-2 float-right " href="{{ route('aeronaves.create') }}"> Nova nave </a>
    @endif
</div>
@endcan

<div class="container">
    @if (count($naves) == 1)
    <a class="btn btn-outline-primary mb-2 float-left " href="{{ route('show_apiloto', $naves) }}">Pilotos autorizados e não autorizados a usar esta aeronave </a>
    @endif
</div>



@if (count($naves))
<div class="container">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Numero de Lugares</th>
                <th>Horas</th>
                <th>Preco-hora</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($naves as $nave)
            @if ($nave->deleted_at == null )
            <tr>
                <td>
                    <a href="{{route('aeronaves.show', $nave->matricula)}}">
                        {{$nave->matricula}}
                    </a>
                </td>
                <td>{{$nave->marca}}</td>
                <td>{{$nave->modelo}}</td>
                <td>{{$nave->num_lugares}}</td>
                <td>{{$nave->conta_horas}}</td>
                <td>{{$nave->preco_hora}}</td>
                <td>
                    @can('update',Auth::user(),  $nave)
                    <a class="btn btn-outline-primary mb-2 float-left"
                        href="{{route('aeronaves.edit', $nave->matricula)}}"> Editar </a>
                    @endcan
                    <form  method="POST"  action="{{route('aeronaves.destroy', $nave->matricula)}}"role="form"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger ml-2">Apagar</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
    </table>
    {{-- Esta linha serve para paginaçao. Sao enviadas quatro naves --}}
    @if (count($naves) > 1)
    {{ $naves->links() }}
    @endif
    {{-- @include('aeronaves.aeronaves_valores') --}}
    

</div>
@else
<h2>Nao existem aeronaves</h2>
@endif


@endsection
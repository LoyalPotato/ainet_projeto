@extends('layouts.app')

@section('content')

{{-- {{var_dump(Auth::user()->can('create', Aeronave::class))}} --}}
@can('create', App\Aeronave::class)
<div class="container">
    @if (count($naves)>1)
    <a class="btn btn-outline-primary mb-2 float-right " href="{{ route('aeronaves.create') }}"> Nova nave </a>
    @endif
</div>
@endcan



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
                    <form action="{{route('aeronaves.destroy', $nave->matricula)}}" method="POST" role="form" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
    </table>
    @if (count($naves)  > 1)
    {{ $naves->links() }}
    @endif
    {{-- @include('aeronaves.aeronaves_valores') --}}


</div>
{{-- Esta linha serve para paginaçao. Sao enviadas quatro naves --}}
@else
<h2>Nao existem aeronaves</h2>
@endif


@endsection
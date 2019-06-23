@extends('layouts.app')
@section('content')

{{-- 
    
    code	varchar(20)	
nome	varchar(255)	
deleted_at	timestamp NULL	
    --}}

@if (count($aerodromos))
<div class="container">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aerodromos as $aerodromo)
            @if ($aerodromo->deleted_at == null )
            <tr>
                <td>{{$aerodromo->code}}</td>
                <td>{{$aerodromo->nome}}</td>
                <td>
                    <a class="btn btn-outline-primary mb-2 float-left"
                        href="{{route('aerodromos.edit', $aerodromo->code)}}"> Editar </a>
                </td>
            </tr>
            @endif
            @endforeach
    </table>
    @if (count($aerodromos) > 1)
    {{ $aerodromos->links() }}
    @endif
    

</div>
@else
<h2>Nao existem aerodromo</h2>
@endif
    


@endsection 
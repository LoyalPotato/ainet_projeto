@extends('layouts.app')

@section('title', 'Quotas dos sócios')
@section('content')

<div class="container ml-2 mb-4">
    <h3> Quotas dos sócios </h3>
</div>

@if(count($users))

<div class="container ml-2">
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Nº Sócio</th>
            <th>Nome Informal</th>
            <th>Nome Completo</th>
            <th>Sexo</th>
            <th>Tipo Sócio</th>
            <th>Quotas em dia</th>

        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->num_socio}}</td>
            <td>{{$user->nome_informal}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->sexo}}</td>
            <td>{{$user->tipo_socio}}</td>
            <td>{{$user->quota_paga}}</td>
            <td> ALTERAR QUOTA
            <form action="" method="post">
                <input type="radio" name="quota_paga" value="quota_paga">Sim
                <input type="radio" name="quota_paga" value="quota_paga">Nao
                <input type="submit" name="submit" value="Submeter" />
            </form>
            
            </td>
        </tr>
    @endforeach
</table>
@if (count($users) > 1)
    {{ $users->links() }}
@endif
</div>

@else
    <h2>Não foram encontrados sócios</h2>
@endif

@endsection
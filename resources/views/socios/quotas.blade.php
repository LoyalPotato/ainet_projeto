@extends('layouts.app')

@section('title', 'Quotas dos sócios')
@section('content')

{{-- TODO: Fazer quotas single --}}

@can('view', auth()->user())

<div class="container mb-4">
    <h3> Quotas dos sócios </h3>
    <form action="socios/reset_quotas" method="POST">
        @method('PATCH')
        @csrf
        <button type="submit" class="btn btn-outline-primary mb-2">Reinicar Quotas</button>
    </form>
</div>
<div class="container">
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Nº Sócio</th>
                <th>Nome Informal</th>
                <th>Nome Completo</th>
                <th>Sexo</th>
                <th>Tipo Sócio</th>
                <th>Quotas em dia</th>
                <th>Alterar quota:</th>
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
                <td>
                    <form method="POST" action="{{route('ativarDesativarQuota', $user->id )}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-2">
                            <select name="quota_paga" id="quota_paga" class="form-control"
                                value="{{ $user->quota_paga}}">
                                <option disabled selected> -- Selecione uma opção -- </option>
                                <option value="0"
                                    {{ old('quota_paga', strval($user->quota_paga)) == 0 ? 'selected' : '' }}>Nao Paga
                                </option>
                                <option value="1"
                                    {{ old('quota_paga', strval($user->quota_paga)) == 1 ? 'selected' : '' }}>Paga
                                </option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submeter" />
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
    @if (count($users) > 1)
    {{ $users->links() }}
    @endif
</div>
@endcan
@endsection
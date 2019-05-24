{{-- Criada para mostrar o mapa que cruza as unidades --}}
<p>
    <h3>Tabela de Valores:</h3>
</p>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Unidade Conta-Horas</th>
            <th>Minutos</th>
            <th>Preco</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aeronave->valores as $valor)
        <tr>
            <td>{{$valor->matricula}}</td>
            <td>{{$valor->unidade_conta_horas}}</td>
            <td>{{$valor->minutos}}</td>
            <td>{{$valor->preco}}</td>
        </tr>
        @endforeach
</table>
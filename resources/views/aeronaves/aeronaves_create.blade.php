@extends('template')

@section('content')
<div class="container">
    <form action="/aeronaves" method="post">
        @csrf
        <div class="row">
            <input type="text" name="test" placeholder="Testing">
        </div>

        <div class="row">
            <input type="submit" value="Confirmar">
        </div>

    </form>
</div>
@endsection
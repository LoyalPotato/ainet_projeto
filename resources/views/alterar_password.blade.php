@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/password">
        @csrf
        @method('PATCH')

        {{-- NOTE: pr-3 é o padding (padding right size 3) (More info check bootstrap documentation) --}}
        <div class="form-group row">
            <label for="old_passwd" class="pr-3">Password Anterior</label>
            <input type="password" name="old_password" id="old_passwd" required>
        </div>

        <div class="form-group row">
            <label for="password" class="pr-3">Nova Password</label>
            <input type="password" name="password" id="new_passwd" required>
        </div>
        <div class="form-group row">
            <label for="password_confirmation" class="pr-3">Confirmar Password</label>
            <input type="password" name="password_confirmation" id="confirm_passwd" required>

        </div>
        <input type="submit" value="Confirmar">


        @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
            <ul>{{$error}}</ul>
            @endforeach
        </div>
        @endif
        @if (session('pass_change'))
        <p>{{session('pass_change')}}</p>
        @endif
        {{-- @if (session('old_password'))
        <p>{{session('old_password')}}</p>
        @endif --}}
    </form>
</div>
@endsection
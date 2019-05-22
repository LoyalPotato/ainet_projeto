@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/password">
        @csrf
        @method('PATCH')

        {{-- pr-3 é o padding (padding right size 3) (More info check bootstrap documentation) --}}
        <div class="form-group">
            <label for="old_passwd" class="pr-3">Password Anterior</label>
            <input class="form-control" type="password" name="old_password" id="old_passwd" required>
        </div>

        <div class="form-group">
            <label for="password" class="pr-3">Nova Password</label>
            <input class="form-control" type="password" name="password" id="new_passwd" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="pr-3">Confirmar Password</label>
            <input class="form-control" type="password" name="password_confirmation" id="confirm_passwd" required>
        </div>

        @include('layouts.errors')
        
        <button class="btn btn-outline-primary m-2 " type="submit">Confirmar </button>
    </form>
</div>

@endsection
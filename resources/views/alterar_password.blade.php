@extends('template')

@section('content')
<form method="POST" action="/password">
    @csrf
    {{method_field('PATCH')}}
    <div class="row">
        <tr>
            <div class="form-group row">
                <label for="old_passwd">Password Anterior</label>
                <input type="password" name="old_password" id="old_passwd" required>
            </div>

            <div class="form-group row">
                <label for="password">Nova Password</label>
                <input type="password" name="password" id="new_passwd" required>
            </div>
            <div class="form-group row">
                <label for="password_confirmation">Confirmar Password</label>
                <input type="password" name="password_confirmation" id="confirm_passwd" required>

            </div>
            <input type="submit" value="Confirmar">

        </tr>
    </div>

    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
    @endif
</form>
@endsection
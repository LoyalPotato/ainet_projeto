@extends('master')
@section('title', 'Eliminar Sócio')
@section('content')

@if (count($errors) > 0)
    @include('shared.errors')
@endif

<form action="{{route('users.destroy', $user)}}" method="post" class="form-group">
    @method('DELETE')
    @csrf
    <div class="form-group">
        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        <a type="submit" class="btn btn-default" name="cancel" href="{{route('users.index')}}">Cancel</a>
    </div>
</form>
@endsection
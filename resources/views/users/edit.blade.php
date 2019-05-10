@extends('master')
@section('title', 'Editar Sócio')
@section('content')

@if (count($errors) > 0)
    @include('shared.errors')
@endif

<form action="{{route('users.update', $user)}}" method="post" class="form-group">
    @method('PUT')
    @csrf
    @include('users.partials.add-edit')
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Save</button>
        <a type="submit" class="btn btn-default" name="cancel" href="{{route('users.index')}}">Cancel</a>
    </div>
</form>
@endsection

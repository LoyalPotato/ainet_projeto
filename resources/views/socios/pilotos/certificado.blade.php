@extends('layouts.app')

@section('content')
<iframe src="{{asset('storage/docs_pilotos/certificado_' . $piloto->id . '.pdf')}}" width="200px" height="200px" frameborder="2">
</iframe>

@endsection
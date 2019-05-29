@section('title', 'Edit Movimento')

@section('content')

@if (count($errors) > 0)
    @include('shared.errors')
@endif

<form action="{{route('movimentos.update', $movimento)}}" method="post" class="form-group">
    {{method_field('PUT')}}




    {{csrf_field()}}
<div class="form-group">
    <label for="inputFullname">Name</label>
    <input
        type="text" class="form-control"
        name="name" id="inputId"
        placeholder="ID" value="{{old('id', $movimento->id)}}" />
</div>







    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Save</button>
        <a type="submit" class="btn btn-default" name="cancel" href="{{route('movimentos.index')}}">Cancel</a>
    </div>
</form>
@endsection

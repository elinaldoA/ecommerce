@extends('layouts.admin')
@section('main-content')
<form class="col" method="POST" action="{{route('categoria.store')}}" enctype="multipart/form-data">
@csrf
<div class="row g-3">
    <div class="col-4">
        <label for="nome" class="form-label">Nome:<span class="small text-danger"> * </span></label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Notebook"><br/>
        <button type="submit" class="btn btn-primary mb-3">Salvar</button>
    </div>
</div>
</form>
@endsection

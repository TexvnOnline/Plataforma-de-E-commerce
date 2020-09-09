@extends('layouts.admin')
@section('title','Crear categoría')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('categories.index')}}">Categorías</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Registro de categoría</h3>
    </div>
    {!! Form::open(['route'=>'categories.store', 'method'=>'POST','files' => true]) !!}
	<div class="card-body ">
        @include('admin.categories.form.form')
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('categories.index')}}">Cancelar</a>
      <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
</div>
@endsection
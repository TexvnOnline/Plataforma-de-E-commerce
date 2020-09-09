@extends('layouts.admin')
@section('title','Crear subcategoría')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('subcategories.index')}}">Subcategorías</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Registro de subcategoría</h3>
    </div>
    {!! Form::open(['route'=>'subcategories.store', 'method'=>'POST','files' => true]) !!}
	<div class="card-body ">
        @include('admin.subcategories.form.form')
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('subcategories.index')}}">Cancelar</a>
      <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection
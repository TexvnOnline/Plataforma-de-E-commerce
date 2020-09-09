@extends('layouts.admin')
@section('title','Crear publicación')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('posts.index')}}">Publicaciones</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Registro de publicación</h3>
    </div>
    {!! Form::open(['route'=>'posts.store', 'method'=>'POST','files' => true]) !!}
	<div class="card-body ">
        @include('admin.posts.form.form')
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('posts.index')}}">Cancelar</a>
      <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection
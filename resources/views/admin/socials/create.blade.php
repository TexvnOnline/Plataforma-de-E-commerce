@extends('layouts.admin')
@section('title','Crear rede social')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('socials.index')}}">Redes sociales</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Registro de rede social</h3>
    </div>
    {!! Form::open(['route'=>'socials.store', 'method'=>'POST']) !!}
	<div class="card-body ">
        @include('admin.socials.form.form')
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('socials.index')}}">Cancelar</a>
      <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection
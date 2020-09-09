@extends('layouts.admin')
@section('title','Editar carrusel')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('carousels.index')}}">Carrusel</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Edición de carrusel</h3>
    </div>
    {!! Form::model($carousel, ['route'=>['carousels.update',$carousel->id],'method'=>'PUT','files' => true]) !!}
	<div class="card-body ">
        @include('admin.carousels.form.form')
        <div class="card bg-dark text-white">
          <img class="card-img" src="{{$carousel->image->url}}" alt="Card image">
          <div class="card-img-overlay">
            <h5 class="card-title">Imagen de carrusel</h5>
          </div>
        </div>
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('carousels.index')}}">Cancelar</a>
      <input type="submit" value="Actualizar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection
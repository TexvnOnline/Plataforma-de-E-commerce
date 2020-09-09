@extends('layouts.admin')
@section('title','Editar producto')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('products.index')}}">Productos</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Edición de producto</h3>
    </div>
    {!! Form::model($product, ['route'=>['products.update',$product->id],'method'=>'PUT','files' => true]) !!}
	<div class="card-body ">
    @include('admin.products.form.form')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="card-title">
                  Galeria  de imagenes 
                </div>
              </div>
              <div class="card-body " id="apiproduct">
                <div class="row">
                  @foreach ($product->images as $image)
                  <div class="col-sm-3" id="idimagen-{{$image->id}}">
                    <a href="{{$image->url}}" data-toggle="lightbox" data-title="Id: {{$image->id}}" data-gallery="gallery">
                      <img  src="{{$image->url}}" class="img-fluid mb-2"/>                                   
                    </a>
                    <br>
                    <a class="texto-encima" href="{{$image->url}}"
                      v-on:click.prevent="eliminarimagen({{$image}})"
                      >
                      <i class="fas fa-trash-alt" style="color: white"></i>
                    </a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('products.index')}}">Cancelar</a>
      <input type="submit" value="Actualizar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection
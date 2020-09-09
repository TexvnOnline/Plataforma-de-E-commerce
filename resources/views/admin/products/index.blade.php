@extends('layouts.admin')
@section('title','Gestión de productos')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de productos</h3>
	  <div class="card-tools">
		<a type="button" class="btn btn-tool" href="{{route('products.create')}}">
            <h3 class="card-title" >Agregar <i class="fas fa-plus"></i></h3>
        </a>
	  </div>
	</div>
	<div class="card-body table-responsive p-0">
		<table class="table table-head-fixed">
		  <thead>
			  <tr>
				  <th scope="col">ID</th>
				  <th>Nombre</th>
				  <th>Estado</th>
				  <th colspan="3">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($products as $product)
				<tr>
					<td scope="row">{{$product->id}}</td>
					<td>{{$product->name}}</td>

					@if ($product->status == 'DRAFT')
					<td>
						<small class="badge badge-danger"><i class="fas fa-times"></i> Borrador</small>
					</td>
					@else
					<td>
						<small class="badge badge-success"><i class="fas fa-check"></i> Publicado</small>
					</td>
					@endif
					<td width="10px">
						<a class="btn btn-default btn-sm" href="{{route('products.show', $product->id)}}">
							<i class="fas fa-eye"></i>
						</a>
					</td>
					<td width="10px">
						<a class="btn btn-default btn-sm" href="{{route('products.edit', $product->id)}}">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['products.destroy',$product->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-default btn-sm">
							<i class="fas fa-trash-alt"></i>
						</button>
						{!! Form::close() !!}
					</td>
				</tr>
			  @endforeach	 
		  </tbody>
		</table>
	{{$products->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection
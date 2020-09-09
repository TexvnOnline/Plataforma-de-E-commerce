@extends('layouts.admin')
@section('title','Gestión de subcategorías')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de subcategorías</h3>
	  <div class="card-tools">
		<a type="button" class="btn btn-tool" href="{{route('subcategories.create')}}">
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
				  <th colspan="2">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($subcategories as $subcategory)
				<tr>
					<th scope="row">{{$subcategory->id}}</td>
					<td>{{$subcategory->name}}</td>
					<td width="10px">
						<a class="btn btn-info" href="{{route('subcategories.edit', $subcategory->id)}}">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['subcategories.destroy',$subcategory->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger">
							<i class="fas fa-trash-alt"></i>
						</button>
						{!! Form::close() !!}
					</td>
				</tr>
			  @endforeach	 
		  </tbody>
		</table>
	{{$subcategories->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection
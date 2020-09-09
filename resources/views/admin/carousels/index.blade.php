@extends('layouts.admin')
@section('title','Gestión de carrusel')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de carrusel</h3>
	  <div class="card-tools">
		<a type="button" class="btn btn-tool" href="{{route('carousels.create')}}">
            <h3 class="card-title" >Agregar <i class="fas fa-plus"></i></h3>
        </a>
	  </div>
	</div>
	<div class="card-body table-responsive p-0">
	  <table class="table table-head-fixed">
		  <thead>
			  <tr>
				  <th scope="col">ID</th>
				  <th>Encabezado</th>
				  <th>Texto</th>
				  <th>Extracto</th>
				  <th>Botón</th>
				  <th>Imagen</th>
				  <th colspan="2">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($carousels as $carousel)
			<tr>
				  <th scope="row">{{$carousel->id}}</td>
				  <td>{{$carousel->header}}</td>
				  <td>{{$carousel->text}}</td>
				  <td>{{$carousel->excerpt}}</td>
				  <td>{{$carousel->buttonText}}</td>
				  <td> {{$carousel->image->url}} </td>
			  	<td width="10px">
					<a class="btn btn-info" href="{{route('carousels.edit', $carousel->id)}}">
						<i class="fas fa-edit"></i>
					</a>
				</td>
				<td width="10px">
					{!! Form::open(['route'=>['carousels.destroy',$carousel->id], 'method'=>'DELETE']) !!}
					<button class="btn btn-danger">
						<i class="fas fa-trash-alt"></i>
					</button>
					{!! Form::close() !!}
				</td>
			</tr>
			  @endforeach
		  </tbody>
	  </table>
	{{$carousels->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection
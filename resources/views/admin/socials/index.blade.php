@extends('layouts.admin')
@section('title','Gestión de redes sociales ')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de redes sociales </h3>
	  <div class="card-tools">
		<a type="button" class="btn btn-tool" href="{{route('socials.create')}}">
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
				  <th>Icono</th>
				  <th>Enlace</th>
				  <th colspan="2">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($socials as $social)
			<tr>
				  <th scope="row">{{$social->id}}</td>
				  <td>{{$social->title}}</td>
				  <td>{{$social->icon}}</td>
				  <td>{{$social->link}}</td>
			  	<td width="10px">
					<a class="btn btn-info" href="{{route('socials.edit', $social->id)}}">
						<i class="fas fa-edit"></i>
					</a>
				</td>
				<td width="10px">
					{!! Form::open(['route'=>['socials.destroy',$social->id], 'method'=>'DELETE']) !!}
					<button class="btn btn-danger">
						<i class="fas fa-trash-alt"></i>
					</button>
					{!! Form::close() !!}
				</td>
			</tr>
			  @endforeach
		  </tbody>
	  </table>
	{{$socials->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection
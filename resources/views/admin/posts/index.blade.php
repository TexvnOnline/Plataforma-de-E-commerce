@extends('layouts.admin')
@section('title','Gestión de publicaciones')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de publicaciones</h3>
	  <div class="card-tools">
		<a type="button" class="btn btn-tool" href="{{route('posts.create')}}">
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
				  <th>Resumen</th>
				  <th colspan="3">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($posts as $post)
				<tr>
					<td scope="row">{{$post->id}}</td>
					<td>{{$post->name}}</td>
					<td>{{$post->abstract}}</td>
					<td width="10px">
						<a class="btn btn-default btn-sm" href="{{route('posts.show', $post->id)}}">
							<i class="fas fa-eye"></i>
						</a>
					</td>
					<td width="10px">
						<a class="btn btn-default btn-sm" href="{{route('posts.edit', $post->id)}}">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['posts.destroy',$post->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-default btn-sm">
							<i class="fas fa-trash-alt"></i>
						</button>
						{!! Form::close() !!}
					</td>
				</tr>
			  @endforeach	 
		  </tbody>
		</table>
	{{$posts->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection
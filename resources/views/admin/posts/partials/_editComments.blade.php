
<div class="modal fade" id="modal-edit-comment{{$comment->id}}">
	<div class="modal-dialog modal-edit-comment">
	  <div class="modal-content">
		<div class="modal-header">
		  <h4 class="modal-title">Edición de comentario</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		{!! Form::model($comment, ['route'=>['comment.update',$comment->id],'method'=>'PUT']) !!}
		<div class="modal-body">
			<div class="card-body ">
				<div class="form-group">
                    {!! Form::label('body','Comentario') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>'2']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('status', 'Estado') !!}
					<label >
						{!! Form::radio('status', 'PUBLISHED') !!} Publicado
					</label>
					<label >
						{!! Form::radio('status', 'DRAFT') !!} Borrador
					</label>
				</div>
			</div>
		</div>
		<div class="modal-footer justify-content-between">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		  <input type="submit" value="Actualizar" class="btn btn-primary">
		</div>
		{!! Form::close() !!}
	  </div>
	</div>
</div>
@foreach ($comments as $comment)
<div class="media mb-4 mt-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
      <h5 class="mt-0">
        <strong>
          {{$comment->user->name}} 
        </strong>
        {{$comment->created_at->format('d/m/Y')}} 
        <strong>
          Estado: 
        </strong>
       @if ($comment->status == 'DRAFT')
       <i class="fas fa-times" style="color:red;"></i> Pendiente 
       @else
       <i class="fas fa-check" style="color:green;"></i> Aprobado   
       @endif
      </h5>
      {{$comment->body}}
      {!! Form::open(['route'=>'productReply.add', 'method'=>'POST']) !!}
      <div class="form-group">
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="hidden" name="comment_id" value="{{$comment->id}}">
        @if ($comment->parent_id == null)
          <textarea class="form-control" name="body" rows="2"></textarea>
        @endif
        <div class="action">
          @if ($comment->parent_id == null)
          <button type="submit" class="btn btn-info btn-xs" title="Reply">
            <i class="fas fa-reply"></i>  Responder 
          </button>
          @endif
        </div>
      </div>
      {!! Form::close() !!}
      <div class="action row" >
        <div class="ml-1">
          <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-primary btn-xs" title="Editar" data-toggle="modal" data-target="#modal-edit-comment{{$comment->id}}" >
            <i class="fas fa-edit"></i>
          </a>
        </div>
        <div class="ml-1">
          {!! Form::open(['route'=>['comment.destroy',$comment->id], 'method'=>'DELETE']) !!}
          <button  class="btn btn-danger btn-xs" title="Eliminar">
            <i class="fas fa-trash-alt"></i>
          </button>
          {!! Form::close() !!}
        </div>
      </div>
      @include('admin.products._replies',['comments'=>$comment->replies])
    </div>
</div>
@endforeach

@if (isset($comment->replies))
  @include('admin.products.partials._editComments',['comments'=>$comment->replies])
@endif


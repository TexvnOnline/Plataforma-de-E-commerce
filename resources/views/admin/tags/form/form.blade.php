<div class="form-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>   
<div class="from-group">
    {!! Form::label('category_id','Nombre') !!}
    {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
</div>
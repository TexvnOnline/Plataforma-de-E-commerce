<div class="from-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="from-group">
    {!! Form::label('category_id','Categoría') !!}
    {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
</div>
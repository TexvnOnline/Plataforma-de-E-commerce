<div class="form-group">
    {!! Form::label('header','Encabezado') !!}
    {!! Form::text('header', null, ['class'=>'form-control']) !!}
</div>   
<div class="form-group">
    {!! Form::label('text','Texto') !!}
    {!! Form::text('text', null, ['class'=>'form-control']) !!}
</div>  
<div class="form-group">
    {!! Form::label('excerpt','Extracto') !!}
    {!! Form::text('excerpt', null, ['class'=>'form-control']) !!}
</div>  
<div class="form-row">
    <div class="col-md-6 mb-3">
        {!! Form::label('buttonText','Texto del botón') !!}
        {!! Form::text('buttonText', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6 mb-3">
        {!! Form::label('buttonLink','Enlace del botón') !!}
        {!! Form::text('buttonLink', null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('category_id','Imagen') !!}
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" lang="es">
            <label class="custom-file-label" name="image">Seleccionar Archivo</label>
        </div>
        <small class="form-text text-muted">
            Solo archivos de imágenes de dimensiones 1200x490 px.
        </small>
</div> 
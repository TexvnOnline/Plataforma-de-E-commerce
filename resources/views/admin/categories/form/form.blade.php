<div class="form-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>   
<div class="form-group">
    {!! Form::label('icon','Icono') !!}
    {!! Form::text('icon', null, ['class'=>'form-control']) !!}
</div> 
<div class="form-row">
    <div class="form-group col">
        {!! Form::label('category_id','Imagen') !!}
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" lang="es">
            <label class="custom-file-label" name="image">Seleccionar Archivo</label>
        </div>
        <small class="form-text text-muted">
            Solo archivos de imágenes de dimensiones 1200x490 px.
        </small>
    </div>
    <div class="form-group">
        {!! Form::label('module','Modulo') !!}  
        {!! Form::select('module', getModulesArray(),null, ['class'=>'form-control']) !!}
    </div>  
</div>
<div class="form-group">
    {!! Form::label('front','¿La categoría estará en la portada?') !!}
    <div class="form-check">
        <input class="form-check-input" type="radio" name="front" id="exampleRadios1" value="YES">
        <label class="form-check-label" for="exampleRadios1">
        Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="front" id="exampleRadios2" value="NO" checked>
        <label class="form-check-label" for="exampleRadios2">
        No
        </label>
    </div>
</div>

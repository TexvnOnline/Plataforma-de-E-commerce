{!! Form::hidden('user_id', auth()->user()->id) !!}
<div class="form-group"> 
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        {!! Form::label('state','Estados') !!}  
        {!! Form::select('state', getStatesArray(),null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6 mb-3">
        {!! Form::label('stock','Cantidad de existencias') !!}
        {!! Form::number('stock', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        {!! Form::label('actualPrice','Precio normal') !!}
            <div class="input-group">
                 <div class="input-group-prepend">
                      <span class="input-group-text">s/</span>
                 </div>
                 {!! Form::number('actualPrice', null, ['class'=>'form-control', 'step'=>'0.01', 'id'=>'price']) !!}
                 <div class="input-group-append">
                      <span class="input-group-text">PEN</span>
                 </div>
            </div>
    </div>
    <div class="col-md-4 mb-3">
        {!! Form::label('discountRate','Porcentaje de descuento') !!}
        
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">%</span>
            </div>
            {!! Form::text('discountRate', null, ['class'=>'form-control', 'placeholder'=>'Porcentaje de descuento', 'id'=>'percentage']) !!}
        </div>
    </div>
    <div class="col-md-4 mb-3">
        {!! Form::label('previousPrice','Precio con descuento') !!}
        <div class="input-group">
            <div class="input-group-prepend">
                 <span class="input-group-text">s/</span>
            </div>
            {!! Form::number('previousPrice', null, ['class'=>'form-control', 'step'=>'0.01', 'id'=>'Outcome']) !!}
            <div class="input-group-append">
                 <span class="input-group-text">PEN</span>
            </div>
       </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col">
        {!! Form::label('images','Imagenes') !!}
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="images[]" lang="es" id="images[]" multiple accept="image/*">
            <label class="custom-file-label" name="images">Seleccionar Archivos</label>
        </div>
        <small class="form-text text-muted">
            Solo archivos de imágenes de dimensiones 1200x490 px.
        </small>
    </div>
    <div class="form-group col">
        {!! Form::label('subcategory_id','Subcategoría') !!}
        {!! Form::select('subcategory_id', $subcategories , null, ['class'=>'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('shortDescription','Descripción corta') !!}
    {!! Form::textarea('shortDescription', null, ['class'=>'form-control', 'rows'=>'2']) !!}
</div>
<div class="form-group"> 
    {!! Form::label('longDescription','Descripción larga') !!}
    {!! Form::textarea('longDescription', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('status','Estado de la publicación: ') !!}
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="rdEstatus1" value="PUBLISHED">
        <label class="form-check-label" for="status">Publicado</label>
   </div>
   <div class="form-check form-check-inline">
        <input class="form-check-input" checked type="radio" name="status" id="rdEstatus0" value="DRAFT">
        <label class="form-check-label" for="status">Borrador</label>
   </div>
</div>
@section('scripts')

{!! Html::script('vendor/ckeditorbasic/ckeditor.js') !!}
<script>
    CKEDITOR.replace('longDescription');
</script>
<script>
    $(function(){
       $('#price').on('input', function() {
         calculate();
       });
       $('#percentage').on('input', function() {
        calculate();
       });
       function calculate(){
           var pPos = parseInt($('#price').val()); 
           var pEarned = parseInt($('#percentage').val());
           var perc="";
           if(isNaN(pPos) || isNaN(pEarned)){
               perc=" ";
              }else{
              perc = (pPos-(pPos*pEarned/100)).toFixed(3);
              }
   
           $('#Outcome').val(perc);
       }
   });
</script>
<script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });
  
      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
@endsection
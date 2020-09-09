@extends('layouts.admin')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
{!! Html::style('css/product.css') !!}
@endsection
@section('title','Detalles producto')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('products.index')}}">Productos</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Detalle de producto</h3>
    </div>
	<div class="card-body ">
    <div class="container">
      <div class="row">
      <div class="col-md-6">
        <div id="slider" class="owl-carousel product-slider">
              @foreach ($product->images as $image)
                <div class="item">
                  <img src="{{$image->url}}" />
                </div>
              @endforeach
        </div>
        <div id="thumb" class="owl-carousel product-thumb">
          @foreach ($product->images as $image)
            <div class="item">
              <img src="{{$image->url}}" />
            </div>
          @endforeach
        </div>
      </div>
        <div class="col-md-6">
          <div class="product-dtl">
            <div class="product-info">
              <div class="product-name">{{$product->name}}</div>
              <div class="reviews-counter">
                {{-- Calificación con estrellas  --}}
            <span>{{$product->comments_count}} Comentarios</span> 
          </div>
              <div class="product-price-discount"><span>{{$product->previousPrice}}</span><span class="line-through">{{$product->actualPrice}}</span></div>
            </div>
            <p>{{$product->shortDescription}}</p>
            <div class="row">
              <div class="col-md-6">
                <label for="size">Descuento</label>
                <p> {{$product->discountRate}}%</p>
              </div>
              <div class="col-md-6">
                <label for="color">Estado</label>
                @if ($product->state == 0)
                <p>Descuento</p>
                @else
                    @if ($product->state == 1)
                    <p>Nuevo</p>
                    @endif
                    @if ($product->state == 2)
                    <p>Oferta</p>
                    @endif
                    @if ($product->state == 3)
                    <p>Rebaja</p> 
                    @endif
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="size">Stock</label>
                <p> {{$product->stock}}</p>
              </div>
              <div class="col-md-6">
                <label for="size">Subcategoría</label>
                <p> {{$product->subcategory->name}}</p>
              </div>
            </div>
            <div class="product-count">
                <label for="size">Categoría</label>
                  <p> {{$product->subcategory->category->name}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="review-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="review" aria-selected="false">Comentarios ({{$product->comments_count}})</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
          {!! htmlspecialchars_decode($product->longDescription) !!}
        </div>
        <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="review-tab">
          <div class="card my-4">
            <h5 class="card-header">Deja un comentario:</h5>
            <div class="card-body">
              
              {!! Form::open(['route'=>'productComment.add', 'method'=>'POST']) !!}
                <div class="form-group">
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                  <textarea class="form-control" name="body" rows="3"></textarea>
                </div>
                
                <input type="submit" class="btn btn-primary" value="Enviar">
              {!! Form::close() !!}
            </div>
          </div>
      
      @include('admin.products._replies',['comments'=>$product->comments, 'product_id'=>$product->id])
        </div>
    </div>
    </div>
    </div>
	</div>
	<div class="card-footer">
      <a class="btn btn-primary" href="{{route('products.index')}}">Regresar</a>
  </div>
  </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<script>
  window.alert = function(){};
  var defaultCSS = document.getElementById('bootstrap-css');
  function changeCSS(css){
      if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
      else $('head > link').filter(':first').replaceWith(defaultCSS); 
  }
  $( document ).ready(function() {
    var iframe_height = parseInt($('html').height()); 
    window.parent.postMessage( iframe_height, '');
  });
</script>


<script>
	$(document).ready(function() {
		    var slider = $("#slider");
		    var thumb = $("#thumb");
		    var slidesPerPage = 4; 
		    var syncedSecondary = true;
		    slider.owlCarousel({
		        items: 1,
		        slideSpeed: 2000,
		        nav: false,
		        autoplay: false, 
		        dots: false,
		        loop: true,
		        responsiveRefreshRate: 200
		    }).on('changed.owl.carousel', syncPosition);
		    thumb
		        .on('initialized.owl.carousel', function() {
		            thumb.find(".owl-item").eq(0).addClass("current");
		        })
		        .owlCarousel({
		            items: slidesPerPage,
		            dots: false,
		            nav: true,
		            item: 4,
		            smartSpeed: 200,
		            slideSpeed: 500,
		            slideBy: slidesPerPage, 
		        	navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
		            responsiveRefreshRate: 100
		        }).on('changed.owl.carousel', syncPosition2);
		    function syncPosition(el) {
		        var count = el.item.count - 1;
		        var current = Math.round(el.item.index - (el.item.count / 2) - .5);
		        if (current < 0) {
		            current = count;
		        }
		        if (current > count) {
		            current = 0;
		        }
		        thumb
		            .find(".owl-item")
		            .removeClass("current")
		            .eq(current)
		            .addClass("current");
		        var onscreen = thumb.find('.owl-item.active').length - 1;
		        var start = thumb.find('.owl-item.active').first().index();
		        var end = thumb.find('.owl-item.active').last().index();
		        if (current > end) {
		            thumb.data('owl.carousel').to(current, 100, true);
		        }
		        if (current < start) {
		            thumb.data('owl.carousel').to(current - onscreen, 100, true);
		        }
		    }
		    function syncPosition2(el) {
		        if (syncedSecondary) {
		            var number = el.item.index;
		            slider.data('owl.carousel').to(number, 100, true);
		        }
		    }
		    thumb.on("click", ".owl-item", function(e) {
		        e.preventDefault();
		        var number = $(this).index();
		        slider.data('owl.carousel').to(number, 300, true);
		    });


            $(".qtyminus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1> 0)
                    { now--;}
                    $(".qty").val(now);
                }
            })            
            $(".qtyplus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    $(".qty").val(parseInt(now)+1);
                }
            });
    });	
  </script>
@endsection
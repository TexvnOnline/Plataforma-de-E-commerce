<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section new-arriavls">
  <h3 class="section-title">Featured Products</h3>
  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
    @foreach ($productsFeatured as $productFeatured)
    <div class="item item-carousel">
        <div class="products">
          <div class="product">
            <div class="product-image">
              <div class="image"> 
                    <a href="detail.html">
                        @foreach ($productFeatured->images->slice(0, 2) as $image)
                        <img src="{{$image->url}}" class="{{ $loop->first ? '' : 'hover-image' }}" alt=""> 
                        @endforeach
                    </a>
                    
                    </div>
              <!-- /.image -->
              
              <div class="tag new"><span>{{$productFeatured->state}}</span></div>
            </div>
            <!-- /.product-image -->
            
            <div class="product-info text-left">
              <h3 class="name"><a href="detail.html">{{$productFeatured->name}}</a></h3>
              <div class="rating rateit-small"></div>
              <div class="description"></div>
              <div class="product-price"> <span class="price"> ${{$productFeatured->previousPrice}} </span> <span class="price-before-discount">$ {{$productFeatured->actualPrice}}</span> </div>
              <!-- /.product-price --> 
              
            </div>
            <!-- /.product-info -->
            <div class="cart clearfix animate-effect">
              <div class="action">
                <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">
                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                  </li>
                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                  <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                </ul>
              </div>
              <!-- /.action --> 
            </div>
            <!-- /.cart --> 
          </div>
          <!-- /.product --> 
          
        </div>
        <!-- /.products --> 
      </div>
    @endforeach
  </div>
</section>
<!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 

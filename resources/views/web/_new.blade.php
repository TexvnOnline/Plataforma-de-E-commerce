<div class="tab-content outer-top-xs">

    <div class="tab-pane in active" id="all">
      <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
        @foreach ($productsNew as $productNew)
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> 
                    <a href="detail.html">
                        @foreach ($productNew->images->slice(0, 2) as $image)
                        <img src="{{$image->url}}" class="{{ $loop->first ? '' : 'hover-image' }}" alt=""> 
                        @endforeach
                    </a> 
                  </div>
                  <!-- /.image -->
                  
                  <div class="tag new"><span>{{$productNew->state}}</span></div>
                </div>
                <!-- /.product-image -->
                
                <div class="product-info text-left">
                  <h3 class="name"><a href="detail.html">{{$productNew->name}}</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="product-price"> <span class="price"> ${{$productNew->previousPrice}} </span> <span class="price-before-discount">$ {{$productNew->actualPrice}}</span> </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                      <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                      <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
        <!-- /.home-owl-carousel --> 
      </div>
      <!-- /.product-slider --> 
    </div>

</div>
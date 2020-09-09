
        <section class="section featured-product">
        <div class="row">
        <div class="col-lg-3">
            <h3 class="section-title">{{$category->name}}</h3>
            <ul class="sub-cat">
            @foreach ($category->subcategories as $subcategory)
            <li><a href="#">{{$subcategory->name}}</a></li>
            @endforeach
            </ul>
        </div>
          <div class="col-lg-9">
          <div class="owl-carousel homepage-owl-carousel custom-carousel owl-theme outer-top-xs">
           @foreach ($productsCategory as $productCategory)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">

                  <div class="product-image">
                    <div class="image"> 
                          <a href="detail.html">
                            @foreach ($productCategory->images->slice(0, 2) as $image)
                            <img src="{{$image->url}}" class="{{ $loop->first ? '' : 'hover-image' }}" alt=""> 
                            @endforeach
                          </a>
                          </div>
                    <!-- /.image -->
                    
                    <div class="tag hot"><span>{{$productCategory->state}}</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">{{$productCategory->name}}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> ${{$productCategory->previousPrice}} </span> <span class="price-before-discount">$ {{$productCategory->actualPrice}}</span> </div>
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
          </div>
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
        
        
        
        
<div class="sidebar-widget outer-bottom-small">
    <h3 class="section-title">Special Deals</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        
        
        @foreach ($specialDeals as $specialDeal)
        <div class="item">
            <div class="products special-product">
  
              <div class="product">
                <div class="product-micro">
                  <div class="row product-micro-row">
                    <div class="col col-xs-5">
                      <div class="product-image">
                        <div class="image"> 
                            @foreach ($specialDeal->images->slice(0, 1) as $image)
                            <a href="#"> 
                                <img src="{{$image->url}}" alt=""> 
                            </a>
                            @endforeach  
                        </div>
                        <!-- /.image --> 
                        
                      </div>
                      <!-- /.product-image --> 
                    </div>
                    <!-- /.col -->
                    <div class="col col-xs-7">
                      <div class="product-info">
                        <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                        <!-- /.product-price --> 
                        
                      </div>
                    </div>
                    <!-- /.col --> 
                  </div>
                  <!-- /.product-micro-row --> 
                </div>
                <!-- /.product-micro --> 
                
              </div>
  
            </div>
          </div>
        @endforeach
        


      </div>
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>
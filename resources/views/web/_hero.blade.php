
        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
              @foreach ($carousels as $carousel)
              <div class="item" style="background-image: url({{$carousel->image->url}});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">{{$carousel->header}}</div>
                    <div class="big-text fadeInDown-1"> {{$carousel->text}} </div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$carousel->excerpt}}</span> </div>
                    <div class="button-holder fadeInDown-3"> <a href="{{$carousel->buttonLink}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{$carousel->buttonText}}</a> </div>
                  </div>
                </div> 
              </div>
              @endforeach
            </div>
          </div>
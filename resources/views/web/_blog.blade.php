<section class="section latest-blog outer-bottom-vs">
    <h3 class="section-title">Latest form Blog</h3>
    <div class="blog-slider-container outer-top-xs">
      <div class="owl-carousel blog-slider custom-carousel">

        @foreach ($latestBlogs as $latestBlog)
        <div class="item">
            <div class="blog-post">
              <div class="blog-post-image">
                <div class="image"> <a href="blog.html"><img src="{{$latestBlog->image->url}}" alt=""></a> </div>
              </div>
              <!-- /.blog-post-image -->
              
              <div class="blog-post-info text-left">
                <h3 class="name"><a href="#">{{$latestBlog->name}}</a></h3>
                <span class="info">By {{$latestBlog->user->name}} &nbsp;|&nbsp; {{$latestBlog->updated_at->format('d/m/y')}} </span>
                <p class="text">{{$latestBlog->abstract}}</p>
               </div>
              <!-- /.blog-post-info --> 
              
            </div>
            <!-- /.blog-post --> 
        </div>
        @endforeach
        
        
      </div>
      <!-- /.owl-carousel --> 
    </div>
    <!-- /.blog-slider-container --> 
  </section>
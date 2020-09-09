<div class="sidebar-widget product-tag">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
    <div class="tag-list"> 
        @foreach ($tags as $tag)
        <a class="{{ $loop->first ? 'item active' : 'item' }}" title="Phone" href="category.html">Phone</a>  
        @endforeach
    </div>
      <!-- /.tag-list --> 
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>
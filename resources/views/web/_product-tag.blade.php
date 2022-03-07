<div class="sidebar-widget product-tag">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
    <div class="tag-list"> 
        @foreach ($tags as $tag)
        <a class="{{ $loop->first ? 'item active' : 'item' }}" title="{{$tag->name}}" href="{{route('web.tags',$tag->slug)}}">{{$tag->name}}</a>  
        @endforeach
    </div>
      <!-- /.tag-list --> 
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>
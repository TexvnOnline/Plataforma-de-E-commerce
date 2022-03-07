<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

	    	  @foreach ($categorias as $categoria)
            <div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
	                   {{$categoria->name}}
	                </a>
	            </div><!-- /.accordion-heading -->
	            <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul>
                            @foreach ($categoria->subcategories as $subcategory)
                            <li><a href="{{route('web.category',$subcategory->slug)}}">{{$subcategory->name}}</a></li>
                            @endforeach
	                    </ul>
	                </div><!-- /.accordion-inner -->
	            </div>
	        </div>
            @endforeach

	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
   
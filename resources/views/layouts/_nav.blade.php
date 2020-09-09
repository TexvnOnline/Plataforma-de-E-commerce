
<div class="header-nav animate-dropdown">
  <div class="container">
    <div class="yamm navbar navbar-default" role="navigation">
      <div class="navbar-header">
     <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
     <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="nav-bg-class">
        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
          <div class="nav-outer">
            <ul class="nav navbar-nav">
              <li class="active dropdown"> <a href="home.html">Home</a> </li>

            @foreach ($categorias as $categoria)
            <li class="dropdown yamm mega-menu"> 
                <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$categoria->name}}</a>
            <ul class="dropdown-menu container">
                <li>
                  <div class="yamm-content ">
                    <div class="row">

                        @foreach ($categoria->subcategories as $subcategory)
                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Men</h2>
                            <ul class="links">
                              <li><a href="#">{{$subcategory->name}}</a></li>
                            </ul>
                          </div>
                        @endforeach
                      @if (isset($categoria->image->url))
                      <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{$categoria->image->url}}" alt=""> </div>
                      @endif
                    </div>
                  </div>
                </li>
            </ul>
            </li>
            @endforeach
              
            </ul>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@extends('layouts.web')
@section('content')
    
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Compare</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
    <div class="product-comparison">
		<div>
			<h1 class="page-title text-center heading-title">Product Comparison</h1>
			<div class="table-responsive">
				<table class="table compare-table inner-top-vs">
					<tr>
						<th>Products</th>
						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="marazzo/assets/images/products/p1.jpg">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>

						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="marazzo/assets/images/products/p2.jpg">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>

						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="marazzo/assets/images/products/p4.jpg">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>

						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="marazzo/assets/images/products/p5.jpg">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<th>Price</th>
						<td>
							<div class="product-price">
								<span class="price"> $300.00 </span>
								<span class="price-before-discount">$500.00</span>
							</div>
						</td>

						<td>
							<div class="product-price">
								<span class="price"> $350.00 </span>
								<span class="price-before-discount">$500.00</span>
							</div>
						</td>

						<td>
							<div class="product-price">
								<span class="price"> $400.00 </span>
								<span class="price-before-discount">$500.00</span>
							</div>
						</td>

						<td>
							<div class="product-price">
								<span class="price"> $3600.00 </span>
								<span class="price-before-discount">$500.00</span>
							</div>
						</td>
					</tr>

					<tr>
						<th>Description</th>
						<td><p class="text">Proin semper eros ac posuere ultrices. Nulla quis mi in risus volutpat blandit vestibulum in lorem. In euismod laoreet sapien vel gravida.  Proin sem per eros ac posuere ultrices. Nulla quis mi in risus.<p></td>
						<td><p class="text">Proin semper eros ac posuere ultrices. Nulla quis mi in risus volutpat blandit vestibulum in lorem. In euismod laoreet sapien vel gravida.  Proin sem per eros ac posuere ultrices.<p> </td>
						<td><p class="text">Proin semper eros ac posuere ultrices. Nulla quis mi in risus volutpat blandit vestibulum in lorem. In euismod laoreet sapien vel gravida.<p></td>
						<td><p class="text">Proin semper eros ac posuere ultrices. Nulla quis mi in risus volutpat blandit vestibulum in lorem. In euismod laoreet sapien vel gravida.  Proin sem per eros ac posuere ultrices. Nulla quis mi in risus.<p></td> 
					</tr>

					<tr>
						 <th>Availability</th>
	                     <td><p class="in-stock">In Stock</p></td>
	                     <td><p class="in-stock">In Stock</p></td>
	                     <td><p class="in-stock">In Stock</p></td>
	                     <td><p class="in-stock">In Stock</p></td>
					</tr>

					<tr >
						<th>Remove</th>
						<td class='text-center'><a href="#" class="remove-icon"><i class="fa fa-times"></i></a></td>
						<td class='text-center'><a href="#" class="remove-icon"><i class="fa fa-times"></i></a></td>
						<td class='text-center'><a href="#" class="remove-icon"><i class="fa fa-times"></i></a></td>
						<td class='text-center'><a href="#" class="remove-icon"><i class="fa fa-times"></i></a></td>
					</tr>
				</table>
			</div>
            </div>
		</div>
	</div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->

        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="row our-features-box">
     <div class="container">
      <ul>
        <li>
          <div class="feature-box">
            <div class="icon-truck"></div>
            <div class="content-blocks">We ship worldwide</div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="icon-support"></div>
            <div class="content-blocks">call 
              +1 800 789 0000</div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="icon-money"></div>
            <div class="content-blocks">Money Back Guarantee</div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="icon-return"></div>
            <div class="content">30 days return</div>
          </div>
        </li>
        
      </ul>
    </div>
  </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 

@endsection
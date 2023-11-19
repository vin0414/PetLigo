
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PetLigo - Products</title>
    <meta charset="utf-8">
    <link href="assets/images/petligo.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">


    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
      .radio{
        width:20px;height: 20px;
      }
    </style>
  </head>
  <body>

    <div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
                            <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +63912-123-1234</a> 
							<a href="mailto:petligo2023@gmail.com"><span class="fa fa-paper-plane mr-1"></span> petligo2023@gmail.com</a>
						</p>
					</div>
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
              <p class="mb-0 d-flex">
                <?php if(empty(session()->get('sess_id'))){ ?>
                  <a href="<?=site_url('/sign-in')?>" class="d-flex align-items-center justify-content-center text-white"><span class="fa fa-sign-in"></span>&nbsp;Login</a>
                <?php } else{?>
                  <a href="<?=site_url('/customer/dashboard')?>" class="d-flex align-items-center justify-content-center text-white"><span class="fa fa-dashboard"></span>&nbsp;Dashboard</a>
                <?php } ?>
			    		</p>
		        </div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="/"><img src="assets/images/petligo.png" width="100"/></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="<?=site_url('membership')?>" class="nav-link">Membership</a></li>
	        	<li class="nav-item"><a href="<?=site_url('book')?>" class="nav-link">Book Now</a></li>
	        	<li class="nav-item"><a href="<?=site_url('services')?>" class="nav-link">Services</a></li>
	          <li class="nav-item active"><a href="<?=site_url('products')?>" class="nav-link">Products</a></li>
	          <li class="nav-item"><a href="<?=site_url('blogs')?>" class="nav-link">Blogs</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Products <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
			<div class="container">
        <h3>Featured Products</h3>
          <div class="row">
              <div class="col-12 form-group">
                  <div class="row g-3">
                    <div class="col-lg-3">
                      <select class="form-control" id="product_category">
                        <option value="0">All Category</option>
                        <?php foreach($category as $row): ?>
                          <option value="<?php echo $row['categoryID'] ?>"><?php echo $row['CategoryName'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-lg-9">
                    <input type="search" class="form-control" id="search" placeholder="Search"/>
                    </div>
                  </div>
              </div>
              <div class="col-12 form-group">
                <div class="row g-3">
                  <div class="col-lg-4">
                    <input type="radio" class="btn radio" name="category" id="category" value="All" checked/> <label>ALL</label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" class="btn radio" name="category" id="category" value="Dogs"/> <label>Dogs</label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" class="btn radio" name="category" id="category" value="Cats"/> <label>Cats</label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" class="btn radio" name="category" id="category" value="Small Pets"/> <label>Small Pets</label>
                  </div>
                  <div class="col-lg-8">
                    <a href="cart/view" class="btn-link" style="float:right;"><span class="fa fa-shopping-cart"></span>&nbsp;View Cart</a>
                  </div>
                </div>
              </div>
              <div class="col-12 form-group">
                <div class="row g-3" id="loadResults">
                </div>
              </div>
          </div>
			</div>
		</section>
    <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">PetLigo</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						<ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Latest News</h2>
						<div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url(assets/images/image_1.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url(assets/images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
					</div>
					<div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Home</a></li>
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Works</a></li>
              <li><a href="#" class="py-2 d-block">Blog</a></li>
              <li><a href="#" class="py-2 d-block">Contact</a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Have a Questions?</h2>
						<div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
					</div>
				</div>
				<div class="row mt-5">
          <div class="col-md-12 text-center">

            <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
			</div>
		</footer>

    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script src="assets/js/jquery.timepicker.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/scrollax.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      $(document).ready(function(){
        loadProducts();
        var data = "<?php echo $_GET['error'] ?>";
        if(data!="")
        {
          alert("Unvalid! Please login to continue");
        }
      });
      $('#search').keyup(function(){
        var val = $(this).val();
        $.ajax({
          url:"<?=site_url('/search-products')?>",method:"GET",
          data:{value:val},
          success:function(response)
          {
            if(response==="")
            {
              $('#loadResults').html("<div class='col-12'><center>No Product(s) Available</center></div>");
            }
            else{
              $('#loadResults').html(response);
            }
          }
        });
      });
      function loadProducts()
      {
        $.ajax({
          url:"<?=site_url('/load-products')?>",method:"GET",
          success:function(response)
          {
            if(response==="")
            {
              $('#loadResults').html("<div class='col-12'><center>No Product(s) Available</center></div>");
            }
            else{
              $('#loadResults').html(response);
            }
          }
        });
      }
      $('#product_category').change(function(e)
      {
        e.preventDefault();
        var val = $(this).val();
        $.ajax({
          url:"<?=site_url('/filter-products')?>",method:"GET",
          data:{value:val},
          success:function(response)
          {
            if(response==="")
            {
              $('#loadResults').html("<div class='col-12'><center>No Product(s) Available</center></div>");
            }
            else{
              $('#loadResults').html(response);
            }
          }
        });
      });
      $(function() {
        $('input:radio[name="category"]').change(function() {
            var val = $(this).val();
            $.ajax({
              url:"<?=site_url('/filter-category-products')?>",method:"GET",
              data:{value:val},
              success:function(response)
              {
                if(response==="")
                {
                  $('#loadResults').html("<div class='col-12'><center>No Product(s) Available</center></div>");
                }
                else{
                  $('#loadResults').html(response);
                }
              }
            });
        });
    });
  </script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PetLigo - Subscription</title>
    <meta charset="utf-8">
    <link href="/assets/images/petligo.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="/assets/css/animate.css">
    
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">


    <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/assets/css/jquery.timepicker.css">

    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/style.css">
  </head>
  <body>

    <div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
                            <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> 0905-768-1413</a> 
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
	    	<a class="navbar-brand" href="/"><img src="/assets/images/petligo.png" width="100"/></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="<?=site_url('membership')?>" class="nav-link">Membership</a></li>
	        	<li class="nav-item"><a href="<?=site_url('book')?>" class="nav-link">Book Now</a></li>
	            <li class="nav-item"><a href="<?=site_url('products')?>" class="nav-link">Shop Now</a></li>
                <li class="nav-item active"><a href="javascript:void(0);" class="nav-link">Subscribe</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('/assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Subscription <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Subscription</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section bg-light">
    	<div class="container">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="row g-3" id="frmShip" action="<?=base_url('cart/save-order')?>">
                        <div class="col-12 form-group">
                            <div class="row g-3">
                                <div class="col-lg-8">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>Tel/Cell No</label>
                                    <input type="phone" class="form-control" maxlength="11" minlength="11" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" name="firstname" required/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Surname</label>
                                    <input type="text" class="form-control" name="surname" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label>Building/Apartment/Suite</label>
                            <input type="text" class="form-control" name="apartment"/>
                        </div>
                        <div class="col-12 form-group">
                            <label>Subdivision/Village/Brgy</label>
                            <input type="text" class="form-control" name="street" required/>
                        </div>
                        <div class="col-12 form-group">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>Province</label>
                                    <input type="text" class="form-control" name="province" value="Cavite" required/>
                                </div>
                                <div class="col-lg-2">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" maxlength="4" minlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="zipcode" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
    	</div>
    </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/assets/js/popper.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/jquery.easing.1.3.js"></script>
  <script src="/assets/js/jquery.waypoints.min.js"></script>
  <script src="/assets/js/jquery.stellar.min.js"></script>
  <script src="/assets/js/jquery.animateNumber.min.js"></script>
  <script src="/assets/js/bootstrap-datepicker.js"></script>
  <script src="/assets/js/jquery.timepicker.min.js"></script>
  <script src="/assets/js/owl.carousel.min.js"></script>
  <script src="/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="/assets/js/scrollax.min.js"></script>
  <script src="/assets/js/main.js"></script>
  </body>
</html>
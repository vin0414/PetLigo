
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PetLigo - Sign-In</title>
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
  </head>
  <body>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="/"><img src="assets/images/petligo.png" width="100"/></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="<?=site_url('book')?>" class="nav-link">Book Now</a></li>
	        	<li class="nav-item"><a href="<?=site_url('products')?>" class="nav-link">Products</a></li>
	            <li class="nav-item active"><a href="<?=site_url('sign-in')?>" class="nav-link">Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <section class="ftco-section bg-light">
		<div class="container">
            <div class="row g-3">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h4>Welcome Back</h4>
                            </center>
                            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                              <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('fail'); ?>
                              </div>
                            <?php endif; ?>
                            <form method="post" class="row g-3" id="frmLogin" action="<?=base_url('check-account')?>">
                                <div class="col-12 form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" required/>
                                </div>
                                <div class="col-12 form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required/>
                                </div>
                                <div class="col-12 form-group">
                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
                                <div class="col-12 form-group">
                                    <button type="submit" class="btn btn-danger" id="btnLogin">Sign-In</button>
                                </div>
                                <div class="col-12">
                                    <label>Don't have an account? Register <a href="/register">here</a></label>
                                </div>
                                <div class="col-12">
                                    <label>Forgot Password? Click <a href="/forgot-password">here</a></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div> 
		</div>
	</section>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="assets/js/google-map.js"></script>
  <script src="assets/js/main.js"></script>
  <script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
  </script>
  </body>
</html>
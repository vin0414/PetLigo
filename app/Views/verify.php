
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Verification</title>
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
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="/"><img src="/assets/images/petligo.png" width="100"/></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	            <li class="nav-item active"><a href="javascript:void(0);" class="nav-link">Account Verification</a></li>
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
                                <img src="/assets/images/petligo.png" width="100"/>
                            </center>
                            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                              <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('fail'); ?>
                              </div>
                            <?php endif; ?>
                            <form method="post" class="row g-3" id="frmRegister" action="<?=base_url('verify')?>">
                                <input type="hidden" name="customerID" value="<?=$customer['customerID']?>"/>
                                <div class="col-12 form-group text-center">
                                    <label>Account Information</label>
                                    <h5><?=$customer['Fullname']?></h5>
                                    <h6><?php echo session()->get('customer_email')?></h6>
                                </div>
                                <div class="col-12 form-group">
                                    <label>Enter OTP</label>
                                    <input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                                </div>
                                <div class="col-12 form-group">
                                    <button type="submit" class="btn btn-primary form-control" id="btnLogin">Update Account</button>
                                </div>
                                <div class="col-12">
                                    <label>Not <?php echo session()->get('customer_email') ?>?<a href="/sign-out">Sign-out</a></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
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
              <a class="img mr-4 rounded" style="background-image: url(/assets/images/image_1.jpg);"></a>
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
              <a class="img mr-4 rounded" style="background-image: url(/assets/images/image_2.jpg);"></a>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="/assets/js/google-map.js"></script>
  <script src="/assets/js/main.js"></script>
  </body>
</html>
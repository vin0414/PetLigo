
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PetLigo</title>
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
	    	<a class="navbar-brand" href="/"><img src="assets/images/petligo.png" width="100"/></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="<?=site_url('membership')?>" class="nav-link">Membership</a></li>
	        	<li class="nav-item"><a href="<?=site_url('book')?>" class="nav-link">Book Now</a></li>
	        	<li class="nav-item"><a href="<?=site_url('services')?>" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="<?=site_url('products')?>" class="nav-link">Products</a></li>
	          <li class="nav-item"><a href="<?=site_url('stories')?>" class="nav-link">Stories</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <div class="hero-wrap js-fullheight" style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-11 ftco-animate text-center">
          	<h1 class="mb-4">Highest Quality Care For Pets You'll Love </h1>
            <p><a href="<?=site_url('services')?>" class="btn btn-danger mr-md-4 py-3 px-4">Learn more <span class="ion-ios-arrow-forward"></span></a></p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light ftco-no-pt ftco-intro">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services active text-center">
              <div class="icon d-flex align-items-center justify-content-center">
            		<span class="flaticon-grooming"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Full-Groom</h3>
                <p>Comprehensive service that takes care of all the grooming needs of your furry companions. This grooming service is essential for maintaining your pet's health and appearance as it includes not just a haircut but also various hygiene-related services.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services active text-center">
              <div class="icon d-flex align-items-center justify-content-center">
            		<span class="flaticon-grooming"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Standard Clips</h3>
                <p>A standard clip is a popular grooming style for pets that involves trimming their entire coat to a uniform length. This style is commonly used for pets where the goal is to maintain a neat and tidy appearance without any specific breed-specific trims or custom styles. </p>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services active text-center">
              <div class="icon d-flex align-items-center justify-content-center">
            		<span class="flaticon-grooming"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Style Clips</h3>
                <p>Style clips for pets are a grooming service that focuses on providing a fashionable and trendy appearance for your furry companions. Whether you have a dog, cat, or any other pet, style clips allow you to enhance their natural charm and express their personality through a customized haircut or grooming style.</p>
              </div>
            </div>      
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-5 d-flex">
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(assets/images/about-1.jpg);">
    				</div>
    			</div>
    			<div class="col-md-7 pl-md-5 py-md-5">
    				<div class="heading-section pt-md-5">
	            <h2 class="mb-4">Why Choose Us?</h2>
    				</div>
    				<div class="row">
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
	    					<div class="text pl-3">
	    						<h4>Care Advices</h4>
	    					</div>
	    				</div>
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
	    					<div class="text pl-3">
	    						<h4>Customer Supports</h4>
	    					</div>
	    				</div>
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
	    					<div class="text pl-3">
	    						<h4>Emergency Services</h4>
	    					</div>
	    				</div>
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
	    					<div class="text pl-3">
	    						<h4>Veterinary Help</h4>
	    					</div>
	    				</div>
	    			</div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-counter" id="section-counter" style="background-color: #dc3545;">
    	<div class="container">
				<div class="row">
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="50">0</strong>
              </div>
              <div class="text">
              	<span>Customer</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="8500">0</strong>
              </div>
              <div class="text">
              	<span>Professionals</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="20">0</strong>
              </div>
              <div class="text">
              	<span>Products</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="50">0</strong>
              </div>
              <div class="text">
              	<span>Pets Hosted</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>
    <section class="ftco-section testimony-section" style="background-image: url('assets/images/bg_2.jpg');">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Happy Clients &amp; Feedbacks</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <?php foreach($feed as $row): ?>
              <div class="item">
                <div class="testimony-wrap py-4">
                	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4"><?php echo $row->Message ?></p>
                    <div class="d-flex align-items-center">
                    	<div class="pl-3">
		                    <p class="name"><?php echo $row->customerName ?></p>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
	<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Pets Gallery</h2>
          </div>
        </div>
				<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(assets/images/gallery-1.jpg);">
            	<a href="assets/images/gallery-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(assets/images/gallery-2.jpg);">
            	<a href="assets/images/gallery-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(assets/images/gallery-3.jpg);">
            	<a href="assets/images/gallery-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(assets/images/gallery-4.jpg);">
            	<a href="assets/images/gallery-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(assets/images/gallery-5.jpg);">
            	<a href="assets/images/gallery-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(assets/images/gallery-6.jpg);">
            	<a href="assets/images/gallery-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            </div>
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Latest news from our blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <?php foreach($blog as $row): ?>
          <?php $imgURL = "/Blogs/".$row->Image; ?>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="?=site_url('post/')?><?php echo $row->blogTitle ?>" class="block-20 rounded" style="background-image: url(<?php echo $imgURL ?>);">
              </a>
              <div class="text p-4">
              	<div class="meta mb-2">
                  <div><a href="#"><?php echo $row->Date ?></a></div>
                  <div><a href="#"><?php echo $row->Fullname ?></a></div>
                </div>
                <h3 class="heading"><a href="<?=site_url('post/')?><?php echo $row->blogTitle ?>"><?php echo $row->blogTitle ?></a></h3>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">PetLigo</h2>
						<p>Pet Grooming Services</p>
						<ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="https://www.facebook.com/PetLigoCaviteCity/" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="https://www.instagram.com/explore/locations/111949591369146/petligo---grooming-services/" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Latest News</h2>
            <?php foreach($blog as $row): ?>
            <?php $imgURL = "/Blogs/".$row->Image; ?>
						<div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url(<?php echo $imgURL ?>);"></a>
              <div class="text">
                <h3 class="heading"><a href="#"><?php echo $row->blogTitle ?></a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span><?php echo $row->Date ?></a></div>
                  <div><a href="#"><span class="icon-person"></span><?php echo $row->Fullname ?></a></div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
					</div>
					<div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<ul class="list-unstyled">
              <li><a href="/" class="py-2 d-block">Home</a></li>
              <li><a href="/membership" class="py-2 d-block">Membership</a></li>
              <li><a href="/services" class="py-2 d-block">Services</a></li>
              <li><a href="/products" class="py-2 d-block">Products</a></li>
              <li><a href="/stories" class="py-2 d-block">Stories</a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Have a Questions?</h2>
						<div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map"></span><span class="text">452 Padre Pio, Santa Cruz, Cavite City, 4100 Cavite</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">0905-768-1413</span></a></li>
                <li><a href="mailto:petligo2023@gmail.com"><span class="icon fa fa-paper-plane"></span><span class="text">petligo2023@gmail.com</span></a></li>
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
  <script>
      (function(d,t) {
        var BASE_URL="https://app.chatwoot.com";
        var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=BASE_URL+"/packs/js/sdk.js";
        g.defer = true;
        g.async = true;
        s.parentNode.insertBefore(g,s);
        g.onload=function(){
          window.chatwootSDK.run({
            websiteToken: '1DMGT6Exq5gBebA6trkfHKKq',
            baseUrl: BASE_URL
          })
        }
      })(document,"script");
    </script>
    
    
  </body>
</html>
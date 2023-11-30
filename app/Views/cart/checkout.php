
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PetLigo - Shipping</title>
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
                <li class="nav-item"><a href="<?=site_url('products')?>" class="nav-link">Continue Shopping</a></li>
	            <li class="nav-item active"><a href="javascript:void(0);" class="nav-link">Customer Details</a></li>
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
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cart<i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Customer Details</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
			<div class="container">
                <div class="row g-3">
                    <div class="col-12 form-group">
                        <p><b>Attention Valued Customers,</b></p>
                        <p>We would like to inform you that our shipping services are currently available only for selected cities. As of now,
                            we can facilitate shipments exclusively to the following locations: Kawit, Cavite City, Rosario and Noveleta.
                        </p>
                    </div>
                    <div class="col-12 form-group">
                        <label><b>Order Item(s)</b></label>
                        <table class="table table-striped">
                            <thead>
                                <th><span class="fa fa-list"></span></th>
                                <th>Item(s)</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Sub-Total</th>
                            </thead>
                            <tbody>
                                <?php foreach($items as $row): ?>
                                    <tr>
                                        <td><button type="button" class="btn btn-default btn-sm delete" value="<?php echo $row->orderID ?>">
                                          <span class="fa fa-trash"></span>&nbsp;Remove</button>
                                        </td>
                                        <td><?php echo $row->productName ?></td>
                                        <td><?php echo $row->Qty ?></td>
                                        <td style="text-align: right;"><?php echo number_format($row->price,2) ?></td>
                                        <td style="text-align: right;"><?php echo number_format($row->price*$row->Qty,2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach($total as $row): ?>
                                    <tr style="font-weight:bold;">
                                        <td></td><td colspan='3'>Total</td><td style="text-align: right;"><?php echo number_format($row->total,2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 form-group">
                        <label><b>Customer Details</b></label>
                    </div>
                    <div class="col-12 form-group">
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
  <script>
    $(document).on('click','.delete',function(e)
    {
      e.preventDefault();
      var confirmation = confirm("Do you want to remove this item?");
      if(confirmation)
      {
        var val = $(this).val();
        $.ajax({
          url:"<?=site_url('remove-item')?>",method:"POST",
          data:{value:val},
          success:function(response)
          {
            if(response==="success")
            {
              location.reload();
            }
            else{
              alert(response);
            }
          }
        });
      }
    });
  </script>
  </body>
</html>
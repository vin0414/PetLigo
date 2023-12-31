
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Profile</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="/assets/images/petligo.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="/assets/images/petligo.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/assets/images/petligo.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->/
		<link rel="stylesheet" type="text/css" href="/resources/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/resources/vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="/resources/src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="/resources/src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="/resources/vendors/styles/style.css" />
	</head>
	<body>
		<div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="/assets/images/petligo.png" alt="" width="100"/>
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div>

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
			</div>
			<div class="header-right">
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<span class="icon-copy dw dw-user"></span>
							</span>
							<span class="user-name"><?php echo session()->get('sess_fullname') ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="<?=site_url('customer/profile')?>"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="<?=site_url('/sign-out')?>"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="">
					<img src="/assets/images/petligo.png" alt="" class="dark-logo" width="100"/>
					<img
						src="/assets/images/petligo.png"
						alt="" width="100"
						class="light-logo"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li class="dropdown">
							<a href="<?=site_url('customer/dashboard')?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-grid"></span
								><span class="mtext">Dashboard</span>
							</a>
						</li>
                        <li class="dropdown">
							<a href="<?=site_url('products')?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-shop"></span>
                                <span class="mtext">Shop Now</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('customer/reservations')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-calendar-1"></span
								><span class="mtext"> Reservations </span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('customer/orders')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-shopping-cart"></span
								><span class="mtext">Orders</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('customer/pets')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-dog"></span
								><span class="mtext">My Pets</span>
							</a>
						</li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<div class="sidebar-small-cap">Extra</div>
						</li>
                        <li>
							<a href="<?=site_url('customer/profile')?>" class="active dropdown-toggle no-arrow">
								<span class="micon dw dw-user2"></span
								><span class="mtext">Profile</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20">
				<?php if(!empty(session()->getFlashdata('success'))) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata('success'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<?php if(!empty(session()->getFlashdata('fail'))) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata('fail'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<div class="row g-3">
					<div class="col-lg-8">
						<div class="card-box">
							<div class="card-header">Personal Information</div>
							<div class="card-body">
								<form method="POST" class="row g-3" id="frmCustomer">
									<div class="col-12 form-group">
										<label>Complete Name</label>
										<input type="text" class="form-control" value="<?php echo session()->get('sess_fullname') ?>"/>
									</div>
									<div class="col-12 form-group">
										<label>Complete Address</label>
										<textarea class="form-control" id="address" name="address" required></textarea>
									</div>
									<div class="col-12 form-group">
										<label>Email Address</label>
										<input type="email" class="form-control" name="email" id="email" required/>
									</div>
									<div class="col-12 form-group">
										<label>Contact No</label>
										<input type="phone" class="form-control" maxlength="11" minlength="11" id="phone" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"required/>
									</div>
									<div class="col-12 form-group">
										<button type="submit" class="btn btn-primary" id="btnSave">Save Changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card-box">
							<div class="card-header">Change Password</div>
							<div class="card-body">
								<form method="POST" class="row g-3" id="frmChange" action="<?=base_url('customer-password')?>">
									<div class="col-12 form-group">
										<label>New Password</label>
										<input type="password" class="form-control" id="new_password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
									</div>
									<div class="col-12 form-group">
										<label>Re-Type Password</label>
										<input type="password" class="form-control" id="retype_password" name="retype_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
									</div>
									<div class="col-12 form-group">
										<input type="checkbox" onclick="myFunction()"> Show Password
									</div>
									<div class="col-12 form-group">
										<button type="submit" class="btn btn-primary" id="btnSave">Save Changes</button>
									</div>
								</form>
							</div>
						</div>
						<br/>
						<div class="card-box">
							<div class="card-header">Upload Photo</div>
							<div class="card-body">
								<form method="post" class="row g-3" id="frmProfile" enctype="multipart/form-data">
									<div class="col-12 form-group">
										<center>
										<img src="/profile/profile.png" id="profileImg" style="border:1px solid #C0C0C0;" width="100%"/>
										</center>
									</div>
									<div class="col-12 form-group">
										<input type="file" class="form-control" name="file" accept="image/png, image/gif, image/jpeg" onChange="displayImage(this)"/>
									</div>
									<div class="col-12 form-group">
										<input type="submit" class="form-control btn btn-primary text-white" id="Save" value="Upload"/>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="/resources/vendors/scripts/core.js"></script>
		<script src="/resources/vendors/scripts/script.min.js"></script>
		<script src="/resources/vendors/scripts/process.js"></script>
		<script src="/resources/vendors/scripts/layout-settings.js"></script>
		<script src="/resources/src/plugins/apexcharts/apexcharts.min.js"></script>
		<script src="/resources/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="/resources/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="/resources/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="/resources/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			$(document).ready(function()
			{
				fetch();
			});
			function fetch()
			{
				$.ajax({
					url:"<?=site_url('fetch-information')?>",type:"GET",
					dataType:"json",
					success:function(data)
					{
						$('#address').val(data["Address"]);
						$('#phone').val(data["Contact"]);
						$('#email').val(data["Email"]);
					}
				});
			}
			function myFunction() {
            var x = document.getElementById("new_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var xx = document.getElementById("retype_password");
            if (xx.type === "password") {
                xx.type = "text";
            } else {
                xx.type = "password";
            }
        }
		function displayImage(e) {
          if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              document.querySelector('#profileImg').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
          }
        }
		$('#frmProfile').on('submit',function(evt)
          {
              evt.preventDefault();
              $.ajax({
                    url:"<?=site_url('upload')?>",method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        $('#Save').attr("disabled","disabled");
                        $('#frmProfile').css("opacity",".5");
                    },
                    success:function(data)
                    {
                        if(data==="Success")
                        {
                            $('#frmProfile')[0].reset();
                            Swal.fire({
                              icon: 'success',
                              title: 'Great!',
                              text: 'Successfully updated!',
                              confirmButtonText: 'Continue',
                            }).then((result) => {
                              /* Read more about isConfirmed, isDenied below */
                              if (result.isConfirmed) {
                                    window.location.href="<?= site_url('customer/profile');?>";
                              } 
                            });
                        }
                        else
                        {
                            Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: data
                            });
                        }
                        $('#frmProfile').css("opacity","");
                        $("#Save").removeAttr("disabled");
                    }
                });
          });

		  $('#btnSave').on('click',function(e)
		  {
			e.preventDefault();
			var data = $('#frmCustomer').serialize();
			$.ajax({
				url:"<?=site_url('save-info')?>",method:"POST",
				data:data,success:function(response)
				{
					if(response==="success")
					{
						Swal.fire({
                              icon: 'success',
                              title: 'Great!',
                              text: 'Successfully saved'
                            });
					}
					else
					{
						Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: response
                            });
					}
				}
			});
		  });
		</script>
	</body>
</html>

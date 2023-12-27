
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Login - PetLigo</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="assets/images/petligo.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="assets/images/petligo.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="assets/images/petligo.png"
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
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="resources/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="resources/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="resources/vendors/styles/style.css" />
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="<?=site_url('/auth')?>">
						<img src="assets/images/petligo.png" alt="" width="100"/>
					</a>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="resources/vendors/images/login-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary"><img src="assets/images/petligo.png" alt="" width="100"/></h2>
							</div>
							<?php if(!empty(session()->getFlashdata('fail'))) : ?>
								<div class="alert alert-danger" role="alert">
									<?= session()->getFlashdata('fail'); ?>
								</div>
							<?php endif; ?>
							<form method="POST" action="<?=base_url('check')?>">
								<div class="input-group custom">
									<input type="text" name="username"
										class="form-control form-control-lg"
										placeholder="Username" required/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="password" name="password"
										class="form-control form-control-lg"
										placeholder="**********" id="password" required/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="col-12 form-group">
                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="resources/vendors/scripts/core.js"></script>
		<script src="resources/vendors/scripts/script.min.js"></script>
		<script src="resources/vendors/scripts/process.js"></script>
		<script src="resources/vendors/scripts/layout-settings.js"></script>
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

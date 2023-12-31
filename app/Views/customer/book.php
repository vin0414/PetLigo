
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Book</title>

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
							<a href="javascript:void(0);" class="active dropdown-toggle no-arrow">
								<span class="micon dw dw-calendar-8"></span
								><span class="mtext">Book Now</span>
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
							<a href="<?=site_url('customer/profile')?>" class="dropdown-toggle no-arrow">
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
                <form method="POST" class="row g-3" id="frmReserve">
                    <div class="col-lg-8">
                        <div class="card-box">
                            <div class="card-header">Customer Details</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12 form-group">
                                        <div class="row g-3">
                                            <div class="col-lg-6">
                                                <label>Date</label>
                                                <input type="date" class="form-control" name="date" id="date" required/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Time</label>
                                                <select class="form-control" name="time" id="time" required>
													<option value="">Choose</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label>Customer's Fullname</label>
                                        <input type="text" class="form-control" name="fullname" required/>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="row g-3">
                                            <div class="col-lg-6">
                                                <label>Contact No</label>
                                                <input type="phone" class="form-control" maxlength="11" minlength="11" id="phone" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control" name="email" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label>Customer's Address</label>
                                        <textarea class="form-control" name="address" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="card-header">Services</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12 form-group">
                                        <label>Pet's Name</label>
                                        <select class="form-control custom-select2" style="width:100%;" name="pet" required>
                                            <option value="">Choose</option>
                                            <?php foreach($pets as $row): ?>
                                                <option value="<?php echo $row['petsID'] ?>"><?php echo $row['Name'] ?> (<?php echo $row['Breed'] ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <table class="table table-bordered hover nowrap">
                                            <tbody>
                                                <?php foreach($services as $row): ?>
                                                    <tr>
                                                        <td><?php echo $row->Description ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br/>
                        <div class="card-box">
                            <div class="card-header">Payment</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <input type="hidden" name="services" value="Ala Carte"/>
                                    <div class="col-12 form-group">
                                        <label>Payment Options</label>
                                        <div class="col-12">
                                            <input type="radio" name="payment" value="Gcash" style="width:20px;height:15px;" checked/>&nbsp;<label>Gcash</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="radio" name="payment" value="Cash" style="width:20px;height:15px;"/>&nbsp;<label>Cash</label>
                                        </div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <button type="submit" class="btn btn-primary" id="btnSave">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
		<!-- js -->
		<script src="/resources/vendors/scripts/core.js"></script>
		<script src="/resources/vendors/scripts/script.min.js"></script>
		<script src="/resources/vendors/scripts/process.js"></script>
		<script src="/resources/vendors/scripts/layout-settings.js"></script>
		<script src="/resources/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="/resources/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="/resources/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="/resources/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
        <script src="/resources/vendors/scripts/datatable-setting.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			$(document).ready(function()
			{
				today();
			});
			function today()
			{
				var date = new Date(); // Now
				date.setDate(date.getDate());
				$('#date').attr('min',convert(date));
			}
			function convert(str) 
			{
				var date = new Date(str),
				mnth = ("0" + (date.getMonth() + 1)).slice(-2),
				day = ("0" + date.getDate()).slice(-2);
				return [date.getFullYear(), mnth, day].join("-");
			}
			$('#btnSave').on('click',function(e)
			{
				e.preventDefault();
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to continue?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes"
					}).then((result) => {
					if (result.isConfirmed) 
					{
						var data = $('#frmReserve').serialize();
						$.ajax({
							url:"<?=site_url('save-book')?>",method:"POST",
							data:data,
							success:function(response)
							{
								if(response==="success")
								{
									window.location.href="<?=site_url('customer/reservations')?>";	
								}
								else
								{
									Swal.fire({
										title: "Invalid",
										text: response,
										icon: "warning"
										});
								}
							}
						});
					}
				});
			});
			$('#date').change(function()
			{
				$('#time').find('option').not(':first').remove();
				var date = $(this).val();
				$.ajax({
					url:"<?=site_url('get-available-time')?>",method:"GET",
					data:{date:date},
					success:function(response)
					{
						if(response==="")
						{
							Swal.fire({
								title: "Sorry",
								text: "Full booked, Please select other dates",
								icon: "info"
								});
						}
						else
						{
							$('#time').append(response);
						}
					}
				});
			});
		</script>
	</body>
</html>

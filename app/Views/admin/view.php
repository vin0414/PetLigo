
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>PetLigo - Reservation</title>

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
							<a class="dropdown-item" href="<?=site_url('admin/profile')?>"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="<?=site_url('/logout')?>"
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
							<a href="<?=site_url('admin/dashboard')?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('admin/reservations')?>" class="dropdown-toggle">
								<span class="micon dw dw-calendar-1"></span
								><span class="mtext"> Reservation</span>
							</a>
							<ul class="submenu">
								<li><a href="<?=site_url('admin/view-reservation')?>" class="active">Manage Reservation</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('admin/orders')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-shopping-cart"></span
								><span class="mtext">Orders</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('admin/products')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-clipboard"></span
								><span class="mtext">Products</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('admin/membership')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-user-13"></span
								><span class="mtext">Membership</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('admin/blogs')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat-12"></span><span class="mtext">Blogs</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('admin/feedback')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat"></span><span class="mtext">Feedback</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?=site_url('admin/reports')?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-pie-chart"></span
								><span class="mtext">Reports</span>
							</a>
						</li>						
						<li class="dropdown">
							<a href="<?=site_url('admin/maintenance')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-settings"></span
								><span class="mtext">Maintenance</span>
							</a>
						</li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<div class="sidebar-small-cap">Extra</div>
						</li>
                        <li>
							<a href="<?=site_url('admin/profile')?>" class="dropdown-toggle no-arrow">
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
				<div class="card-box">
					<div class="card-header">
                        <span class="micon dw dw-calendar-1"></span>&nbsp;Reservation
                        <a href="<?=site_url('admin/reservations')?>" style="float:right;"><span class="dw dw-left-arrow1"></span>&nbsp;Back</a>
                    </div>
                    <div class="card-body">
                        <table class="data-table table stripe hover nowrap">
							<thead>
                                <th>Trxn No</th>
								<th>Date</th>
								<th>Time</th>
								<th>Services</th>
								<th>Charge</th>
								<th>Payment Method</th>
								<th>Status</th>
								<th>Remarks</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php foreach($reserve as $row): ?>
									<tr>
										<td><?php echo $row->Code ?></td>
										<td><?php echo $row->Date ?></td>
										<td><?php echo $row->Time ?></td>
										<td><?php echo $row->servicesName ?></td>
										<td><?php echo number_format($row->TotalAmount,2) ?></td>
										<td><?php echo $row->payment ?></td>
										<td>
											<?php if($row->Status==0){ ?>
												<span class="badge bg-warning text-white">Book</span>
											<?php }else if($row->Status==1) {?>
												<span class="badge bg-primary text-white">Reserved</span>
											<?php }else if($row->Status==2){ ?>
												<span class="badge bg-danger text-white">Cancelled</span>
											<?php }else{ ?>
												<span class="badge bg-success text-white">Served</span>
											<?php } ?>
										</td>
										<td><?php echo $row->Remarks ?></td>
										<td>
											<div class="dropdown">
												<a
													class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
													href="#"
													role="button"
													data-toggle="dropdown"
												>
													<i class="dw dw-more"></i>
												</a>
												<div
													class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
												>
												<?php if($row->servicesName=="Ala Carte"){ ?>
													<?php if($row->Status==0){ ?>
														<button class="dropdown-item view" value="<?php echo $row->Code ?>"><i class="dw dw-eye"></i> View Orders</button>
														<button class="dropdown-item accept" value="<?php echo $row->reservationID ?>"><i class="dw dw-check"></i> Accept</button>
													<?php }else if($row->Status==1) {?>
														<button class="dropdown-item done" value="<?php echo $row->reservationID ?>"><i class="dw dw-check"></i> Done</button>
														<?php if($row->Remarks=="PENDING") { ?>
														<button class="dropdown-item tag" value="<?php echo $row->reservationID ?>"><i class="dw dw-check"></i> Tag as Paid</button>
														<?php } ?>
													<?php }else if($row->Status==2){ ?>
														<button class="dropdown-item view" value="<?php echo $row->Code ?>"><i class="dw dw-eye"></i> View Orders</button>
													<?php }else{ ?>
														<button class="dropdown-item view" value="<?php echo $row->Code ?>"><i class="dw dw-eye"></i> View Orders</button>
													<?php } ?>
												<?php }else { ?>
													<?php if($row->Status==0){ ?>
														<button class="dropdown-item accept" value="<?php echo $row->reservationID ?>"><i class="dw dw-check"></i> Accept</button>
													<?php }else if($row->Status==1) {?>
														<button class="dropdown-item done" value="<?php echo $row->reservationID ?>"><i class="dw dw-check"></i> Done</button>
														<?php if($row->Remarks=="PENDING") { ?>
														<button class="dropdown-item tag" value="<?php echo $row->reservationID ?>"><i class="dw dw-check"></i> Tag as Paid</button>
														<?php } ?>
													<?php }else if($row->Status==2){ ?>
													<?php }else{ ?>
													<?php } ?>
												<?php } ?>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myLargeModalLabel">
							Order(s)
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<div id="result"></div>
					</div>
				</div>
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
			$(document).on('click','.view',function()
			{
				var val = $(this).val();
				$.ajax({
					url:"<?=site_url('view-services')?>",method:"GET",
					data:{value:val},
					success:function(response)
					{
						$('#viewModal').modal('show');
						$('#result').html(response);
					}
				});
			});
			$(document).on('click','.tag',function()
			{
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to tag as paid this reservation?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes"
					}).then((result) => {
					if (result.isConfirmed) 
					{
						var val = $(this).val();
						$.ajax({
							url:"<?=site_url('paid-reservation')?>",method:"POST",
							data:{value:val},
							success:function(response)
							{
								if(response==="success")
								{
									location.reload();
								}
								else
								{
									alert(response);
								}
							}
						});
					}
				});
			});

			$(document).on('click','.accept',function()
			{
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to accept this reservation?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes"
					}).then((result) => {
					if (result.isConfirmed) 
					{
						var val = $(this).val();
						$.ajax({
							url:"<?=site_url('accept-reservation')?>",method:"POST",
							data:{value:val},
							success:function(response)
							{
								if(response==="success")
								{
									location.reload();
								}
								else
								{
									alert(response);
								}
							}
						});
					}
				});
			});

			$(document).on('click','.done',function()
			{
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to tag as 'Done' this reservation?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes"
					}).then((result) => {
					if (result.isConfirmed) 
					{
						var val = $(this).val();
						$.ajax({
							url:"<?=site_url('done-reservation')?>",method:"POST",
							data:{value:val},
							success:function(response)
							{
								if(response==="success")
								{
									location.reload();
								}
								else
								{
									alert(response);
								}
							}
						});
					}
				});
			});
		</script>
	</body>
</html>

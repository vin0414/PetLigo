
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>PetLigo - Maintenance</title>

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
							<a href="<?=site_url('admin/reservations')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-calendar-1"></span
								><span class="mtext"> Reservations </span>
							</a>
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
							<a href="<?=site_url('admin/maintenance')?>" class="dropdown-toggle active no-arrow">
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
				<?php if(!empty(session()->getFlashdata('success'))) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata('success'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<div class="card-box">
					<div class="card-header">Maintenance
						<div class="dropdown" style="float:right;margin-left:10px;">
							<a href="<?=site_url('back-up')?>" class="btn font-24 p-0 line-height-1 no-arrow dropdown-toggle"><span class="icon-copy dw dw-download"></span> Back-Up</a>
						</div>
						<div class="dropdown" style="float:right;">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown"><span class="icon-copy dw dw-add"></span> New</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="<?=site_url('admin/new-account')?>"><i class="dw dw-add-user"></i> Account</a>
								<a class="dropdown-item" href="<?=site_url('admin/new-services')?>"><i class="dw dw-add"></i> Services</a>
								<a class="dropdown-item" href="<?=site_url('admin/fee')?>"><i class="dw dw-add"></i> Membership Fee</a>
								<a class="dropdown-item btnCategory" href="javascript:void(0);" id="btnCategory"><i class="dw dw-add"></i> Category</a>
							</div>
						</div>
					</div>
                    <div class="card-body">
                        <div class="tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-blue" data-toggle="tab" href="#home" role="tab" aria-selected="true">User Management</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-blue" data-toggle="tab" href="#services" role="tab" aria-selected="false">Services</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link text-blue" data-toggle="tab" href="#membership" role="tab" aria-selected="false">Membership</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link text-blue" data-toggle="tab" href="#category" role="tab" aria-selected="false">Categories</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <br/>
                                    <table class="data-table table stripe hover nowrap">
                                        <thead>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($account as $row): ?>
                                                <?php if($row->Status==1){ ?>
                                                <tr>
                                                    <td><?php echo $row->username ?></td>
                                                    <td><?php echo $row->Fullname ?></td>
                                                    <td><?php echo $row->systemRole ?></td>
                                                    <td><span class="badge bg-success text-white">Active</span></td>
                                                    <td>
                                                        <a href="<?=site_url('admin/edit/')?><?php echo $row->accountID ?>"><span class="icon-copy dw dw-edit-1"></span> Edit</a>
                                                    </td>
                                                </tr>
                                                <?php }else{ ?>
                                                <tr>
                                                    <td><?php echo $row->username ?></td>
                                                    <td><?php echo $row->Fullname ?></td>
                                                    <td><?php echo $row->systemRole ?></td>
                                                    <td><span class="badge bg-danger text-white">Inactive</span></td>
                                                    <td>
                                                    	<a href="<?=site_url('admin/edit/')?><?php echo $row->accountID ?>"><span class="icon-copy dw dw-edit-1"></span> Edit</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade show" id="services" role="tabpanel">
									<br/>
									<table class="data-table table stripe hover nowrap">
										<thead>
											<th>Category</th>
											<th>Types</th>
											<th>Description</th>
											<th>Charges</th>
											<th>Action</th>
										</thead>
										<tbody>
											<?php foreach($services as $row): ?>
												<tr>
													<td><?php echo $row->Category ?></td>
													<td><?php echo $row->serviceType ?></td>
													<td><?php echo $row->Description ?></td>
													<td><?php echo number_format($row->Charge,2) ?></td>
													<td>
													<a href="<?=site_url('admin/edit-services/')?><?php echo $row->servicesID ?>"><span class="icon-copy dw dw-edit-1"></span> Edit</a>
													</td>
												</tr>
											<?php endforeach;?>
										</tbody>
									</table>
                                </div>
								<div class="tab-pane fade show" id="membership" role="tabpanel">
									<br/>
									<table class="data-table table stripe hover nowrap">
										<thead>
											<th>Title</th>
											<th>Description</th>
											<th>Charge</th>
											<th>Status</th>
											<th>Action</th>
										</thead>
										<tbody>
											<?php foreach($fee as $row): ?>
												<tr>
													<td><?php echo $row->Title ?></td>
													<td><?php echo substr($row->Description,0,50) ?>...</td>
													<td><?php echo number_format($row->Charge,2) ?></td>
													<td>
														<?php if($row->Status==1){ ?>
															<span class="badge bg-primary text-white">Active</span>
														<?php }else { ?>
															<span class="badge bg-danger text-white">Inactive</span>
														<?php } ?>
													</td>
													<td>
														<a href="<?=site_url('admin/edit-fee/')?><?php echo $row->feeID ?>"><span class="icon-copy dw dw-edit-1"></span> Edit</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
                                </div>
								<div class="tab-pane fade show" id="category" role="tabpanel">
									<br/>
									<table class="data-table table stripe hover nowrap">
										<thead>
											<th>Category ID</th>
											<th>Category Name</th>
										</thead>
										<tbody>
											<?php foreach($category as $row): ?>
												<tr>
													<td><?php echo $row->categoryID ?></td>
													<td><?php echo $row->CategoryName ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>

		<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myLargeModalLabel">
							New Category
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<div id="errorMessages" style="display:none;">
							<div class="alert alert-danger alert-dismissable fade show" role="alert">
								<label id="errors"></label>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
						<form method="post" class="row g-3" id="frmCategory">
							<div class="col-12 form-group">
								<label>Category Name</label>
								<input type="text" class="form-control" name="category_name" required/>
							</div>
							<div class="col-12 form-group">
								<button type="submit" class="btn btn-primary" id="btnAdd">Save Entry</button>
							</div>
						</form>
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
		<script>
			$(document).on('click','.btnCategory',function(e)
			{
				e.preventDefault();
				$('#categoryModal').modal('show');
			});

			$('#btnAdd').on('click',function(e)
			{
				e.preventDefault();
				var data = $('#frmCategory').serialize();
				$.ajax({
					url:"<?=site_url('save-category')?>",method:"POST",
					data:data,success:function(response)
					{
						if(response==="success")
						{
							$('#categoryModal').modal('hide');
							location.reload();
						}
						else
						{
							document.getElementById('errorMessages').style="display:block";
							$('#errors').html(response);
						}
					}
				});
			});

			$('#btnSave').on('click',function(e)
			{
				e.preventDefault();
				var data = $('#frmDiscount').serialize();
				$.ajax({
					url:"<?=site_url('save-discount')?>",method:"POST",
					data:data,success:function(response)
					{
						if(response==="success")
						{
							$('#discountModal').modal('hide');
							location.reload();
						}
						else
						{
							document.getElementById('errorMessage').style="display:block";
							$('#error').html(response);
						}
					}
				});
			});
		</script>
	</body>
</html>

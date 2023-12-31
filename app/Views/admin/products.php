
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>PetLigo - Products</title>

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
							<a href="<?=site_url('admin/products')?>" class="dropdown-toggle active no-arrow">
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
				<?php if(!empty(session()->getFlashdata('success'))) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata('success'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<div class="card-box">
					<div class="card-header">All Products
					<a href="<?=site_url('admin/new-product')?>" style="float:right;"><span class="icon-copy dw dw-add-file"></span>&nbsp;New Product</a>
					</div>
                    <div class="card-body">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <th>Image</th>
								<th>Category</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Total Cost</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach($products as $row): ?>
                                    <?php $imgURL = "/Images/".$row->Image; ?>
                                    <tr>
                                        <td><img src="<?php echo $imgURL ?>" class="border-radius-100 shadow" width="50" height="50" alt=""/></td>
                                        <td><?php echo $row->CategoryName ?></td>
										<td><?php echo $row->productName ?></td>
                                        <td style="text-align:right;"><?php echo number_format($row->UnitPrice,2) ?></td>
                                        <td><?php echo number_format($row->Qty,0) ?></td>
                                        <td style="text-align:right;"><?php echo number_format($row->UnitPrice*$row->Qty,2) ?></td>
                                        <td><?php if($row->Qty>0){echo "<span class='badge bg-success text-white'>In Stock</span>";}else{echo "<span class='badge bg-danger text-white'>Out of Stock</span>";} ?></td>
                                        <td>
											<button type="button" class="btn btn-default btn-sm add-stock" value="<?php echo $row->productID ?>"><span class="icon-copy dw dw-add"></span> Add</button>
											<a href="<?=site_url('admin/edit-product/')?><?php echo $row->productID ?>" class="btn btn-default btn-sm"><span class="icon-copy dw dw-edit-1"></span> Edit</a>
										</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
		<div class="modal fade" id="stocksModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myLargeModalLabel">
							Add Stocks
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<div id="errorMessage" style="display:none;">
							<div class="alert alert-danger alert-dismissable fade show" role="alert">
								<label id="error"></label>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
						<form method="post" class="row g-3" id="frmStocks">
							<input type="hidden" name="productID" id="productID"/>
							<div class="col-12 form-group">
								<label>Description</label>
								<textarea class="form-control" name="description"></textarea>
							</div>
							<div class="col-12 form-group">
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" name="qty" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Unit Price</label>
                                        <input type="text" class="form-control" name="unitPrice" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Unit Item</label>
                                        <select class="form-control custom-select2" name="itemUnit" style="width:100%;" required>
                                            <option value="">Choose</option>
											<option>AVG</option><option>BAG</option><option>BLK</option>
											<option>BOT</option><option>BOX</option><option>BK</option>
											<option>BND</option><option>CAN</option><option>CRD</option>
											<option>CTN</option><option>CG</option><option>CSE</option>
											<option>CEN</option<option>COI</option><option>CON</option>
											<option>CFT</option><option>CYD</option><option>CUR</option>
											<option>CYL</option><option>DAY</option><option>DZ</option>
											<option>DRM</option><option>EA</option><option>FT</option>
											<option>GAL</option><option>GA</option><option>GRN</option>
											<option>GRM</option><option>GMC</option><option>GRS</option>
											<option>HR</option><option>CW</option><option>INC</option>
											<option>INS</option><option>JAR</option><option>JOB</option>
											<option>KG</option><option>KW</option><option>KIT</option>
											<option>LNG</option><option>LFT</option><option>LTR</option>
											<option>LOT</option><option>MET</option><option>MTN</option>
											<option>MC</option><option>UL</option><option>MU</option>
											<option>MGR</option><option>MLT</option><option>MOL</option>
											<option>MON</option><option>TN</option><option>N/A</option>
											<option>ORD</option><option>OZ</option><option>PK</option>
											<option>PKT</option><option>PAD</option><option>PAL</option>
											<option>PR</option><option>PLT</option><option>C</option>
											<option>M</option><option>PC</option><option>PT</option>
											<option>PP</option><option>LB</option><option>QT</option>
											<option>RCK</option><option>RM</option><option>RE</option>
											<option>ROD</option><option>RL</option><option>SAC</option>
											<option>SVC</option><option>ST</option><option>SHT</option>
											<option>SLV</option><option>SFT</option><option>SYD</option>
											<option>STK</option><option>TST</option><option>THR</option>
											<option>TON</option><option>TRP</option><option>TUB</option>
											<option>TB</option><option>UNT</option><option>VIL</option>
											<option>WK</option><option>YD</option><option>YR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
							<div class="col-12 form-group">
								<label>Supplier</label>
								<input type="text" class="form-control" name="supplier"/>
							</div>
							<div class="col-12 form-group">
								<button type="submit" class="btn btn-primary" id="btnAdd">Add Stocks</button>
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
			$(document).on('click','.add-stock',function(e)
			{
				e.preventDefault();
				var val = $(this).val();
				$('#stocksModal').modal('show');
				$('#productID').attr("value",val);
			});
			$('#btnAdd').on('click',function(e)
			{
				e.preventDefault();
				var data = $('#frmStocks').serialize();
				$.ajax({
					url:"<?=site_url('add-stocks')?>",method:"POST",
					data:data,success:function(response)
					{
						if(response==="success")
						{
							$('#stocksModal').modal('hide');
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

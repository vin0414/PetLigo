
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>PetLigo - Edit Product</title>

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
        <style>
            .quote-imgs-thumbs {
				background: #eee;
				border: 1px solid #ccc;
				border-radius: 0.25rem;
				margin: 1.5rem 0;
				padding: 0.75rem;
				}
				.quote-imgs-thumbs--hidden {
				display: none;
				}
				.img-preview-thumb {
				background: #fff;
				border: 1px solid #777;
				border-radius: 0.25rem;
				box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
				margin-right: 1rem;
				max-width: 140px;
				padding: 0.25rem;
				}
			.show-for-sr
			{
				display:none;
			}
        </style>
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
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<i class="icon-copy dw dw-notification"></i>
							<span class="badge notification-active"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								
							</div>
						</div>
					</div>
				</div>
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
				<div class="github-link">
					<a href="https://github.com/dropways/deskapp" target="_blank"
						><img src="vendors/images/github.svg" alt=""
					/></a>
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
							<a href="<?=site_url('admin/new-product')?>" class="dropdown-toggle active no-arrow">
								<span class="micon dw dw-edit-1"></span
								><span class="mtext">Edit Product</span>
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
				<?php if(!empty(session()->getFlashdata('fail'))) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata('fail'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<div class="card-box">
					<div class="card-header">Edit Product
					    <a href="<?=site_url('admin/products')?>" style="float:right;"><span class="icon-copy dw dw-left-arrow1"></span>&nbsp;Back</a>
					</div>
                    <div class="card-body">
                        <form method="POSt" class="row g-3" id="frmProduct" action="<?=base_url('update-product')?>" enctype="multipart/form-data">
                            <input type="hidden" name="productID" value="<?=$product['productID']?>"/>
                            <div class="col-12 form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="productName" value="<?=$product['productName']?>" required/>
                            </div>
							<div class="col-12 form-group">
								<label>Description</label>
								<textarea class="form-control" name="description" required><?=$product['Description']?></textarea>
							</div>
                            <div class="col-12 form-group">
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" name="qty" value="<?=$product['Qty']?>" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Unit Price</label>
                                        <input type="text" class="form-control" name="unitPrice" value="<?=$product['UnitPrice']?>" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Unit Item (<a href="https://web.wpi.edu/Images/CMS/Finops/STARS_Units_of_Measure.pdf">see details</a>)</label>
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
								<p>
									<label for="upload_imgs" class="btn btn-outline-primary">Select Your Images +</label>
									<input class="show-for-sr" type="file" id="upload_imgs" name="files" accept="image/jpeg, image/png, image/jpg"/>
								</p>
								<div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>
							</div>
                            <div class="col-12 form-group">
                                <button type="submit" class="btn btn-primary" id="btnSubmit">Save Changes</button>
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
        <script>
			var imgUpload = document.getElementById('upload_imgs')
				, imgPreview = document.getElementById('img_preview')
				, imgUploadForm = document.getElementById('img-upload-form')
				, totalFiles
				, previewTitle
				, previewTitleText
				, img;

				imgUpload.addEventListener('change', previewImgs, false);
				imgUploadForm.addEventListener('submit', function (e) {
				e.preventDefault();
				alert('Images Uploaded! (not really, but it would if this was on your website)');
				}, false);

				function previewImgs(event) {
				totalFiles = imgUpload.files.length;
				
				if(!!totalFiles) {
					imgPreview.classList.remove('quote-imgs-thumbs--hidden');
					previewTitle = document.createElement('p');
					previewTitle.style.fontWeight = 'bold';
					previewTitleText = document.createTextNode(totalFiles + ' Total Images Selected');
					previewTitle.appendChild(previewTitleText);
					imgPreview.appendChild(previewTitle);
				}
				
				for(var i = 0; i < totalFiles; i++) {
					img = document.createElement('img');
					img.src = URL.createObjectURL(event.target.files[i]);
					img.classList.add('img-preview-thumb');
					imgPreview.appendChild(img);
				}
				}
		</script>
	</body>
</html>

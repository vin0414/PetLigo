
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>My Pets</title>

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
							<a href="<?=site_url('customer/pets')?>" class="active dropdown-toggle no-arrow">
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
				<?php if(!empty(session()->getFlashdata('fail'))) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata('fail'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<?php if(!empty(session()->getFlashdata('success'))) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata('success'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<div class="card-box">
					<div class="card-header">My Pets
					<a href="javascript:void(0);" id="addPet" style="float:right;"><span class="icon-copy dw dw-add"></span>&nbsp;Add Pet</a>
					</div>
					<div class="card-body">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<th>Photo</th>
								<th>Name</th>
								<th>Breed</th>
								<th>Age</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php foreach($pets as $row): ?>
									<?php $imgURL = "/pets/".$row->Photo; ?>
									<tr>
										<td><img src="<?php echo $imgURL ?>" class="border-radius-100 shadow" width="50" height="50" alt=""/></td>
										<td><?php echo $row->Name ?></td>
										<td><?php echo $row->Breed ?></td>
										<td><?php echo $row->Age ?></td>
										<td>
											<a href="<?=site_url('customer/edit-pet/')?><?php echo $row->petsID ?>"><span class="dw dw-edit-1"></span> Edit Info</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myLargeModalLabel">
							Add Pet
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<form method="post" class="row g-3" action="<?=base_url('save-pet')?>" enctype="multipart/form-data" id="frmPet">
							<div class="col-12 form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="petname" required/>
							</div>
							<div class="col-12 form-group">
								<label>Breed</label>
								<input type="text" class="form-control" name="breed" required/>
							</div>
							<div class="col-12 form-group">
								<label>Age</label>
								<input type="number" class="form-control" name="age" required/>
							</div>
							<div class="col-12 form-group">
								<p>
									<label for="upload_imgs" class="btn btn-outline-primary">Select Your Images +</label>
									<input class="show-for-sr" type="file" id="upload_imgs" name="files" accept="image/jpeg, image/png, image/jpg"/>
								</p>
								<div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>
							</div>
							<div class="col-12 form-group">
								<button type="submit" class="btn btn-primary" id="btnSubmit">Save</button>
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
			$('#addPet').on('click',function(e)
			{
				e.preventDefault();
				$('#petModal').modal('show');
			});
		</script>
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

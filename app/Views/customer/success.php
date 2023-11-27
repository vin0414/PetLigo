
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Complete Purchase</title>

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
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/resources/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/resources/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="/resources/vendors/styles/style.css" />
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="<?=site_url('customer/dashboard')?>">
						<img src="/assets/images/petligo.png" alt="" width="100"/>
					</a>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-3"></div>
					<div class="col-md-6 col-lg-6">
					<?php if(!empty(session()->getFlashdata('fail'))) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= session()->getFlashdata('fail'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
						<div class="card-box">
							<div class="card-body">
								<h3>Complete Purchase</h3>
								<p>&nbsp;Reference No :<?php echo $code; ?></p>
								<table class="table hover table-borderless nowrap">
									<thead>
										<th>Purchase Summary</th>
										<th style="text-align:right;">Quantity</th>
										<th style="text-align:right;">Sub-Total</th>
									</thead>
									<tbody>
										<?php foreach($list as $row): ?>
											<tr>
												<td><?php echo $row->productName ?></td>
												<td style="text-align:right;"><?php echo $row->Qty ?></td>
												<td style="text-align:right;">PhP <?php echo number_format($row->Qty*$row->price,2) ?></td>
											</tr>
										<?php endforeach; ?>
										<tr><td colspan='3'></td></tr>
										<?php foreach($total as $row): ?>
											<tr>
												<td>&nbsp;</td>
												<td style="text-align:right;font-size:18px;font-weight:bold;">TOTAL</td>
												<td style="text-align:right;font-size:18px;font-weight:bold;">PhP <?php echo number_format($row->total,2) ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
								<br/>
								<h5>Payment Method</h5>
								<hr/>
								<form method="post" class="row g-3" id="frmPayment" action="<?=base_url('confirm')?>">
									<input type="hidden" name="code" value="<?php echo $code; ?>"/>
									<div class="col-12">
										<input type="radio" name="paymentMethod" style="width:20px;height:15px;" id="GCash" value="Gcash" required/>&nbsp;<label>Gcash</label>
										<small>The system will send you the generated Gcash QR Code to your email</small>
									</div>
									<div class="col-12">
										<input type="radio" name="paymentMethod" style="width:20px;height:15px;" id="COD" value="COD"/>&nbsp;<label>Cash On Delivery</label>
									</div>
									<div class="col-12">
									<p><b>Delivery Charges</b></p>
									<ul style="font-size:10px;">
										<li>The delivery for this order will incur an additional delivery charge.</li>
										<li>The delivery charge will be PhP 38.00</li>
										<li>Please make sure to factor in the delivery charge when placing your order.</li>
										<li>If you have any questions regarding the delivery charges, please feel free to contact us.</li>
									</ul>
									</div>
									<div class="col-12">
										<br/>
										<button type="submit" class="btn btn-primary" id="btnConfirm">Complete Purchase</button>
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
	</body>
</html>

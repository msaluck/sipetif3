<!doctype html>
<html lang="en" class="no-focus">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title><?= $meta_title; ?></title>
	<meta name="description" content="Sign in">
	<meta name="author" content="Mohammad Irham Akbar">
	<link rel="stylesheet" id="css-main" href="<?php echo base_url() ?>assets/login/assets/css/codebasic.css">
	<link rel="icon" href="<?= icon() ?>" type="image/jpeg">
	<style type="text/css">
		.form-material>.form-control {
			background-color: #dcdcdc;
			padding-left: 8px;
			padding-right: 8px;
			border: 1px solid #dcdcdc;
		}

		.form-material>.form-control:focus {
			background-color: #dcdcdc;
			box-shadow: 0px 0px 0px #dcdcdc;
			border: 1px solid #dcdcdc;
		}

		.form-material>label {
			left: 8px;
		}

		.form-material.floating.open>label {
			left: 0;
		}

		.is-invalid .form-material>.form-control {
			box-shadow: 0 0px 0 #ef5350;
			border: 1px solid #ef5350;
		}

		.is-invalid .form-material>.form-control:focus {
			box-shadow: 0 0px 0 #ef5350;
			border: 1px solid #ef5350;
		}

		.btn,
		.custom-checkbox {
			cursor: pointer;
		}

		.custom-checkbox {
			margin-top: 5px;
		}

		.form-group {
			margin-bottom: 0
		}

		.bg-logo {

			background-position: center;
			background-size: contain;
			background-repeat: no-repeat;
			background-position-y: 100px;
		}

		.content-full {
			background: rgba(255, 255, 255, 0.7);
		}
	</style>
</head>

<body>

	<div id="page-container" class="main-content-boxed">
		<main id="main-container">
			<div class="bg-image" style="background-image: url('<?php echo base_url() ?>assets/images/bg.jpeg');">
				<div class="row mx-0 bg-black-op">
					<div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
						<div class="p-30 invisible" data-toggle="appear">
							<p class="font-size-h3 font-w600 text-white mb-10">
								<?= $meta_title ?>
							</p>
							<p class="font-size-h4 text-white mb-10">
								<a href="<?= $meta_url; ?>" target="_blank"><?= $nama_instansi; ?></a>
							</p>
						</div>
					</div>
					<div class="hero-static col-md-6 col-xl-4 bg-logo d-flex align-items-center bg-white invisible" data-toggle="appear">
						<div class="content content-full">
							<div class="px-30 py-10">
								<center>
									<img src="<?= icon() ?>" width="170px" class="image-responsive" alt="Logo">
									<a class="link-effect font-w700" href="<?= $meta_url; ?>">
										<hr>
										<span class="font-size-xl text-primary-dark"><?= $name_app; ?></span>
									</a>
								</center>

								<hr>
								<h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
								<?php
								@session_start();
								if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
									<div class="animated fadeInDown" style="color: #ef5350">
										<b><?php echo $_SESSION['pesan']; ?></b>
									</div>
								<?php }
								$_SESSION['pesan'] = '';
								?>
							</div>
							<form class="js-validation-signin px-30" action="<?= site_url('login/aksi_login') ?>" method="post" autocomplete="off">
								<div class="form-group row">
									<div class="col-12">
										<div class="form-material floating">
											<input type="text" required class="form-control" id="username" name="username">
											<label for="username">Username <span class="text-danger">*</span></label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12">
										<div class="form-material floating">
											<input type="password" class="form-control" id="password" name="password">
											<label for="password">Password <span class="text-danger">*</span></label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12">
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="show-password" name="show-password">
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description text-muted">Show Password</span>
										</label>
									</div>
								</div>
								<div class="form-group row">

								</div>
								<br />
								<div class="form-group">
									<button type="submit" name="masuk" class="btn btn-lg btn-success btn-block">
										<i class="si si-login mr-10"></i> Login
									</button>
								</div>
								<hr>
								<a href="<?= $login_button ?>" class="btn btn-primary btn-lg btn-block">Login dengan SSO</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--Sweet Alert -->
		<?php if ($this->session->flashdata('swal-success')) { ?>
			<div class="swal-success" data-success="<?= $this->session->flashdata('swal-success') ?>"></div>
		<?php } else if ($this->session->flashdata('swal-error')) { ?>
			<div class="swal-error" data-error="<?= $this->session->flashdata('swal-error') ?>"></div>
		<?php } else if ($this->session->flashdata('swal-info')) { ?>
			<div class="swal-info" data-info="<?= $this->session->flashdata('swal-info') ?>"></div>
		<?php } else if ($this->session->flashdata('swal-warning')) { ?>
			<div class="swal-warning" data-warning="<?= $this->session->flashdata('swal-warning') ?>"></div>
		<?php } else if ($this->session->flashdata('question')) { ?>
			<div class="swal-question" data-question="<?= $this->session->flashdata('swal-warning') ?>"></div>
		<?php } ?>
		<!-- End Sweet Alert -->
	</div>
	<script src="<?php echo base_url() ?>assets/login/assets/js/core/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login/assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login/assets/js/core/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login/assets/js/core/jquery.scrollLock.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login/assets/js/core/jquery.appear.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login/assets/js/codebasic.js"></script>
	<script src="<?php echo base_url() ?>assets/login/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login/assets/js/pages/op_auth_signin.js"></script>
	<!-- Sweetalert -->
	<script src="<?= base_url() ?>assets/login/sweetalert/dist/sweetalert2.all.min.js"></script>
	<script src="<?= base_url() ?>assets/js/alert.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#show-password").click(function() {
				if ($("#password").attr("type") == "password") {
					$("#password").attr("type", "text");
				} else {
					$("#password").attr("type", "password");
				}
			});
		});
	</script>
</body>

</html>
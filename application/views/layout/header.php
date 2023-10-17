<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-green navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a style="color:white;" class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item">
			<a style="color:white;" class="nav-link" data-widget="pushmenu" href="#"><?=header_judul()?></a>
		</li>


	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
			Logout
		</button>


	</ul>
</nav>
<!-- /.navbar -->

<!-- LOGOUT -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-red">
				<h4 class="modal-title"><i class="fas fa-sign-out-alt"></i> Keluar Aplikasi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p style="text-align: center;">Apakah anda yakin untuk keluar aplikasi?</p>
				<div class="col text-center">
					<a href="<?= site_url('login/logout') ?>" class="btn btn-primary text-center"><i class="fas fa-sign-out-alt"></i> Ya. Keluar Aplikasi</a>
				</div>
			</div>
		</div>
	</div>
</div>
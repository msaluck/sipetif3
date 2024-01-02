<div class="row">
	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<b><i class="fa fa-eye"></i> Detail Data Users</b>
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div style="padding: 5px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Email</b></td>
							<td><?= $email; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Name</b></td>
							<td><?= $name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Username</b></td>
							<td><?= $username; ?></td>
						</tr>
						<!-- <tr>
							<td width="20%"><b>Password</b></td>
							<td><?= $password; ?></td>
						</tr> -->
					</table>
					<a href="<?= site_url('users') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<i class="fa fa-list-alt"></i> Data Role
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-3">
					<table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
						<thead>
							<tr>
								<th class="text-center" width="5%">No</th>
								<th>Name</th>
								<th>Description</th>
								<th class="text-center" width="15%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$role_data = $this->db->get_where('role')->result();
							foreach ($role_data as $value) { ?>
								<tr>
									<td class="text-center"><?= $no++; ?></td>
									<td><?= $value->name ?></td>
									<td><?= $value->description ?></td>
									<td class="text-center">
										<?php $cekrole = $this->db->get_where('user_role', ['user_id' => $id_user, 'role_id' => $value->id])->num_rows(); ?>
										<input type="checkbox" class="akses form-control" <?= $cekrole == 0 ? '' : "checked='checked'"; ?> value="<?= $value->id ?>" data-id="<?= $value->id ?>">
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('.akses').click(function(e) {
		console.log($(this).data('id'));

		$.ajax({
			type: "POST",
			url: "<?php echo site_url('users/beri_akses') ?>",
			data: {
				id: $(this).data('id'),
				id_user: '<?= $id_user ?>',
			}
		}).done(function(data) {
			console.log('oke');
			//alert("Data Send:");
		}).fail(function() {
			alert("Gagal");
		});
		//e.preventDefault();
	})
</script>
<div class="row">
	<div class="col-md-6">
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
				<div style="padding:5px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Username</b></td>
							<td><?= $username; ?></td>
						</tr>
						<!-- <tr>
							<td width="20%"><b>Password</b></td>
							<td><?= $password; ?></td>
						</tr> -->
						<tr>
							<td width="20%"><b>Email</b></td>
							<td><?= $email; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Name</b></td>
							<td><?= $name; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('users') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<i class="fa fa-list-alt"></i> Data Akses Users prodi
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<a href="<?= site_url('users_prodi/create/' . $id_user) ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Akses</a>
				<div class="table-responsive mt-3">
					<table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
						<thead>
							<tr>
								<th class="text-center" width="5%">No</th>
								<th>Nama Prodi</th>
								<th>Jenjang</th>
								<th class="text-center" width="15%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$users_prodi_data = $this->db->query("select a.*,b.namaprodi,b.jenjang from users_prodi a,program_studi b where a.kodeprodi = b.kodeprodi and a.id_user='$id_user'")->result();
							foreach ($users_prodi_data as $value) { ?>
								<tr>
									<td class="text-center"><?= $no++; ?></td>
									<td><?= $value->namaprodi ?></td>
									<td><?= $value->jenjang ?></td>
									<td class="text-center">
										<a href="<?= site_url('users_prodi/delete/' . $value->id_user . '/' . $value->kodeprodi) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a>
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
<?= call_datatable("#mytable") ?>
<?= swal_delete("#mytable", ".hapus") ?>
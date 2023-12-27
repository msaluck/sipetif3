<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<i class="fa fa-list-alt"></i> Data Wos
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<a href="<?= site_url('wos/create') ?>" class="btn btn-primary" hidden><i class="fa fa-plus"></i> Tambah Data</a>
				<div class="table-responsive mt-3">
					<table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
						<thead class="bg-info">
							<tr>
								<th class="text-center" width="5%">No</th>
								<th class="text-center" width="15%">Aksi</th>
								<th>Title</th>
								<th>Author</th>
								<th>Journal Name</th>
								<th>Issn</th>
								<th>Citation</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($wos_data as $value) { ?>
								<tr>
									<td class="text-center"><?= $no++; ?></td>
									<td class="text-center">
										<a href="<?= site_url('wos/read/' . $value->id) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-eye"></i></a>
										<a href="<?= site_url('wos/update/' . $value->id) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										<a href="<?= site_url('wos/delete/' . $value->id) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a>
										<a href="<?= site_url('submissions/submit/' . $value->id) ?>" title="Ajukan Portofolio" class="btn btn-primary"><i class="fas fa-paper-plane"></i></a>
									</td>
									<td><?= $value->title ?></td>
									<td><?= $value->author ?></td>
									<td><?= $value->journal_name ?></td>
									<td><?= $value->issn ?></td>
									<td><?= $value->citation ?></td>
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
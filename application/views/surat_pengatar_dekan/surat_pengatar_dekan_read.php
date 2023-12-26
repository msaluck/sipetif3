<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Surat pengatar dekan</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Submission Id</b></td>
							<td><?= $submission_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nomor Surat</b></td>
							<td><?= $nomor_surat; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Hal</b></td>
							<td><?= $hal; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nama Jurnal</b></td>
							<td><?= $nama_jurnal; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Surat</b></td>
							<td><?= $tanggal_surat; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Createdate</b></td>
							<td><?= $createdate; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('surat_pengatar_dekan') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
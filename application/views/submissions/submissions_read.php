<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<b><i class="fa fa-edit"></i> Detail Data Submissions</b>
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div style="padding:5px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Portfolio Type</b></td>
							<td><?= $portfolio_database; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Title</b></td>
							<td><?= $portfolio_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Submission Status</b></td>
							<td><?= $submission_status; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>E-mail</b></td>
							<td><?= $user_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Surat Pengantar Dekan</b></td>

							<td><?= $status_dekan ?> <a href="<?= site_url('submissions/surat_pengantar_dekan/' . $id) ?>" class="btn btn-info">
									<i class="fa fa-envelope"></i> Surat Pengantar Dekan
								</a></td>
						</tr>
						<tr>
							<td width="20%"><b>Surat Pengantar LPPM</b></td>
							<td>Belum
								<a href="<?= site_url('submissions/surat_pengantar_lppm') ?>" class="btn btn-success">
									<i class="fa fa-envelope"></i> Surat Pengantar LPPM
								</a>
							</td>
						</tr>
						<tr>
							<td width="20%"><b>Surat Pengantar Rektor</b></td>
							<td>Belum
								<a href="<?= site_url('submissions/surat_pengantar_rektor') ?>" class="btn btn-primary">
									<i class="fa fa-envelope"></i> Surat Pengantar Rektor
								</a>
							</td>
						</tr>
						<tr>
							<td width="20%"><b>Upload Data Pendukung</b></td>
							<td>
								<a href="<?= site_url('') ?>" class="btn btn-primary">
									<i class="fa fa-upload"></i>
								</a>
							</td>
						</tr>
					</table>
					<a href="<?= site_url('submissions/by_users') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
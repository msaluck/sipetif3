<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<b><i class="fa fa-eye"></i> Detail Data Surat pernyataan lppm</b>
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Acc Lppm</b></td>
							<td><?= $acc_lppm; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Created Date</b></td>
							<td><?= waktu_indo($created_date); ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nomer Surat</b></td>
							<td><?= $nomer_surat; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Submission Id</b></td>
							<td><?= $submission_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Surat</b></td>
							<td><?= tgl_indo($tanggal_surat); ?></td>
						</tr>
					</table>
					<a href="<?= site_url('surat_pernyataan_lppm') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
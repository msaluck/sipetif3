<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Surat permohonan rektor</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Acc Rektor</b></td>
							<td><?= $acc_rektor; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Created Date</b></td>
							<td><?= $created_date; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Submission Id</b></td>
							<td><?= $submission_id; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('surat_permohonan_rektor') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
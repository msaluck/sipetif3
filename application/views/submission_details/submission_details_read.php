<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Submission details</b>
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
							<td width="20%"><b>Submission Type Detail Id</b></td>
							<td><?= $submission_type_detail_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Value</b></td>
							<td><?= $value; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('submission_details') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
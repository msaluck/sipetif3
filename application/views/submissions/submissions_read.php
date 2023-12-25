<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Submissions</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Portfolio Database</b></td>
							<td><?= $portfolio_database; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Portfolio Id</b></td>
							<td><?= $portfolio_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Submission Status</b></td>
							<td><?= $submission_status; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>User Id</b></td>
							<td><?= $user_id; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('submissions') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
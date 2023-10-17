<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Submission documents</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>File Name</b></td>
							<td><?= $file_name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>File Path</b></td>
							<td><?= $file_path; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>File Size</b></td>
							<td><?= $file_size; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>File Type</b></td>
							<td><?= $file_type; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Original Name</b></td>
							<td><?= $original_name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Status</b></td>
							<td><?= $status; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Submission Id</b></td>
							<td><?= $submission_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Submission Type Detail Id</b></td>
							<td><?= $submission_type_detail_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Uploaded At</b></td>
							<td><?= $uploaded_at; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('submission_documents') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
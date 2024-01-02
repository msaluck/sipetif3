<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Google documents</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Title</b></td>
							<td><?= $title; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Abstract</b></td>
							<td><?= $abstract; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Authors</b></td>
							<td><?= $authors; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Journal Name</b></td>
							<td><?= $journal_name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Publish Year</b></td>
							<td><?= $publish_year; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Citation</b></td>
							<td><?= $citation; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Url</b></td>
							<td><?= $url; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Authors Id</b></td>
							<td><?= $authors_id; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('google_documents') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
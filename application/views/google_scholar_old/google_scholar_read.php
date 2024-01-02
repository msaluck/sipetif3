<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Google scholar</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>User Id</b></td>
							<td><?= $user_id; ?></td>
						</tr>
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
							<td width="20%"><b>Author</b></td>
							<td><?= $author; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>File</b></td>
							<td><?= $file; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Issn</b></td>
							<td><?= $issn; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Url</b></td>
							<td><?= $url; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Is Submitted</b></td>
							<td><?= $is_submitted; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('google_scholar') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
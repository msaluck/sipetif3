<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Scopus documents</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Id</b></td>
							<td><?= $id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Quartile</b></td>
							<td><?= $quartile; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Title</b></td>
							<td><?= $title; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Publication Name</b></td>
							<td><?= $publication_name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Creator</b></td>
							<td><?= $creator; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>PAGE</b></td>
							<td><?= $PAGE; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Issn</b></td>
							<td><?= $issn; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Volume</b></td>
							<td><?= $volume; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Cover Date</b></td>
							<td><?= $cover_date; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Cover Display Date</b></td>
							<td><?= $cover_display_date; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Doi</b></td>
							<td><?= $doi; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Citedby Count</b></td>
							<td><?= $citedby_count; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Aggregation Type</b></td>
							<td><?= $aggregation_type; ?></td>
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
					<a href="<?= site_url('scopus_documents') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
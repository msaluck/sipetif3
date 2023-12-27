<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<b><i class="fa fa-eye"></i> Detail Data Scopus</b>
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
							<td width="20%"><b>Publication Name</b></td>
							<td><?= $publication_name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Quartile</b></td>
							<td><?= $quartile; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>ISSN</b></td>
							<td><?= $issn; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Citeby Count</b></td>
							<td><?= $citeby_count; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Creator</b></td>
							<td><?= $creator; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Page</b></td>
							<td><?= $page; ?></td>
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
							<td width="20%"><b>Aggregation Type</b></td>
							<td><?= $aggregation_type; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Url</b></td>
							<td><?= $url; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Author</b></td>
							<td><?= $author; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>File</b></td>
							<td><?= $file; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('scopus') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
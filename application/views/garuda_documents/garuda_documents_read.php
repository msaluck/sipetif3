<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Garuda documents</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Author Order</b></td>
							<td><?= $author_order; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Accreditation</b></td>
							<td><?= $accreditation; ?></td>
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
							<td width="20%"><b>Publisher Name</b></td>
							<td><?= $publisher_name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Publish Date</b></td>
							<td><?= $publish_date; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Publish Year</b></td>
							<td><?= $publish_year; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Doi</b></td>
							<td><?= $doi; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Citation</b></td>
							<td><?= $citation; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Source</b></td>
							<td><?= $source; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Source Issue</b></td>
							<td><?= $source_issue; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Source Page</b></td>
							<td><?= $source_page; ?></td>
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
					<a href="<?= site_url('garuda_documents') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
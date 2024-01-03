<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Ipr documents</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Authors Id</b></td>
							<td><?= $authors_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Category</b></td>
							<td><?= $category; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Filing Date</b></td>
							<td><?= $filing_date; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Inventor</b></td>
							<td><?= $inventor; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Patent Holder</b></td>
							<td><?= $patent_holder; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Publication Date</b></td>
							<td><?= $publication_date; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Publication Number</b></td>
							<td><?= $publication_number; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Reception Date</b></td>
							<td><?= $reception_date; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Registration Date</b></td>
							<td><?= $registration_date; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Registration Number</b></td>
							<td><?= $registration_number; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Requests Number</b></td>
							<td><?= $requests_number; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Requests Year</b></td>
							<td><?= $requests_year; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Title</b></td>
							<td><?= $title; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('ipr_documents') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
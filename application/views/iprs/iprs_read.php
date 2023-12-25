<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Iprs</b>
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
							<td width="20%"><b>Category</b></td>
							<td><?= $category; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Request Year</b></td>
							<td><?= $request_year; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Request Number</b></td>
							<td><?= $request_number; ?></td>
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
							<td width="20%"><b>Title</b></td>
							<td><?= $title; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('iprs') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
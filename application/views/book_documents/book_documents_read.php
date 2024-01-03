<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Book documents</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Authors</b></td>
							<td><?= $authors; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Authors Id</b></td>
							<td><?= $authors_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Category</b></td>
							<td><?= $category; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Isbn</b></td>
							<td><?= $isbn; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Place</b></td>
							<td><?= $place; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Publisher</b></td>
							<td><?= $publisher; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Title</b></td>
							<td><?= $title; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Year</b></td>
							<td><?= $year; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('book_documents') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
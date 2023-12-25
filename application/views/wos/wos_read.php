<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Wos</b>
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
							<td width="20%"><b>Author</b></td>
							<td><?= $author; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Journal Name</b></td>
							<td><?= $journal_name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Issn</b></td>
							<td><?= $issn; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Citation</b></td>
							<td><?= $citation; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('wos') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
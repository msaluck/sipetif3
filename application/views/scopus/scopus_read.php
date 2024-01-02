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
							<td width="20%"><b>Authors Id</b></td>
							<td><?= $authors_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Total Document</b></td>
							<td><?= $total_document; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Total Citation</b></td>
							<td><?= $total_citation; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Total Cited Doc</b></td>
							<td><?= $total_cited_doc; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>H Index</b></td>
							<td><?= $h_index; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>I10 Index</b></td>
							<td><?= $i10_index; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>G Index</b></td>
							<td><?= $g_index; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>G Index 3year</b></td>
							<td><?= $g_index_3year; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update</b></td>
							<td><?= $waktu_update; ?></td>
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
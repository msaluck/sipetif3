<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<i class="fa fa-list-alt"></i> Data Scopus documents
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<a href="<?= site_url('scopus_documents_by_all/sync') ?>" class="btn btn-secondary"><i class="fa fa-sync"></i> Sinkronisasi Data</a>
				<div class="table-responsive mt-3">
					<table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
						<thead>
							<tr>
								<th class="text-center" width="5%">No</th>
								<th class="text-center" width="15%">Ajukan?</th>
								<th>Quartile</th>
								<th>Title</th>
								<th>Publication Name</th>
								<th>Creator</th>
								<th>PAGE</th>
								<th>Issn</th>
								<th>Volume</th>
								<th>Cover Date</th>
								<th>Cover Display Date</th>
								<th>Doi</th>
								<th>Citedby Count</th>
								<th>Aggregation Type</th>
								<th>Url</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($scopus_documents_data as $value) { ?>
								<tr>
									<td class="text-center"><?= $no++; ?></td>
									<td class="text-center">
										<?php if ($value->idsubmission != null) { ?>
											<button type="button" class="btn btn-primary disabled">
												<i class="fas fa-check"></i> Sudah
											</button>
										<?php } else { ?>
											<button type="button" class="btn btn-danger disabled">
												<i class="fas fa-times"></i> Belum
											</button>
										<?php } ?>
									</td>
									<td><?= $value->quartile ?></td>
									<td><?= $value->title ?></td>
									<td><?= $value->publication_name ?></td>
									<td><?= $value->creator ?></td>
									<td><?= $value->PAGE ?></td>
									<td><?= $value->issn ?></td>
									<td><?= $value->volume ?></td>
									<td><?= $value->cover_date ?></td>
									<td><?= $value->cover_display_date ?></td>
									<td><?= $value->doi ?></td>
									<td><?= $value->citedby_count ?></td>
									<td><?= $value->aggregation_type ?></td>
									<td><?= $value->url ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?= call_datatable("#mytable") ?>
<?= swal_delete("#mytable", ".hapus") ?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<i class="fa fa-list-alt"></i> Data Wos documents
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<a href="<?= site_url('wos_documents_by_all/sync') ?>" class="btn btn-secondary"><i class="fa fa-sync"></i> Sinkronisasi Data</a>
				<div class="table-responsive mt-3">
					<table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
						<thead>
							<tr>
								<th class="text-center" width="5%">No</th>
								<th class="text-center" width="15%">Ajukan?</th>
								<th>Id</th>
								<th>Publons Id</th>
								<th>Wos Id</th>
								<th>Doi</th>
								<th>Title</th>
								<th>First Author</th>
								<th>Last Author</th>
								<th>Authors</th>
								<th>Publish Date</th>
								<th>Journal Name</th>
								<th>Citation</th>
								<th>Abstract</th>
								<th>Publish Type</th>
								<th>Publish Year</th>
								<th>Page Begin</th>
								<th>Page End</th>
								<th>Issn</th>
								<th>Eissn</th>
								<th>Url</th>
								<th>Author ID</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($wos_documents_data as $value) { ?>
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
									<td><?= $value->id ?></td>
									<td><?= $value->publons_id ?></td>
									<td><?= $value->wos_id ?></td>
									<td><?= $value->doi ?></td>
									<td><?= $value->title ?></td>
									<td><?= $value->first_author ?></td>
									<td><?= $value->last_author ?></td>
									<td><?= $value->authors ?></td>
									<td><?= $value->publish_date ?></td>
									<td><?= $value->journal_name ?></td>
									<td><?= $value->citation ?></td>
									<td><?= $value->abstract ?></td>
									<td><?= $value->publish_type ?></td>
									<td><?= $value->publish_year ?></td>
									<td><?= $value->page_begin ?></td>
									<td><?= $value->page_end ?></td>
									<td><?= $value->issn ?></td>
									<td><?= $value->eissn ?></td>
									<td><?= $value->url ?></td>
									<td><?= $value->authors_id ?></td>
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
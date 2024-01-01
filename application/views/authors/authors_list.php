<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
					<i class="fa fa-list-alt"></i> Data Authors
				</div>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
				</div>
			</div>
			<div class="card-body">
				<a href="<?= site_url('authors/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
				<a href="<?= site_url('authors/synchronize') ?>" class="btn btn-secondary"><i class="fa fa-sync"></i> Sinkronisasi Data</a>
				<div class="table-responsive mt-3">
					<table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
						<thead>
							<tr>
								<th class="text-center" width="5%">No</th>
								<th>Nidn</th>
								<th>Fullname</th>
								<th>Country</th>
								<th>Academic Grade Raw</th>
								<th>Academic Grade</th>
								<th>Gelar Depan</th>
								<th>Gelar Belakang</th>
								<th>Last Education</th>
								<th>Sinta Score V2 Overall</th>
								<th>Sinta Score V2 3year</th>
								<th>Sinta Score V3 Overall</th>
								<th>Sinta Score V3 3year</th>
								<th>Affiliation Score V3 Overall</th>
								<th>Affiliation Score V3 3year</th>
								<th>Affiliation Id</th>
								<th>Waktu Update</th>
								<th>Waktu Update Wos</th>
								<th>Waktu Update Garuda</th>
								<th>Waktu Update Google</th>
								<th>Waktu Update Ipr</th>
								<th>Waktu Update Book</th>
								<th>Waktu Update Research</th>
								<th>Waktu Update Service</th>
								<th>Waktu Update Profile</th>
								<th>Keterangan Cek Profile</th>
								<th class="text-center" width="15%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($authors_data as $value) { ?>
								<tr>
									<td class="text-center"><?= $no++; ?></td>
									<td><?= $value->nidn ?></td>
									<td><?= $value->fullname ?></td>
									<td><?= $value->country ?></td>
									<td><?= $value->academic_grade_raw ?></td>
									<td><?= $value->academic_grade ?></td>
									<td><?= $value->gelar_depan ?></td>
									<td><?= $value->gelar_belakang ?></td>
									<td><?= $value->last_education ?></td>
									<td><?= $value->sinta_score_v2_overall ?></td>
									<td><?= $value->sinta_score_v2_3year ?></td>
									<td><?= $value->sinta_score_v3_overall ?></td>
									<td><?= $value->sinta_score_v3_3year ?></td>
									<td><?= $value->affiliation_score_v3_overall ?></td>
									<td><?= $value->affiliation_score_v3_3year ?></td>
									<td><?= $value->affiliation_id ?></td>
									<td><?= $value->waktu_update ?></td>
									<td><?= $value->waktu_update_wos ?></td>
									<td><?= $value->waktu_update_garuda ?></td>
									<td><?= $value->waktu_update_google ?></td>
									<td><?= $value->waktu_update_ipr ?></td>
									<td><?= $value->waktu_update_book ?></td>
									<td><?= $value->waktu_update_research ?></td>
									<td><?= $value->waktu_update_service ?></td>
									<td><?= $value->waktu_update_profile ?></td>
									<td><?= $value->keterangan_cek_profile ?></td>
									<td class="text-center">
										<a href="<?= site_url('authors/read/' . $value->id) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-eye"></i></a>
										<a href="<?= site_url('authors/update/' . $value->id) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										<a href="<?= site_url('authors/delete/' . $value->id) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a>
									</td>
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
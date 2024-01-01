<div class="row">
	<div class="col-md-12">
		<div class="card card-success">
			<div class="card-header">
				<div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Authors</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
			</div>
			<div class="card-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Nidn</b></td>
							<td><?= $nidn; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Fullname</b></td>
							<td><?= $fullname; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Country</b></td>
							<td><?= $country; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Academic Grade Raw</b></td>
							<td><?= $academic_grade_raw; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Academic Grade</b></td>
							<td><?= $academic_grade; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Gelar Depan</b></td>
							<td><?= $gelar_depan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Gelar Belakang</b></td>
							<td><?= $gelar_belakang; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Last Education</b></td>
							<td><?= $last_education; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Sinta Score V2 Overall</b></td>
							<td><?= $sinta_score_v2_overall; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Sinta Score V2 3year</b></td>
							<td><?= $sinta_score_v2_3year; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Sinta Score V3 Overall</b></td>
							<td><?= $sinta_score_v3_overall; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Sinta Score V3 3year</b></td>
							<td><?= $sinta_score_v3_3year; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Affiliation Score V3 Overall</b></td>
							<td><?= $affiliation_score_v3_overall; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Affiliation Score V3 3year</b></td>
							<td><?= $affiliation_score_v3_3year; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Affiliation Id</b></td>
							<td><?= $affiliation_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update</b></td>
							<td><?= $waktu_update; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update Wos</b></td>
							<td><?= $waktu_update_wos; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update Garuda</b></td>
							<td><?= $waktu_update_garuda; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update Google</b></td>
							<td><?= $waktu_update_google; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update Ipr</b></td>
							<td><?= $waktu_update_ipr; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update Book</b></td>
							<td><?= $waktu_update_book; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update Research</b></td>
							<td><?= $waktu_update_research; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update Service</b></td>
							<td><?= $waktu_update_service; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Waktu Update Profile</b></td>
							<td><?= $waktu_update_profile; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Keterangan Cek Profile</b></td>
							<td><?= $keterangan_cek_profile; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('authors') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
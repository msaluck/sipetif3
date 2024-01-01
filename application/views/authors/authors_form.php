<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Authors
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nidn</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nidn" id="nidn" placeholder="Nidn" value="<?= $nidn; ?>" />
                                <?= form_error('nidn') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Fullname</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="<?= $fullname; ?>" />
                                <?= form_error('fullname') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Country</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?= $country; ?>" />
                                <?= form_error('country') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Academic Grade Raw</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="academic_grade_raw" id="academic_grade_raw" placeholder="Academic Grade Raw" value="<?= $academic_grade_raw; ?>" />
                                <?= form_error('academic_grade_raw') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Academic Grade</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="academic_grade" id="academic_grade" placeholder="Academic Grade" value="<?= $academic_grade; ?>" />
                                <?= form_error('academic_grade') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Gelar Depan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="gelar_depan" id="gelar_depan" placeholder="Gelar Depan" value="<?= $gelar_depan; ?>" />
                                <?= form_error('gelar_depan') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Gelar Belakang</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="gelar_belakang" id="gelar_belakang" placeholder="Gelar Belakang" value="<?= $gelar_belakang; ?>" />
                                <?= form_error('gelar_belakang') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Last Education</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_education" id="last_education" placeholder="Last Education" value="<?= $last_education; ?>" />
                                <?= form_error('last_education') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="double">Sinta Score V2 Overall</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sinta_score_v2_overall" id="sinta_score_v2_overall" placeholder="Sinta Score V2 Overall" value="<?= $sinta_score_v2_overall; ?>" />
                                <?= form_error('sinta_score_v2_overall') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="double">Sinta Score V2 3year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sinta_score_v2_3year" id="sinta_score_v2_3year" placeholder="Sinta Score V2 3year" value="<?= $sinta_score_v2_3year; ?>" />
                                <?= form_error('sinta_score_v2_3year') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="double">Sinta Score V3 Overall</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sinta_score_v3_overall" id="sinta_score_v3_overall" placeholder="Sinta Score V3 Overall" value="<?= $sinta_score_v3_overall; ?>" />
                                <?= form_error('sinta_score_v3_overall') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="double">Sinta Score V3 3year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sinta_score_v3_3year" id="sinta_score_v3_3year" placeholder="Sinta Score V3 3year" value="<?= $sinta_score_v3_3year; ?>" />
                                <?= form_error('sinta_score_v3_3year') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="double">Affiliation Score V3 Overall</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="affiliation_score_v3_overall" id="affiliation_score_v3_overall" placeholder="Affiliation Score V3 Overall" value="<?= $affiliation_score_v3_overall; ?>" />
                                <?= form_error('affiliation_score_v3_overall') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="double">Affiliation Score V3 3year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="affiliation_score_v3_3year" id="affiliation_score_v3_3year" placeholder="Affiliation Score V3 3year" value="<?= $affiliation_score_v3_3year; ?>" />
                                <?= form_error('affiliation_score_v3_3year') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="bigint">Affiliation Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="affiliation_id" id="affiliation_id" placeholder="Affiliation Id" value="<?= $affiliation_id; ?>" />
                                <?= form_error('affiliation_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update" id="waktu_update" placeholder="Waktu Update" value="<?= $waktu_update; ?>" />
                                <?= form_error('waktu_update') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update Wos</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update_wos" id="waktu_update_wos" placeholder="Waktu Update Wos" value="<?= $waktu_update_wos; ?>" />
                                <?= form_error('waktu_update_wos') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update Garuda</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update_garuda" id="waktu_update_garuda" placeholder="Waktu Update Garuda" value="<?= $waktu_update_garuda; ?>" />
                                <?= form_error('waktu_update_garuda') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update Google</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update_google" id="waktu_update_google" placeholder="Waktu Update Google" value="<?= $waktu_update_google; ?>" />
                                <?= form_error('waktu_update_google') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update Ipr</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update_ipr" id="waktu_update_ipr" placeholder="Waktu Update Ipr" value="<?= $waktu_update_ipr; ?>" />
                                <?= form_error('waktu_update_ipr') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update Book</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update_book" id="waktu_update_book" placeholder="Waktu Update Book" value="<?= $waktu_update_book; ?>" />
                                <?= form_error('waktu_update_book') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update Research</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update_research" id="waktu_update_research" placeholder="Waktu Update Research" value="<?= $waktu_update_research; ?>" />
                                <?= form_error('waktu_update_research') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update Service</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update_service" id="waktu_update_service" placeholder="Waktu Update Service" value="<?= $waktu_update_service; ?>" />
                                <?= form_error('waktu_update_service') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Waktu Update Profile</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="waktu_update_profile" id="waktu_update_profile" placeholder="Waktu Update Profile" value="<?= $waktu_update_profile; ?>" />
                                <?= form_error('waktu_update_profile') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Keterangan Cek Profile</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="keterangan_cek_profile" id="keterangan_cek_profile" placeholder="Keterangan Cek Profile" value="<?= $keterangan_cek_profile; ?>" />
                                <?= form_error('keterangan_cek_profile') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('authors') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
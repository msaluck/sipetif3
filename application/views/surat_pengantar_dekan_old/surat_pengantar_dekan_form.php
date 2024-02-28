<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Surat pengatar dekan
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding:5px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group" style="display: none;">
                        <div class="row">
                            <label class="col-md-2" for="int">Submission Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="submission_id" id="submission_id" placeholder="Submission Id" value="<?= $submission_id; ?>" />
                                <?= form_error('submission_id') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Tanggal Surat</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?= $tanggal_surat; ?>" readonly />
                                    <?= form_error('tanggal_surat') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nomor Surat</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" value="<?= $nomor_surat; ?>" />
                                <?= form_error('nomor_surat') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Hal</label>
                            <div class="col-md-6">
                                <input type="text" readonly class="form-control" name="hal" id="hal" placeholder="Hal" value="<?= $hal; ?>" />
                                <?= form_error('hal') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama Jurnal</label>
                            <div class="col-md-6">
                                <input type="text" readonly class="form-control" name="nama_jurnal" id="nama_jurnal" placeholder="Nama Jurnal" value="<?= $nama_jurnal; ?>" />
                                <?= form_error('nama_jurnal') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('submissions/read/' . $submission_id) ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
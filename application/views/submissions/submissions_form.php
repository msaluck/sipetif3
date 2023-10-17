<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Submissions
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Submission Type Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="submission_type_id" id="submission_type_id" placeholder="Submission Type Id" value="<?= $submission_type_id; ?>" />
                                <?= form_error('submission_type_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="smallint">Submission Status Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="submission_status_id" id="submission_status_id" placeholder="Submission Status Id" value="<?= $submission_status_id; ?>" />
                                <?= form_error('submission_status_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">User Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?= $user_id; ?>" />
                                <?= form_error('user_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="timestamp">Submission Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="submission_date" id="submission_date" placeholder="Submission Date" value="<?= $submission_date; ?>" />
                                <?= form_error('submission_date') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('submissions') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
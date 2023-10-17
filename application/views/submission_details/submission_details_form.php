<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Submission details
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
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
                            <label class="col-md-2" for="int">Submission Type Detail Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="submission_type_detail_id" id="submission_type_detail_id" placeholder="Submission Type Detail Id" value="<?= $submission_type_detail_id; ?>" />
                                <?= form_error('submission_type_detail_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Value</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="value" id="value" placeholder="Value" value="<?= $value; ?>" />
                                <?= form_error('value') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('submission_details') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
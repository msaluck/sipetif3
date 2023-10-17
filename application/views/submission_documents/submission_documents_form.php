<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Submission documents
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">File Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="file_name" id="file_name" placeholder="File Name" value="<?= $file_name; ?>" />
                                <?= form_error('file_name') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">File Path</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="file_path" id="file_path" placeholder="File Path" value="<?= $file_path; ?>" />
                                <?= form_error('file_path') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">File Size</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="file_size" id="file_size" placeholder="File Size" value="<?= $file_size; ?>" />
                                <?= form_error('file_size') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">File Type</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="file_type" id="file_type" placeholder="File Type" value="<?= $file_type; ?>" />
                                <?= form_error('file_type') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Original Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="original_name" id="original_name" placeholder="Original Name" value="<?= $original_name; ?>" />
                                <?= form_error('original_name') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="enum">Status</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?= $status; ?>" />
                                <?= form_error('status') ?>
                            </div>
                        </div>
                    </div>
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
                            <label class="col-md-2" for="datetime">Uploaded At</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="uploaded_at" id="uploaded_at" placeholder="Uploaded At" value="<?= $uploaded_at; ?>" />
                                <?= form_error('uploaded_at') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('submission_documents') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Submission type details
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
                            <label class="col-md-2" for="char">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= $name; ?>" />
                                <?= form_error('name') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="char">Type</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="type" id="type" placeholder="Type" value="<?= $type; ?>" />
                                <?= form_error('type') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?= $description; ?>" />
                                <?= form_error('description') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('submission_type_details') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
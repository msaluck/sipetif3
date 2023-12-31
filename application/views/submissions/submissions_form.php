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
                            <label class="col-md-2" for="varchar">Portfolio Database</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="portfolio_database" id="portfolio_database" placeholder="Portfolio Database" value="<?= $portfolio_database; ?>" />
                                <?= form_error('portfolio_database') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Portfolio Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="portfolio_id" id="portfolio_id" placeholder="Portfolio Id" value="<?= $portfolio_id; ?>" />
                                <?= form_error('portfolio_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Submission Status</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="submission_status" id="submission_status" placeholder="Submission Status" value="<?= $submission_status; ?>" />
                                <?= form_error('submission_status') ?>
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
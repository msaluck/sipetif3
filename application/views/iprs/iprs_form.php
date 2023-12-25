<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Iprs
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?= $id; ?>" />
                                <?= form_error('id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Category</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="<?= $category; ?>" />
                                <?= form_error('category') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Request Year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="request_year" id="request_year" placeholder="Request Year" value="<?= $request_year; ?>" />
                                <?= form_error('request_year') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Request Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="request_number" id="request_number" placeholder="Request Number" value="<?= $request_number; ?>" />
                                <?= form_error('request_number') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Inventor</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="inventor" id="inventor" placeholder="Inventor" value="<?= $inventor; ?>" />
                                <?= form_error('inventor') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Patent Holder</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="patent_holder" id="patent_holder" placeholder="Patent Holder" value="<?= $patent_holder; ?>" />
                                <?= form_error('patent_holder') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Publication Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publication_date" id="publication_date" placeholder="Publication Date" value="<?= $publication_date; ?>" />
                                <?= form_error('publication_date') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $title; ?>" />
                                <?= form_error('title') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="" value="<?= $; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('iprs') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
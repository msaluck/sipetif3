<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Ipr documents
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="bigint">Authors Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="authors_id" id="authors_id" placeholder="Authors Id" value="<?= $authors_id; ?>" />
                                <?= form_error('authors_id') ?>
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
                            <label class="col-md-2" for="date">Filing Date</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="filing_date" id="filing_date" placeholder="Filing Date" value="<?= $filing_date; ?>" readonly/>
                                    <?= form_error('filing_date') ?>
                                </div>
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
                            <label class="col-md-2" for="date">Publication Date</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="publication_date" id="publication_date" placeholder="Publication Date" value="<?= $publication_date; ?>" readonly/>
                                    <?= form_error('publication_date') ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Publication Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publication_number" id="publication_number" placeholder="Publication Number" value="<?= $publication_number; ?>" />
                                <?= form_error('publication_number') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Reception Date</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="reception_date" id="reception_date" placeholder="Reception Date" value="<?= $reception_date; ?>" readonly/>
                                    <?= form_error('reception_date') ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Registration Date</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="registration_date" id="registration_date" placeholder="Registration Date" value="<?= $registration_date; ?>" readonly/>
                                    <?= form_error('registration_date') ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Registration Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Registration Number" value="<?= $registration_number; ?>" />
                                <?= form_error('registration_number') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Requests Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="requests_number" id="requests_number" placeholder="Requests Number" value="<?= $requests_number; ?>" />
                                <?= form_error('requests_number') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="smallint">Requests Year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="requests_year" id="requests_year" placeholder="Requests Year" value="<?= $requests_year; ?>" />
                                <?= form_error('requests_year') ?>
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
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('ipr_documents') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
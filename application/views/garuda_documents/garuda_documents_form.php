<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Garuda documents
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Author Order</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="author_order" id="author_order" placeholder="Author Order" value="<?= $author_order; ?>" />
                                <?= form_error('author_order') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Accreditation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="accreditation" id="accreditation" placeholder="Accreditation" value="<?= $accreditation; ?>" />
                                <?= form_error('accreditation') ?>
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
                            <label class="col-md-2" for="abstract">Abstract</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="abstract" id="abstract" placeholder="Abstract"><?= $abstract; ?></textarea>
                                <? form_error('abstract')?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Publisher Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publisher_name" id="publisher_name" placeholder="Publisher Name" value="<?= $publisher_name; ?>" />
                                <?= form_error('publisher_name') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Publish Date</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="publish_date" id="publish_date" placeholder="Publish Date" value="<?= $publish_date; ?>" readonly/>
                                    <?= form_error('publish_date') ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="smallint">Publish Year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publish_year" id="publish_year" placeholder="Publish Year" value="<?= $publish_year; ?>" />
                                <?= form_error('publish_year') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Doi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="doi" id="doi" placeholder="Doi" value="<?= $doi; ?>" />
                                <?= form_error('doi') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Citation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="citation" id="citation" placeholder="Citation" value="<?= $citation; ?>" />
                                <?= form_error('citation') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Source</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="source" id="source" placeholder="Source" value="<?= $source; ?>" />
                                <?= form_error('source') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Source Issue</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="source_issue" id="source_issue" placeholder="Source Issue" value="<?= $source_issue; ?>" />
                                <?= form_error('source_issue') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Source Page</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="source_page" id="source_page" placeholder="Source Page" value="<?= $source_page; ?>" />
                                <?= form_error('source_page') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Url</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?= $url; ?>" />
                                <?= form_error('url') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Authors Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="authors_id" id="authors_id" placeholder="Authors Id" value="<?= $authors_id; ?>" />
                                <?= form_error('authors_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('garuda_documents') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
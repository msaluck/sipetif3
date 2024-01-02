<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Wos documents
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="bigint">Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?= $id; ?>" />
                                <?= form_error('id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="bigint">Publons Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publons_id" id="publons_id" placeholder="Publons Id" value="<?= $publons_id; ?>" />
                                <?= form_error('publons_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Wos Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="wos_id" id="wos_id" placeholder="Wos Id" value="<?= $wos_id; ?>" />
                                <?= form_error('wos_id') ?>
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
                            <label class="col-md-2" for="varchar">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $title; ?>" />
                                <?= form_error('title') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">First Author</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_author" id="first_author" placeholder="First Author" value="<?= $first_author; ?>" />
                                <?= form_error('first_author') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Last Author</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_author" id="last_author" placeholder="Last Author" value="<?= $last_author; ?>" />
                                <?= form_error('last_author') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Authors</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="authors" id="authors" placeholder="Authors" value="<?= $authors; ?>" />
                                <?= form_error('authors') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Publish Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publish_date" id="publish_date" placeholder="Publish Date" value="<?= $publish_date; ?>" />
                                <?= form_error('publish_date') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Journal Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="journal_name" id="journal_name" placeholder="Journal Name" value="<?= $journal_name; ?>" />
                                <?= form_error('journal_name') ?>
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
                            <label class="col-md-2" for="abstract">Abstract</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="abstract" id="abstract" placeholder="Abstract"><?= $abstract; ?></textarea>
                                <? form_error('abstract')?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Publish Type</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publish_type" id="publish_type" placeholder="Publish Type" value="<?= $publish_type; ?>" />
                                <?= form_error('publish_type') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Publish Year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publish_year" id="publish_year" placeholder="Publish Year" value="<?= $publish_year; ?>" />
                                <?= form_error('publish_year') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Page Begin</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="page_begin" id="page_begin" placeholder="Page Begin" value="<?= $page_begin; ?>" />
                                <?= form_error('page_begin') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Page End</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="page_end" id="page_end" placeholder="Page End" value="<?= $page_end; ?>" />
                                <?= form_error('page_end') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Issn</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="issn" id="issn" placeholder="Issn" value="<?= $issn; ?>" />
                                <?= form_error('issn') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Eissn</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="eissn" id="eissn" placeholder="Eissn" value="<?= $eissn; ?>" />
                                <?= form_error('eissn') ?>
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
                                <input type="hidden" name="" value="<?= $; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('wos_documents') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
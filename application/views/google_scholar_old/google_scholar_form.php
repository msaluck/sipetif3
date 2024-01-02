<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Google scholar
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
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
                            <label class="col-md-2" for="varchar">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $title; ?>" />
                                <?= form_error('title') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Abstract</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="abstract" id="abstract" placeholder="Abstract" value="<?= $abstract; ?>" />
                                <?= form_error('abstract') ?>
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
                            <label class="col-md-2" for="varchar">Journal Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="journal_name" id="journal_name" placeholder="Journal Name" value="<?= $journal_name; ?>" />
                                <?= form_error('journal_name') ?>
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
                            <label class="col-md-2" for="int">Citation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="citation" id="citation" placeholder="Citation" value="<?= $citation; ?>" />
                                <?= form_error('citation') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Author</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="author" id="author" placeholder="Author" value="<?= $author; ?>" />
                                <?= form_error('author') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">File</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="file" id="file" placeholder="File" value="<?= $file; ?>" />
                                <?= form_error('file') ?>
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
                            <label class="col-md-2" for="varchar">Url</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?= $url; ?>" />
                                <?= form_error('url') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="tinyint">Is Submitted</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="is_submitted" id="is_submitted" placeholder="Is Submitted" value="<?= $is_submitted; ?>" />
                                <?= form_error('is_submitted') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('google_scholar') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Wos
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
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
                            <label class="col-md-2" for="varchar">Author</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="author" id="author" placeholder="Author" value="<?= $author; ?>" />
                                <?= form_error('author') ?>
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
                            <label class="col-md-2" for="varchar">Issn</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="issn" id="issn" placeholder="Issn" value="<?= $issn; ?>" />
                                <?= form_error('issn') ?>
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
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('wos') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
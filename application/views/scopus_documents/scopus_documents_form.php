<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Scopus documents
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
                            <label class="col-md-2" for="varchar">Quartile</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quartile" id="quartile" placeholder="Quartile" value="<?= $quartile; ?>" />
                                <?= form_error('quartile') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="title">Title</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="title" id="title" placeholder="Title"><?= $title; ?></textarea>
                                <? form_error('title')?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Publication Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publication_name" id="publication_name" placeholder="Publication Name" value="<?= $publication_name; ?>" />
                                <?= form_error('publication_name') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Creator</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="creator" id="creator" placeholder="Creator" value="<?= $creator; ?>" />
                                <?= form_error('creator') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">PAGE</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="PAGE" id="PAGE" placeholder="PAGE" value="<?= $PAGE; ?>" />
                                <?= form_error('PAGE') ?>
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
                            <label class="col-md-2" for="varchar">Volume</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="volume" id="volume" placeholder="Volume" value="<?= $volume; ?>" />
                                <?= form_error('volume') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Cover Date</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="cover_date" id="cover_date" placeholder="Cover Date" value="<?= $cover_date; ?>" readonly/>
                                    <?= form_error('cover_date') ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Cover Display Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cover_display_date" id="cover_display_date" placeholder="Cover Display Date" value="<?= $cover_display_date; ?>" />
                                <?= form_error('cover_display_date') ?>
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
                            <label class="col-md-2" for="int">Citedby Count</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="citedby_count" id="citedby_count" placeholder="Citedby Count" value="<?= $citedby_count; ?>" />
                                <?= form_error('citedby_count') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Aggregation Type</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="aggregation_type" id="aggregation_type" placeholder="Aggregation Type" value="<?= $aggregation_type; ?>" />
                                <?= form_error('aggregation_type') ?>
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
                                <a href="<?= site_url('scopus_documents') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
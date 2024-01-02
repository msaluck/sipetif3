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
                            <label class="col-md-2" for="bigint">Authors Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="authors_id" id="authors_id" placeholder="Authors Id" value="<?= $authors_id; ?>" />
                                <?= form_error('authors_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Total Document</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="total_document" id="total_document" placeholder="Total Document" value="<?= $total_document; ?>" />
                                <?= form_error('total_document') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Total Citation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="total_citation" id="total_citation" placeholder="Total Citation" value="<?= $total_citation; ?>" />
                                <?= form_error('total_citation') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Total Cited Doc</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="total_cited_doc" id="total_cited_doc" placeholder="Total Cited Doc" value="<?= $total_cited_doc; ?>" />
                                <?= form_error('total_cited_doc') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">H Index</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="h_index" id="h_index" placeholder="H Index" value="<?= $h_index; ?>" />
                                <?= form_error('h_index') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="" value="<?= $; ?>" />
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
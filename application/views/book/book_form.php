<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Book
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
                            <label class="col-md-2" for="varchar">Category</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="<?= $category; ?>" />
                                <?= form_error('category') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Isbn</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Isbn" value="<?= $isbn; ?>" />
                                <?= form_error('isbn') ?>
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
                            <label class="col-md-2" for="varchar">Place</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="place" id="place" placeholder="Place" value="<?= $place; ?>" />
                                <?= form_error('place') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Publisher</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher" value="<?= $publisher; ?>" />
                                <?= form_error('publisher') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="year" id="year" placeholder="Year" value="<?= $year; ?>" />
                                <?= form_error('year') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('book') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
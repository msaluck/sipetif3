<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-list-alt"></i> Data Book documents
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <!-- <a href="<?= site_url('book_documents/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> -->
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th class="text-center" width="15%">Aksi</th>
                                <th>Authors</th>
                                <th>Authors Id</th>
                                <th>Category</th>
                                <th>Isbn</th>
                                <th>Place</th>
                                <th>Publisher</th>
                                <th>Title</th>
                                <th>Year</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($book_documents_data as $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center">
                                        <?php if ($value->idsubmission != null) { ?>
                                            <a href="<?= site_url('submissions/read/' . $value->idsubmission) ?>" title="Ajukan Portofolio" class="btn btn-default"><i class="fas fa-check"></i> Sudah Pernah di ajukan</a>
                                        <?php } else { ?>
                                            <a href="<?= site_url('submissions/submit/' . $value->id . '/book_documents') ?>" title="Ajukan Portofolio" class="btn btn-primary"><i class="fas fa-paper-plane"></i></a>
                                        <?php    } ?>

                                    </td>
                                    <td><?= $value->authors ?></td>
                                    <td><?= $value->authors_id ?></td>
                                    <td><?= $value->category ?></td>
                                    <td><?= $value->isbn ?></td>
                                    <td><?= $value->place ?></td>
                                    <td><?= $value->publisher ?></td>
                                    <td><?= $value->title ?></td>
                                    <td><?= $value->year ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= call_datatable("#mytable") ?>
<?= swal_delete("#mytable", ".hapus") ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-list-alt"></i> Data Google documents
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= site_url('google_documents_by_all/sync') ?>" class="btn btn-secondary"><i class="fa fa-sync"></i> Sinkronisasi Data</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th class="text-center" width="15%">Aksi</th>
                                <th>Abstract</th>
                                <th>Authors</th>
                                <th>Authors Id</th>
                                <th>Citation</th>
                                <th>Idsubmission</th>
                                <th>Journal Name</th>
                                <th>Publish Year</th>
                                <th>Title</th>
                                <th>Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($google_documents_data as $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center">
                                        <?php if ($value->idsubmission != null) { ?>
                                            <button type="button" class="btn btn-primary disabled">
                                                <i class="fas fa-check"></i> Sudah
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-danger disabled">
                                                <i class="fas fa-times"></i> Belum
                                            </button>
                                        <?php } ?>
                                    </td>
                                    <td><?= $value->abstract ?></td>
                                    <td><?= $value->authors ?></td>
                                    <td><?= $value->authors_id ?></td>
                                    <td><?= $value->citation ?></td>
                                    <td><?= $value->idsubmission ?></td>
                                    <td><?= $value->journal_name ?></td>
                                    <td><?= $value->publish_year ?></td>
                                    <td><?= $value->title ?></td>
                                    <td><?= $value->url ?></td>
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
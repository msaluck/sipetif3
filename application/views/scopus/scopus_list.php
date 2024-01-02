<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-list-alt"></i> Data Scopus
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= site_url('scopus/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                <a href="<?= site_url('scopus/synchronize') ?>" class="btn btn-secondary"><i class="fa fa-sync"></i> Sinkronisasi Data</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th>Authors Id</th>
                                <th>Total Document</th>
                                <th>Total Citation</th>
                                <th>Total Cited Doc</th>
                                <th>H Index</th>
                                <th>I10 Index</th>
                                <th>G Index</th>
                                <th>G Index 3year</th>
                                <th>Waktu Update</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($scopus_data as $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value->authors_id ?></td>
                                    <td><?= $value->total_document ?></td>
                                    <td><?= $value->total_citation ?></td>
                                    <td><?= $value->total_cited_doc ?></td>
                                    <td><?= $value->h_index ?></td>
                                    <td><?= $value->i10_index ?></td>
                                    <td><?= $value->g_index ?></td>
                                    <td><?= $value->g_index_3year ?></td>
                                    <td><?= $value->waktu_update ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('scopus/read/' . $value->authors_id) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        <a href="<?= site_url('scopus/update/' . $value->authors_id) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="<?= site_url('scopus/delete/' . $value->authors_id) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a>
                                    </td>
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
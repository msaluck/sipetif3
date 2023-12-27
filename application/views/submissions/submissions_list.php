<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-file"></i> Data Submissions</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <a href="<?= site_url('submissions/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="col-4">
                        <?= $pagination ?>
                    </div>
                    <div class="col-4">
                        <form action="<?= site_url('submissions/index'); ?>" class="form-inline float-right" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q" value="<?= $q; ?>" placeholder="Cari Data">
                                <div class="input-group-append">
                                    <?php if ($q <> '') { ?>
                                        <a href="<?= site_url('buku'); ?>" class="btn btn-danger">Reset</a>
                                    <?php } ?>
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive p-0">
                    <table class="table table-bordered table-hover text-nowrap" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th>Portfolio Database</th>
                                <th>Portfolio Id</th>
                                <th>Submission Status</th>
                                <th>User Id</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($submissions_data as $value) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $value->portfolio_database ?></td>
                                    <td><?= $value->portfolio_id ?></td>
                                    <td><?= $value->submission_status ?></td>
                                    <td><?= $value->user_id ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('submissions/read/' . $value->id) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        <a href="<?= site_url('submissions/update/' . $value->id) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="<?= site_url('submissions/delete/' . $value->id) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a>
                                        <a href="<?= site_url('') ?>" title="Ajukan Surat Permohonan kepada Rektor" class="btn btn-secondary"><i class="fa fa-envelope"></i></a>
                                        <a href="<?= site_url('') ?>" title="Update Data & Bukti" class="btn btn-primary"><i class="fa fa-upload"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="card-footer clearfix mt-2">
                <h5>Jumlah Data : <?= $total_rows ?></h5>
            </div>
        </div>
    </div>
</div>

<?= swal_delete("#mytable", ".hapus") ?>
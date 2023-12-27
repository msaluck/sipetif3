<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-file"></i> Data Submission</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
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
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
           
        </div>
    </div>
</div>
<?= call_datatable('#mytable') ?>
<?= swal_delete("#mytable", ".hapus") ?>
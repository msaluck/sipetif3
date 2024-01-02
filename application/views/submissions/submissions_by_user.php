<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-file"></i> Data Submission</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <table class="table table-bordered table-hover text-nowrap" id="mytable">
                        <thead class="bg-success">
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th>Title</th>
                                <th>Submission Status</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($submissions_data as $value) :
                                $namatabel = $value->portfolio_database;
                                $get_title = $this->db->query("select title from $namatabel where id ='$value->portfolio_id'")->row();
                                if ($get_title) {
                                    $title = $get_title->title;
                                } else {
                                    $title = '';
                                }
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $title ?></td>
                                    <td><?= $value->status_name ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('submissions/read/' . $value->id) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-envelope"></i></a>
                                        <!-- <a href="<?= site_url('submissions/update/' . $value->id) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-edit"></i></a> -->
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
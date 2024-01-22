<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-list-alt"></i> Data Surat permohonan rektor
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= site_url('surat_permohonan_rektor/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
								<th>Acc Rektor</th>
								<th>Created Date</th>
								<th>Submission Id</th>
								<th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($surat_permohonan_rektor_data as $value) { ?>
                            <tr>
								<td class="text-center"><?= $no++; ?></td>
								<td><?= $value->acc_rektor ?></td>
								<td><?= $value->created_date ?></td>
								<td><?= $value->submission_id ?></td>
								<td class="text-center">
                                    <a href="<?= site_url('surat_permohonan_rektor/read/'.$value->id) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('surat_permohonan_rektor/update/'.$value->id) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('surat_permohonan_rektor/delete/'.$value->id) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a>
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
<?= swal_delete("#mytable",".hapus") ?>
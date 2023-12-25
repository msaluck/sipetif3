<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-file"></i> Data Wos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <a href="<?= site_url('wos/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="col-4">
                         <?= $pagination ?>
                    </div>
                    <div class="col-4">
                        <form action="<?= site_url('wos/index'); ?>" class="form-inline float-right" method="get">
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
								<th>Title</th>
								<th>Author</th>
								<th>Journal Name</th>
								<th>Issn</th>
								<th>Citation</th>
								<th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php $no = 1; foreach ($wos_data as $value) : ?>
                            <tr>
								<td class="text-center"><?= $no++ ?></td>
								<td><?= $value->title ?></td>
								<td><?= $value->author ?></td>
								<td><?= $value->journal_name ?></td>
								<td><?= $value->issn ?></td>
								<td><?= $value->citation ?></td>
								<td class="text-center">
                                    <a href="<?= site_url('wos/read/'.$value->id) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('wos/update/'.$value->id) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('wos/delete/'.$value->id) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a>
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

<?= swal_delete("#mytable",".hapus") ?>
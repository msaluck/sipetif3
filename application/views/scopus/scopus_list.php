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
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
								<th>User Id</th>
								<th>Title</th>
								<th>Publication Name</th>
								<th>Quartile</th>
								<th>Issn</th>
								<th>Citeby Count</th>
								<th>Creator</th>
								<th>Page</th>
								<th>Volume</th>
								<th>Cover Date</th>
								<th>Cover Display Date</th>
								<th>Doi</th>
								<th>Aggregation Type</th>
								<th>Url</th>
								<th>Author</th>
								<th>File</th>
								<th>Is Submitted</th>
								<th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($scopus_data as $value) { ?>
                            <tr>
								<td class="text-center"><?= $no++; ?></td>
								<td><?= $value->user_id ?></td>
								<td><?= $value->title ?></td>
								<td><?= $value->publication_name ?></td>
								<td><?= $value->quartile ?></td>
								<td><?= $value->issn ?></td>
								<td><?= $value->citeby_count ?></td>
								<td><?= $value->creator ?></td>
								<td><?= $value->page ?></td>
								<td><?= $value->volume ?></td>
								<td><?= $value->cover_date ?></td>
								<td><?= $value->cover_display_date ?></td>
								<td><?= $value->doi ?></td>
								<td><?= $value->aggregation_type ?></td>
								<td><?= $value->url ?></td>
								<td><?= $value->author ?></td>
								<td><?= $value->file ?></td>
								<td><?= $value->is_submitted ?></td>
								<td class="text-center">
                                    <a href="<?= site_url('scopus/read/'.$value->id) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('scopus/update/'.$value->id) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('scopus/delete/'.$value->id) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a>
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
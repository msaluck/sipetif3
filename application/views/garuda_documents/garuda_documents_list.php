<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-list-alt"></i> Data Garuda documents
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <!-- <a href="<?= site_url('garuda_documents/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> -->
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th class="text-center" width="10%">Aksi</th>
                                <th>Title</th>
                                <th>Accreditation</th>
                                <th>Author Order</th>
                                <th>Abstract</th>
                                <th>Publisher Name</th>
                                <th>Publish Date</th>
                                <th>Publish Year</th>
                                <th>Doi</th>
                                <th>Citation</th>
                                <th>Source</th>
                                <th>Source Issue</th>
                                <th>Source Page</th>
                                <th>Url</th>
                                <th>Authors Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($garuda_documents_data as $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center">
                                        <?php if ($value->idsubmission != null) { ?>
                                            <a href="<?= site_url('submissions/read/' . $value->idsubmission) ?>" title="Ajukan Portofolio" class="btn btn-default"><i class="fas fa-check"></i> Sudah Pernah di ajukan</a>
                                        <?php } else { ?>
                                            <a href="<?= site_url('submissions/submit/' . $value->id . '/garuda_documents') ?>" title="Ajukan Portofolio" class="btn btn-primary"><i class="fas fa-paper-plane"></i></a>
                                        <?php    } ?>
                                    </td>
                                    <td><?= $value->title ?></td>
                                    <td><?= $value->accreditation ?></td>
                                    <td><?= $value->author_order ?></td>
                                    <td><?= $value->abstract ?></td>
                                    <td><?= $value->publisher_name ?></td>
                                    <td><?= $value->publish_date ?></td>
                                    <td><?= $value->publish_year ?></td>
                                    <td><?= $value->doi ?></td>
                                    <td><?= $value->citation ?></td>
                                    <td><?= $value->source ?></td>
                                    <td><?= $value->source_issue ?></td>
                                    <td><?= $value->source_page ?></td>
                                    <td><?= $value->url ?></td>
                                    <td><?= $value->authors_id ?></td>
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
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-list-alt"></i> Data Ipr documents
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= site_url('ipr_documents_by_all/sync') ?>" class="btn btn-secondary"><i class="fa fa-sync"></i> Sinkronisasi Data</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th class="text-center" width="15%">Ajukan?</th>
                                <th>Authors Id</th>
                                <th>Category</th>
                                <th>Filing Date</th>
                                <th>Inventor</th>
                                <th>Patent Holder</th>
                                <th>Publication Date</th>
                                <th>Publication Number</th>
                                <th>Reception Date</th>
                                <th>Registration Date</th>
                                <th>Registration Number</th>
                                <th>Requests Number</th>
                                <th>Requests Year</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($ipr_documents_data as $value) { ?>
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
                                    <td><?= $value->authors_id ?></td>
                                    <td><?= $value->category ?></td>
                                    <td><?= $value->filing_date ?></td>
                                    <td><?= $value->inventor ?></td>
                                    <td><?= $value->patent_holder ?></td>
                                    <td><?= $value->publication_date ?></td>
                                    <td><?= $value->publication_number ?></td>
                                    <td><?= $value->reception_date ?></td>
                                    <td><?= $value->registration_date ?></td>
                                    <td><?= $value->registration_number ?></td>
                                    <td><?= $value->requests_number ?></td>
                                    <td><?= $value->requests_year ?></td>
                                    <td><?= $value->title ?></td>
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
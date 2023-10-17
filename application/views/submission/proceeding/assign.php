<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('') ?>">Beranda</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">DETAIL USULAN</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="proposer">Submission ID</label>
                                        <input type="text" class="form-control" id="submission-id" name="submission-id" value="<?= $submissionId; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="proposer">Submission Status</label>
                                        <input type="text" class="form-control" id="submission-status" name="submission-status" value="<?= $submissionStatus; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="proposer">Pengusul</label>
                                <input type="text" class="form-control" id="proposer" name="proposer" value="<?= $submission_details['proposer'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="manuscript-title">Judul Artikel</label>
                                <textarea class="form-control" rows="3" id="manuscript-title" name="manuscript-title" disabled><?= $submission_details['manuscript-title']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="proceeding">Prosiding</label>
                                <input type="text" class="form-control" id="proceeding" name="proceeding" value="<?= $submission_details['proceeding'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="publication-year">Tahun Terbit</label>
                                <input type="text" class="form-control" id="publication-year" name="publication-year" value="<?= $submission_details['publication-year'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">ASSIGN REVIEW</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="reviewer-order">Pilih Reviewer ke</label>
                                <select id="reviewer-order" name="reviewer-order" class="form-control custom-select" required>
                                    <option value="">Pilih Urutan</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="reviewer-list">Pilih Identitas Reviewer</label>
                                <select id="reviewer-list" name="reviewer-list" class="form-control custom-select" required>
                                    <option value="">Pilih Reviewer</option>
                                    <?php foreach ($reviewer_identities as $reviewer_identity) { ?>
                                        <option value=<?= $reviewer_identity->id ?>><?= $reviewer_identity->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary float-right assign-reviewer" name="assign">Assign Reviewer</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">DAFTAR DOKUMEN</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table" id="uploaded-proceeding-document-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Dokumen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="proceeding-documents-data">
                                </tbody>
                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="previewModalLabel">PDF Preview</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe src="" width="100%" height="600" allow="fullscreen"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">DAFTAR REVIEWER</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table" id="reviewers-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Reviewer</th>
                                        <th>Posisi Reviewer</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="reviewers-data">
                                    <!-- <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= site_url('menu/submissions') ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>
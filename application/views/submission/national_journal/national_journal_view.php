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
                <div class="col-12">
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
                            <?= form_open('submission/proceeding/actions'); ?>
                            <div class="row">
                                <div class="col-6">
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="proposer">Pengusul</label>
                                                <input type="text" class="form-control" id="proposer" name="proposer" value="<?= $submission_details['proposer']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="manuscript-title">Judul Publikasi</label>
                                                <textarea class="form-control" rows="3" id="manuscript-title" name="manuscript-title" disabled><?= $submission_details['manuscript-title']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="proceeding">Nama Prosiding</label>
                                                <input type="text" class="form-control" id="proceeding" name="proceeding" value="<?= $submission_details['proceeding']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="doi">DOI</label>
                                                <input type="text" class="form-control" id="doi" name="doi" value="<?= $submission_details['doi']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="issn">ISSN</label>
                                                <input type="text" class="form-control" id="issn" name="issn" value="<?= $submission_details['issn']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="publication-year">Tahun Terbit</label>
                                                <input type="text" class="form-control" id="publication-year" name="publication-year" value="<?= $submission_details['publication-year']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="page">Halaman</label>
                                                <input type="text" class="form-control" id="page" name="page" value="<?= $submission_details['page']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="volume">Volume</label>
                                                <input type="text" class="form-control" id="volume" name="volume" value="<?= $submission_details['volume']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="number">Nomor</label>
                                                <input type="text" class="form-control" id="number" name="number" value="<?= $submission_details['number']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="proceeding-document-types">Jenis Dokumen</label>
                                                <select id="proceeding-document-types" name="proceeding-document-types" class="form-control custom-select" disabled>
                                                    <option value="">Pilih Dokumen Proceeding</option>
                                                    <option value="application-letter-to-rector">Surat Permohonan Kepada Rektor</option>
                                                    <option value="letter-of-acceptance">Letter of Acceptance</option>
                                                    <option value="manuscript">Print-out artikel terpublikasi / artikel dalam proses</option>
                                                    <option value="search-result-indexer-database">Print-out Hasil Pencarian Database Pengindeks menampilkan Nama Penulis Utama & Judul Artikel</option>
                                                    <option value="four-nation-proceeding">Print-out Bukti Artikel Prosiding 4 Negara</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="proceeding-documents" name="proceeding-documents" disabled>
                                                    <label id="proceeding-documents-label" class="custom-file-label" for="proceeding-documents">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <input type="button" value="Upload" class="input-group-text upload-proceeding-document" id="upload" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped" id="proceeding-doc-table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Dokumen</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= site_url('menu/submission') ?>" class="btn btn-danger">Kembali</a>
                            <input type="submit" class="btn btn-primary float-right" name="submit-add" value="Submit" disabled />
                            <input type="submit" class="btn btn-secondary float-right" style="margin-right: 5px;" name="draft-add" value="Draft" disabled />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>
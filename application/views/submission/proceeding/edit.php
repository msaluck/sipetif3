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
                                    <input type="text" class="form-control" id="submission-id" name="submission-id" value="<?= $submission_id; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="proposer">Submission Status</label>
                                    <input type="text" class="form-control" id="submission-status" name="submission-status" value="<?= $submission_status; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="proposer">Pengusul</label>
                                    <input type="text" class="form-control" id="proposer" name="proposer" value="<?= isset($submission_details['proposer']) ? $submission_details['proposer'] : '-' ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">Judul Publikasi</label>
                                    <textarea class="form-control" rows="3" id="title" name="title" disabled><?= isset($submission_details['title']) ? $submission_details['title'] : '-' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="proceeding">Nama Prosiding</label>
                                    <input type="text" class="form-control" id="proceeding" name="proceeding" value="<?= isset($submission_details['proceeding']) ? $submission_details['proceeding'] : '-'  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="doi">DOI</label>
                                    <input type="text" class="form-control" id="doi" name="doi" value="<?= isset($submission_details['doi']) ? $submission_details['doi'] : '-' ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="issn">ISSN</label>
                                    <input type="text" class="form-control" id="issn" name="issn" value="<?= isset($submission_details['issn']) ? $submission_details['issn'] : '-'; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="publication-year">Tahun Terbit</label>
                                    <input type="text" class="form-control" id="publication-year" name="publication-year" value="<?= isset($submission_details['publication-year']) ? $submission_details['publication-year'] : '-' ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="page">Halaman</label>
                                    <input type="text" class="form-control" id="page" name="page" value="<?= isset($submission_details['page']) ? $submission_details['page'] : '-' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input type="text" class="form-control" id="volume" name="volume" value="<?= isset($submission_details['volume']) ? $submission_details['volume'] : '-' ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="number">Nomor</label>
                                    <input type="text" class="form-control" id="number" name="number" value="<?= isset($submission_details['number']) ? $submission_details['number'] : '-' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="proceeding-document-types">Jenis Dokumen</label>
                                    <select id="proceeding-document-types" name="proceeding-document-types" class="form-control custom-select">
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
                                        <input type="file" class="custom-file-input" id="proceeding-documents" name="proceeding-documents">
                                        <label id="proceeding-documents-label" class="custom-file-label" for="proceeding-documents">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="button" value="Upload" class="input-group-text upload-proceeding-document" id="upload">
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
                <a href="<?= site_url('submission') ?>" class="btn btn-danger">Kembali</a>
                <input type="submit" class="btn btn-primary float-right" name="submit-add" value="Submit" />
                <input type="submit" class="btn btn-secondary float-right" style="margin-right: 5px;" name="draft-add" value="Draft" />
                </form>
            </div>
        </div>
    </div>
</div>
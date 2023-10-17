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
                <?= form_open('submission/international-journal/actions'); ?>
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
                                    <input type="text" class="form-control" id="proposer" name="proposer" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="manuscript-title">Judul Publikasi</label>
                                    <textarea class="form-control" rows="3" id="manuscript-title" name="manuscript-title" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="international-journal">Nama Jurnal</label>
                                    <input type="text" class="form-control" id="international-journal" name="international-journal" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="doi">DOI</label>
                                    <input type="text" class="form-control" id="doi" name="doi" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="issn">ISSN</label>
                                    <input type="text" class="form-control" id="issn" name="issn" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="publication-year">Tahun</label>
                                    <input type="text" class="form-control" id="publication-year" name="publication-year" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="page">Halaman</label>
                                    <input type="text" class="form-control" id="page" name="page" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input type="text" class="form-control" id="volume" name="volume" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="number">Nomor</label>
                                    <input type="text" class="form-control" id="number" name="number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="issn-online">ISSN Online</label>
                                    <input type="text" class="form-control" id="issn" name="issn-online" required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="international-journal-document-types">Jenis Dokumen</label>
                                    <select id="international-journal-document-types" name="international-journal-document-types" class="form-control custom-select" disabled>
                                        <option value="">Pilih Dokumen</option>
                                        <option value="application-letter-to-rector">Surat Permohonan Kepada Rektor</option>
                                        <option value="letter-of-acceptance">Letter of Acceptance</option>
                                        <option value="manuscript">Print-out artikel terpublikasi / artikel dalam proses</option>
                                        <option value="search-result-indexer-database">Print-out Hasil Pencarian Database Pengindeks menampilkan Nama Penulis Utama & Judul Artikel</option>
                                        <option value="four-nation-international-journal">Print-out Bukti Artikel Prosiding 4 Negara</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="international-journal-documents" name="international-journal-documents" disabled>
                                        <label id="international-journal-documents-label" class="custom-file-label" for="international-journal-documents">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="button" value="Upload" class="input-group-text upload-international-journal-document" id="upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped" id="uploaded-international-journal-document-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Dokumen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="international-journal-documents-data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= site_url('menu/submission') ?>" class="btn btn-danger">Kembali</a>
                <input type="submit" class="btn btn-primary float-right" name="submit-add" value="Submit" disabled />
                <input type="submit" class="btn btn-secondary float-right" style="margin-right: 5px;" name="draft-add" value="Draft" />
                </form>
            </div>
        </div>
    </div>
</div>
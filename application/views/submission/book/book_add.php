<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">DETAIL USULAN</h3>
                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <textarea class="form-control" rows="3" id="title"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Jumlah Halaman</label>
                                    <input type="text" class="form-control" id="page">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <input type="text" class="form-control" id="year" placeholder="Input Seminar Internasional">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="book-document-types">Jenis Dokumen</label>
                                    <select id="book-document-types" name="book-document-types" class="form-control custom-select" required>
                                        <option value="">Pilih Dokumen Buku</option>
                                        <option value="application-letter-to-rector">Surat Permohonan Kepada Rektor</option>
                                        <option value="copy-of-book-with-isbn">Salinan Buku Tercetak dan Memiliki ISBN</option>
                                        <option value="knowledge-field-review-statement-letter">Surat Pernyataan Telaah Bidang Ilmu</option>
                                        <option value="language-review-statement-letter">Surat Pernyataan Telaah Bahasa</option>
                                        <option value="">Surat Pernyataan Belum di Danai</option>
                                        <option value="bank-account-submitter">Fotokopi Rekening Bank Pengusul</option>
                                        <option value="bank-account-content-review">Fotokopi Rekening Bank Penelaah Isi</option>
                                        <option value="bank-account-language-review">Fotokopi Rekening Bank Penyelaras Bahasa</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="book-documents" name="book-documents">
                                        <label id="book-documents-label" class="custom-file-label" for="book-documents">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" value="Upload" class="input-group-text upload-book-document" id="upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="type">Jenis</label>
                    <select id="type" name="type" class="form-control custom-select">
                        <option value="">Pilih Jenis</option>
                        <option value="">Ajar</option>
                        <option value="">Referensi</option>
                        <option value="">Monograf</option>
                        <option value="">Teknologi Tepat Guna</option>
                        <option value="">International Book / Book Chapter</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="language">Bahasa</label>
                    <select id="language" name="language" class="form-control custom-select">
                        <option>Indonesia</option>
                        <option>Inggris</option>
                        <option>Cina</option>
                        <option>Arab</option>
                        <option>Spanyol</option>
                        <option>Prancis</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">PERSYARATAN</h3>
                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="book-document-types">Jenis Dokumen</label>
                    <select id="book-document-types" name="book-document-types" class="form-control custom-select" required>
                        <option value="">Pilih Dokumen Buku</option>
                        <option value="application-letter-to-rector">Surat Permohonan Kepada Rektor</option>
                        <option value="copy-of-book-with-isbn">Salinan Buku Tercetak dan Memiliki ISBN</option>
                        <option value="knowledge-field-review-statement-letter">Surat Pernyataan Telaah Bidang Ilmu</option>
                        <option value="language-review-statement-letter">Surat Pernyataan Telaah Bahasa</option>
                        <option value="">Surat Pernyataan Belum di Danai</option>
                        <option value="bank-account-submitter">Fotokopi Rekening Bank Pengusul</option>
                        <option value="bank-account-content-review">Fotokopi Rekening Bank Penelaah Isi</option>
                        <option value="bank-account-language-review">Fotokopi Rekening Bank Penyelaras Bahasa</option>
                    </select>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="book-documents" name="book-documents">
                        <label id="book-documents-label" class="custom-file-label" for="book-documents">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <input type="submit" value="Upload" class="input-group-text upload-book-document" id="upload">
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class=" card-header">
                <div class="card-title">DOKUMEN PERSYARATAN</div>
                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Surat Pernyataan Bermaterai</td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary collapsed-card">
            <div class="card-header">
                <h3 class="card-title">PERSYARATAN</h3>
                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= form_open_multipart('submission/b_application_letter') ?>
                <div class="form-group">
                    <label for="application_letter">Surat Permohonan kepada Rektor</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="b_application_letter" name="b_application_letter">
                            <label class="custom-file-label" for="b_application_letter">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" value="Upload" class="input-group-text">
                        </div>
                    </div>
                </div>
                </form>
                <?= form_open_multipart('submission/b_knowledge_covering_letter') ?>
                <div class="form-group">
                    <label for="manuscript">Surat Pernyataan Telaah Bidang Ilmu</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="b_knowledge_covering_letter" name="b_knowledge_covering_letter">
                            <label class="custom-file-label" for="b_knowledge_covering_letter">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" value="Upload" class="input-group-text">
                        </div>
                    </div>
                </div>
                </from>
                <?= form_open_multipart('submission/b_language_covering_letter') ?>
                <div class="form-group">
                    <label for="manuscript">Surat Pernyataan Telaah Bahasa</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="b_language_covering_letter" name="b_language_covering_letter">
                            <label class="custom-file-label" for="b_language_covering_letter">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" value="Upload" class="input-group-text">
                        </div>
                    </div>
                </div>
                </from>
                <?= form_open_multipart('submission/b_statement_letter') ?>
                <div class="form-group">
                    <label for="pageaddress">Surat pernyataan bermaterai
                        <ul>
                            <li>belum didanai dari sumber dana pemerintah</li>
                        </ul>
                    </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="b_statement_letter" for="b_statement_letter">
                            <label class="custom-file-label" for="b_statement_letter">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" value="Upload" class="input-group-text">
                        </div>
                    </div>
                </div>
                </form>
                <?= form_open_multipart('submission/b_bank_account_copy') ?>
                <div class="form-group">
                    <label for="bankaccount">Fotokopi Buku Rekening Bank</label>
                    <ul>
                        <li>Pengusul</li>
                        <li>Penelaah Isi</li>
                        <li>Penyelaras bahasa</li>
                    </ul>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="b_bank_account_copy" for="b_bank_account_copy">
                            <label class="custom-file-label" for="b_bank_account_copy">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" value="Upload" class="input-group-text">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary collapsed-card">
            <div class="card-header">
                <div class="card-title">DOKUMEN PERSYARATAN</div>
                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Surat Pernyataan Bermaterai</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn bg-gradient-danger" type="button">Hapus</button>
                                    <button class="btn bg-gradient-primary" type="button">Tampil</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
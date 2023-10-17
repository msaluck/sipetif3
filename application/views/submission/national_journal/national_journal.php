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
                        <li class="breadcrumb-item"><a href="#"></a></li>
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
                                <button class="btn btn-tool" type="button" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <textarea class="form-control" rows="3" id="articleTitle" placeholder="Input Judul Artikel"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jurnal</label>
                                <input type="text" class="form-control" id="internationalSeminar" placeholder="Input Seminar Internasional">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">DATA DAN BUKTI</h3>
                            <div class="card-tools">
                                <button class="btn btn-tool" type="button" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="national-journal-document-types">Jenis Dokumen</label>
                                <select id="national-journal-document-types" name="national-journal-document-types" class="form-control custom-select" required>
                                    <option value="">Pilih Dokumen Jurnal Nasional</option>
                                    <option value="application-letter-to-rector">Surat Permohonan Kepada Rektor</option>
                                    <option value="manuscript">Printout Artikel Terpublikasi</option>
                                    <option value="board-of-directors">Printout Dewan Redaksi</option>
                                    <option value="indexing-status-scimago">Printout Alamat Laman Bukti Berkala Terindeks</option>
                                    <option value="application-letter-to-head-institution">Surat Pernyataan Bermaterai Diketahui oleh Ketua LPPM</option>
                                    <option value="bank-account">Fotokopi Bagian Depan Rekening Bank</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="national-journal-documents" name="national-journal-documents">
                                    <label id="national-journal-documents-label" class="custom-file-label" for="national-journal-documents">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <input type="submit" value="Upload" class="input-group-text upload-national-journal-document" id="upload">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Surat pernyataan bermaterai yang diketahui oleh Ketua LPPM berisi
                                    <ul>
                                        <li>penyataan artikel belum mendapatkan insentif dari sumber dana pemerintah</li>
                                        <li>informasi sumber dana, skema, dan tahun pelaksanaan penelitian</li>
                                    </ul>
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <div class="card-title">BUKTI DOKUMEN</div>
                            <div class="card-tools">
                                <button class="btn btn-tool" type="button" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
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
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">DATA DAN BUKTI</h3>
                            <div class="card-tools">
                                <button class="btn btn-tool" type="button" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Surat Permohonan kepada Rektor dengan surat pengantar dari pimpinan unit kerja</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="application_letter">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Printout artikel terpublikasi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Print out dewan direksi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>print screen alamat laman</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>print screen infomasi berkala terindeks</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Surat pernyataan bermaterai yang diketahui oleh Ketua LPPM berisi
                                    <ul>
                                        <li>penyataan artikel belum mendapatkan insentif dari sumber dana pemerintah</li>
                                        <li>informasi sumber dana, skema, dan tahun pelaksanaan penelitian</li>
                                    </ul>
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fotokopi Buku Rekening Bank</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <div class="card-title">BUKTI DOKUMEN</div>
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
            </div> -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>
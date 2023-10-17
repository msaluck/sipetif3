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
                        <li class="breadcrumb-item"><a href=""><?= $data; ?> </a></li>
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
                <div class="col-md-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">USULAN</h3>
                            <div class="card-tools">
                                <button class="btn btn-tool" type="button" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: none;">
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Dokumen Persyaratan</label>
                                        <select class="form-control">
                                            <option>Surat Permohonan kepada Rektor</option>
                                            <option>Printout artikel terpublikasi</option>
                                            <option>Print out dewan direksi</option>
                                            <option>Print screen alamat laman</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <?= form_open_multipart('submission/upload_application_letter') ?>
                            <div class="form-group">
                                <label for="application_letter">Surat Permohonan kepada Rektor dengan surat pengantar dari pimpinan unit kerja</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="application_letter" name="application_letter">
                                        <label class="custom-file-label" for="application_letter">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" value="Upload" class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?= form_open_multipart('submission/upload_manuscript') ?>
                            <div class="form-group">
                                <label for="manuscript">Printout artikel terpublikasi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="manuscript" name="manuscript">
                                        <label class="custom-file-label" fo="manuscript">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" value="Upload" class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            </from>
                            <?= form_open_multipart('submission/upload_boardofdirectors') ?>
                            <div class="form-group">
                                <label for="boardofdirectors">Print out dewan direksi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="boardofdirectors" name="boardofdirectors">
                                        <label class="custom-file-label" for="boardofdirectors">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" value="Upload" class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?= form_open_multipart('submission/upload_pageaddress') ?>
                            <div class="form-group">
                                <label for="pageaddress">Print screen alamat laman</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pageaddress" name="pageaddress">
                                        <label class="custom-file-label" for="pageaddress">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" value="Upload" class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?= form_open_multipart('submission/upload_pageaddress') ?>
                            <div class="form-group">
                                <label>Print screen infomasi berkala ilmiah dari laman SCImago *untuk berkala yang terindeks Scopus</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" value="Upload" class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?= form_open_multipart('submission/upload_pageaddress') ?>
                            <div class="form-group">
                                <label for="pageaddress">Surat pernyataan bermaterai yang diketahui oleh Ketua LPPM berisi
                                    <ul>
                                        <li>penyataan artikel belum mendapatkan insentif dari sumber dana pemerintah</li>
                                        <li>informasi sumber dana, skema, dan tahun pelaksanaan penelitian</li>
                                    </ul>
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pageaddress" for="pageaddress">
                                        <label class="custom-file-label" for="pageaddress">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" value="Upload" class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?= form_open_multipart('submission/upload_bankaccount') ?>
                            <div class="form-group">
                                <label for="bankaccount">Fotokopi Buku Rekening Bank</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bankaccount" for="bankaccount">
                                        <label class="custom-file-label" for="bankaccount">Choose file</label>
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
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>
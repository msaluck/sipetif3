<div class="row">
    <div class="col-md-12">
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
                <?= form_open('submission/intellectual-property/actions'); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nomor</label>
                                    <input type="text" class="form-control" id="ip-number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <textarea class="form-control" rows="3" id="ip-title"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Inventor</label>
                                    <input type="text" class="form-control" id="ip-inventor">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ip-type">Jenis</label>
                                    <select id="ip-type" name="ip-type" class="form-control custom-select">
                                        <option value="">Paten</option>
                                        <option value="">Paten Sederhana</option>
                                        <option value="">Perlindungan Varietas Tanaman (PVT)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tanggal Pemberian</label>
                                    <div class="input-group date" id="ip-date" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#ip-date" />
                                        <div class="input-group-append" data-target="#ip-date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="intellectual-properties-document-types">Jenis Dokumen</label>
                                    <select id="intellectual-properties-document-types" name="intellectual-properties-document-types" class="form-control custom-select" required>
                                        <option value="">Pilih Dokumen</option>
                                        <option value="application-letter-to-rector">Surat Permohonan Kepada Rektor</option>
                                        <option value="manuscript">Fotokopi Sertifikat Kekayaan Intelektual</option>
                                        <option value="board-of-directors">Surat Pengantar Sentra HKI LPPM UNSOED</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="intellectual-properties-documents" name="intellectual-properties-documents">
                                        <label id="intellectual-properties-documents-label" class="custom-file-label" for="intellectual-properties-documents">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" value="Upload" class="input-group-text upload-intellectual-properties-document" id="upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped" id="uploaded-intellectual-property-document-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Dokumen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="intellectual-property-document-data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-list-alt"></i> Data Surat pengantar dekan
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= site_url('surat_pengantar_dekan/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th class="text-center" width="15%">Aksi</th>
                                <th>Acc Dekan</th>
                                <th>Createdate</th>
                                <th>Hal</th>
                                <th>Nama Jurnal</th>
                                <th>Nomor Surat</th>
                                <th>Submission Id</th>
                                <th>Tanggal Surat</th>
                            </tr>
                        </thead>
                    </table>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
                                return {
                                    "iStart": oSettings._iDisplayStart,
                                    "iEnd": oSettings.fnDisplayEnd(),
                                    "iLength": oSettings._iDisplayLength,
                                    "iTotal": oSettings.fnRecordsTotal(),
                                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                                };
                            };

                            var t = $("#mytable").dataTable({
                                "processing": true,
                                "serverSide": true,
                                "oLanguage": {
                                    sProcessing: "Loading. . ."
                                },
                                "ajax": {
                                    "url": "<?= site_url('surat_pengantar_dekan/json') ?>",
                                    "type": "POST"
                                },
                                "columns": [{
                                        "data": "id",
                                        "orderable": false,
                                        "className": "text-center"
                                    },
                                    {
                                        "data": "action",
                                        "orderable": false,
                                        "className": "text-center"
                                    },
                                    {
                                        "data": "acc_dekan"
                                    },
                                    {
                                        "data": "createdate"
                                    },
                                    {
                                        "data": "hal"
                                    },
                                    {
                                        "data": "nama_jurnal"
                                    },
                                    {
                                        "data": "nomor_surat"
                                    },
                                    {
                                        "data": "submission_id"
                                    },
                                    {
                                        "data": "tanggal_surat"
                                    }
                                ],
                                order: [
                                    [0, 'desc']
                                ],
                                rowCallback: function(row, data, iDisplayIndex) {
                                    var info = this.fnPagingInfo();
                                    var page = info.iPage;
                                    var length = info.iLength;
                                    var index = page * length + (iDisplayIndex + 1);
                                    $('td:eq(0)', row).html(index);
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<?= swal_delete("#mytable", ".hapus") ?>
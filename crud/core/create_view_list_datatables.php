<?php 
$string = "<div class=\"row\"> 
    <div class=\"col-md-12\">
        <div class=\"card card-success\">
            <div class=\"card-header\">
                <div class=\"card-title\">
                    <i class=\"fa fa-list-alt\"></i> Data ".str_replace('_',' ', ucwords($c))."
                </div>
                <div class=\"card-tools\">
                    <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"maximize\"><i class=\"fas fa-expand\"></i></button>
                </div>
            </div>
            <div class=\"card-body\">
                <a href=\"<?= site_url('".$c_url."/create') ?>\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i> Tambah Data</a>
                <div class=\"table-responsive mt-3\">
                    <table class=\"table table-bordered table-striped table-hover text-nowrap\" width=\"100%\" id=\"mytable\">
                        <thead>
                            <tr>
                                <th class=\"text-center\" width=\"5%\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t\t\t\t\t\t\t<th class=\"text-center\" width=\"15%\">Aksi</th>
                            </tr>
                        </thead>";
$column_non_pk = array();
foreach ($non_pk as $row) {
    $column_non_pk[] .= "\n\t\t\t\t\t\t\t\t\t{\n\t\t\t\t\t\t\t\t\t\t\"data\": \"".$row['column_name']."\"\n\t\t\t\t\t\t\t\t\t}";
}
$col_non_pk = implode(',', $column_non_pk);
$string .= "    
                    </table>

                    <script type=\"text/javascript\">
                        $(document).ready(function() {
                            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                            {
                                return {
                                    \"iStart\": oSettings._iDisplayStart,
                                    \"iEnd\": oSettings.fnDisplayEnd(),
                                    \"iLength\": oSettings._iDisplayLength,
                                    \"iTotal\": oSettings.fnRecordsTotal(),
                                    \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                                    \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                    \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                                };
                            };

                            var t = $(\"#mytable\").dataTable({
                                \"processing\"  : true,
                                \"serverSide\"  : true,
                                \"oLanguage\"   : { sProcessing : \"Loading. . .\" },
                                \"ajax\"        : { \"url\" : \"<?= site_url('".$c_url."/json') ?>\", \"type\": \"POST\"},
                                \"columns\"     : [
                                    {
                                        \"data\": \"$pk\",
                                        \"orderable\": false,
                                        \"className\" : \"text-center\"
                                    },".$col_non_pk.",
                                    {
                                        \"data\" : \"action\",
                                        \"orderable\": false,
                                        \"className\" : \"text-center\"
                                    }
                                ],
                                order: [[0, 'desc']],
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
<?= swal_delete(\"#mytable\",\".hapus\") ?>";

if ($export_excel == '1') {
    $string .= "\n<a href=\"<?= site_url('".$c_url."/excel') ?>\" class=\"btn btn-success\"><i class=\"fas fa-file-excel\"></i> Export Excel</a>";
}
if ($export_pdf == '1') {
    $string .= "\n<a href=\"<?= site_url('".$c_url."/pdf') ?>\" class=\"btn btn-danger\" target=\"_blank\"><i class=\"fas fa-file\"></i> Cetak PDF</a>";
}

$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>
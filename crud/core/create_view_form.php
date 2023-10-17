<?php 
$string = "<div class=\"row\">
    <div class=\"col-md-12\">
        <div class=\"card card-success\">
            <div class=\"card-header\">
                <div class=\"card-title\">
                    <i class=\"fa fa-tasks\"></i> <?= \$button ?> Data ".str_replace('_',' ', ucwords($c))."
                </div>
                <div class=\"card-tools\">
                    <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"maximize\"><i class=\"fas fa-expand\"></i></button>
                </div>
            </div>
            <div class=\"card-body\">
                <form style=\"padding: 15px;\" action=\"<?= \$action; ?>\" method=\"POST\" enctype=\"multipart/form-data\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t\t\t\t\t<div class=\"form-group\">
                        <div class=\"row\">
                            <label class=\"col-md-2\" for=\"".$row["column_name"]."\">".label($row["column_name"])."</label>
                            <div class=\"col-md-6\">
                                <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?= $".$row["column_name"]."; ?></textarea>
                                <? form_error('".$row["column_name"]."')?>
                            </div>
                        </div>
                    </div>";
    } else if ($row['data_type'] == 'date') {
    $string .= "\n\t\t\t\t\t<div class=\"form-group\">
                        <div class=\"row\">
                            <label class=\"col-md-2\" for=\"".$row["data_type"]."\">".label($row["column_name"])."</label>
                            <div class=\"col-md-4\">
                                <div class=\"input-group\">
                                    <div class=\"input-group-prepend\">
                                        <span class=\"input-group-text\"><i class=\"fas fa-calendar-alt\"></i></span>
                                    </div>
                                    <input type=\"text\" class=\"form-control datepicker\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?= $".$row["column_name"]."; ?>\" readonly/>
                                    <?= form_error('".$row["column_name"]."') ?>
                                </div>
                            </div>
                        </div>
                    </div>";
    } else {
    $string .= "\n\t\t\t\t\t<div class=\"form-group\">
                        <div class=\"row\">
                            <label class=\"col-md-2\" for=\"".$row["data_type"]."\">".label($row["column_name"])."</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?= $".$row["column_name"]."; ?>\" />
                                <?= form_error('".$row["column_name"]."') ?>
                            </div>
                        </div>
                    </div>";
    }
}
$string .= "\n\t\t\t\t\t<div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-md-6 offset-md-2\">
                                <input type=\"hidden\" name=\"".$pk."\" value=\"<?= $".$pk."; ?>\" />
                                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-save\"></i> <?= \$button ?></button>
                                <a href=\"<?= site_url('".$c_url."') ?>\" class=\"btn btn-danger\"><i class=\"fas fa-sign-out-alt\"></i> Kembali</a>
                            </div>
                        </div>
                    </div>";
$string .= "\n\t\t\t\t</form>
            </div>
        </div>
    </div>
</div>";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>
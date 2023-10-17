<?php 

$string = "<div class=\"row\">
	<div class=\"col-md-12\">
		<div class=\"card card-success\">
			<div class=\"card-header\">
				<div class=\"card-title\">
                    <b><i class=\"fa fa-eye\"></i> Detail Data ".str_replace('_',' ', ucwords($c))."</b>
                </div>
                <div class=\"card-tools\">
                    <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"maximize\"><i class=\"fas fa-expand\"></i></button>
                </div>
			</div>
			<div class=\"card-body\">
				<div style=\"padding: 15px;\">
					<table class=\"table table-striped\">";
foreach ($non_pk as $row) {
	$string .= "\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td width=\"20%\"><b>".label($row["column_name"])."</b></td>\n\t\t\t\t\t\t\t<td><?= $".$row["column_name"]."; ?></td>\n\t\t\t\t\t\t</tr>";
}
$string .= "\n\t\t\t\t\t</table>\n\t\t\t\t\t<a href=\"<?= site_url('".$c_url."') ?>\" class=\"btn btn-danger float-right\">\n\t\t\t\t\t\t<i class=\"fa fa-sign-out\"></i> Kembali\n\t\t\t\t\t</a>
				</div>
			</div>
		</div>
	</div>
</div>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>
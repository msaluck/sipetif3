<?php
error_reporting(0);
require_once 'core/harviacode.php';
require_once 'core/helper.php';
require_once 'core/process.php';
?>
<!doctype html>
<html>

<head>
    <title>Codeigniter 3 CRUD Generator</title>
    <link rel="stylesheet" href="core/bootstrap.min.css" />
    <link rel="icon" href="images/jenderal.jpeg" type="image/jpeg">
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary mb-3">
                        Codeigniter CRUD Generator For AdminLTE 3
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label style="font-weight: bold">Select Table - <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Refresh</a></label>
                                <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                                    <option value="">Please Select</option>
                                    <?php
                                    $table_list = $hc->table_list();
                                    $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                                    foreach ($table_list as $table) {
                                    ?>
                                        <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="font-weight: bold">Select Showing Data</label>
                                <div class="row">
                                    <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'datatables'; ?>
                                    <div class="col-md-4">
                                        <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                            <label>
                                                <input type="radio" name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                                                Reguler Table with Pagination
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                            <label>
                                                <input type="radio" name="jenis_tabel" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                                                Serverside Datatables
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                            <label>
                                                <input type="radio" name="jenis_tabel" value="clientside" <?php echo $jenis_tabel == 'clientside' ? 'checked' : ''; ?>>
                                                Clientside Datatables
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-weight: bold">Select Report</label>
                                <div class="checkbox">
                                    <?php $export_excel = isset($_POST['export_excel']) ? $_POST['export_excel'] : ''; ?>
                                    <label>
                                        <input type="checkbox" name="export_excel" value="1" <?php echo $export_excel == '1' ? 'checked' : '' ?>>
                                        Export Excel
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <?php $export_pdf = isset($_POST['export_pdf']) ? $_POST['export_pdf'] : ''; ?>
                                    <label>
                                        <input type="checkbox" name="export_pdf" value="1" <?php echo $export_pdf == '1' ? 'checked' : '' ?>>
                                        Export PDF
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-weight: bold">Custom Controller Name</label>
                                <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold">Custom Model Name</label>
                                <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Controller Name" />
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold">Custom View Form</label>
                                <input type="text" id="form" name="form" value="<?php echo isset($_POST['form']) ? $_POST['form'] : '' ?>" class="form-control" placeholder="View Form Name" />
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold">Custom View List</label>
                                <input type="text" id="list" name="list" value="<?php echo isset($_POST['list']) ? $_POST['list'] : '' ?>" class="form-control" placeholder="View List Name" />
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold">Custom View Read</label>
                                <input type="text" id="read" name="read" value="<?php echo isset($_POST['read']) ? $_POST['read'] : '' ?>" class="form-control" placeholder="View Read Name" />
                            </div>
                            <input type="submit" value="Generate" name="generate" class="btn btn-danger btn-block" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-info mb-3">
                        Report
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($hasil as $h) {
                            echo '<p>' . $h . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function capitalize(s) {
            return s && s[0].toUpperCase() + s.slice(1);
        }

        function setname() {
            var table_name = document.getElementById('table_name').value.toLowerCase();
            if (table_name != '') {
                document.getElementById('controller').value = capitalize(table_name);
                document.getElementById('model').value = capitalize(table_name) + '_model';
                document.getElementById('form').value = table_name + '_form';
                document.getElementById('list').value = table_name + '_list';
                document.getElementById('read').value = table_name + '_read';

            } else {
                document.getElementById('controller').value = '';
                document.getElementById('model').value = '';
                document.getElementById('form').value = '';
                document.getElementById('list').value = '';
                document.getElementById('read').value = '';
            }
        }
    </script>
</body>

</html>
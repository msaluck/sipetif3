<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <b><i class="fa fa-eye"></i> Detail Data Users</b>
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div style="padding:5px;">
                    <table class="table table-striped">
                        <tr>
                            <td width="20%"><b>Faculty</b></td>
                            <td><?= $faculty_name; ?></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Department</b></td>
                            <td><?= $department_name; ?></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Email</b></td>
                            <td><?= $email; ?></td>
                        </tr>
                    </table>
                    <a href="<?= site_url('users/biodata_update') ?>" class="btn btn-info">
                        <i class="fa fa-edit"></i> Edit Biodata
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
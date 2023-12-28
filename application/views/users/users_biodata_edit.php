<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> Update Biodata Users
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding:5px;" action="<?= site_url('users/biodata_update_action'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="tinyint">Department</label>
                            <div class="col-md-6">
                                <select name="department_id" class="form-control select2" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($department_data as $value) { ?>
                                        <option value="<?= $value->id ?>" <?= $department_id == $value->id ? 'selected' : ''; ?>><?= $value->name ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
                                <a href="<?= site_url('users/biodata') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fa fa-tasks"></i> <?= $button ?> Data Users
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="tinyint">User Type Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user_type_id" id="user_type_id" placeholder="User Type Id" value="<?= $user_type_id; ?>" />
                                <?= form_error('user_type_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="tinyint">Faculty Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="faculty_id" id="faculty_id" placeholder="Faculty Id" value="<?= $faculty_id; ?>" />
                                <?= form_error('faculty_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="tinyint">Department Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="department_id" id="department_id" placeholder="Department Id" value="<?= $department_id; ?>" />
                                <?= form_error('department_id') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= $email; ?>" />
                                <?= form_error('email') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= $name; ?>" />
                                <?= form_error('name') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= $username; ?>" />
                                <?= form_error('username') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Password</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?= $password; ?>" />
                                <?= form_error('password') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $button ?></button>
                                <a href="<?= site_url('users') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
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
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>User Type Id</b></td>
							<td><?= $user_type_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Faculty Id</b></td>
							<td><?= $faculty_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Department Id</b></td>
							<td><?= $department_id; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Email</b></td>
							<td><?= $email; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Name</b></td>
							<td><?= $name; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Username</b></td>
							<td><?= $username; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Password</b></td>
							<td><?= $password; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('users') ?>" class="btn btn-danger float-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
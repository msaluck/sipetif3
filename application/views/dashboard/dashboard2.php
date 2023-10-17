<div class="row">
    <div class="col-md-8">

        <!-- Profile Image -->

        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= icon() ?>" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?= $this->session->name ?></h3>

                <strong><i class="fas fa-book mr-1"></i> Nomor Induk Pegawai</strong>

                <p class="text-muted">
                    <?= $nip ?>
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> Tanggal Lahir</strong>

                <p class="text-muted">
                    <?= $tgl_lahir ?>
                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Alamat Rumah</strong>

                <p class="text-muted">
                    <?= $alamat ?>
                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Jabatan</strong>

                <p class="text-muted">
                    <?= $jabatan ?>
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> Posisi</strong>

                <p class="text-muted">
                    <?= $posisi ?>
                </p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= icon() ?>" alt="User profile picture">
                </div>
                <br>
                <!-- <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p> -->

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <center>
                            <h2 id="timestamp"></h2>
                        </center>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-lg-12">
                    <?php if($cek_absen_berangkat == 0){ ?>
                        <a href="<?= site_url('dashboard/berangkat') ?>" class="btn btn-success  btn-block"><b>Absen
                                Berangkat</b></a>
                        <br>
                    <?php } else { ?>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped table-hover text-nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Jam Absen Berangkat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $get_absen_berangkat->jam_absen ?></td>
                                        <td><?= $get_absen_berangkat->status_absen ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="<?= site_url('dashboard/pulang') ?>" class="btn btn-primary  btn-block"><b>Absen
                                Pulang</b></a>
                    <?php } ?>
                    <?php if($cek_absen_pulang != 0){ ?>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped table-hover text-nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Jam Absen Pulang</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $get_absen_pulang->jam_absen ?></td>
                                        <td><?= $get_absen_pulang->status_absen ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    </div>
                </div>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->

        <!-- /.card -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
</div>
<script>
// Function ini dijalankan ketika Halaman ini dibuka pada browser
$(function() {
    setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
});

//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
    $.ajax({
        url: '<?= site_url('dashboard/waktu') ?>',
        success: function(data) {
            $('#timestamp').html(data);
        },
    });
}
</script>
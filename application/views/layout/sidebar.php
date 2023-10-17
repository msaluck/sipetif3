<aside class="main-sidebar sidebar-light-green elevation-4">
    <a href="<?= site_url('dashboard') ?>" class="brand-link">
        <!-- <img src="<?= icon() ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <center><span class="brand-text font-weight-dark"><?= nama_aplikasi() ?></span></center>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= icon() ?>" class="img-circle elevation-2" alt="Logo">
            </div>
            <div class="info">
                <a href="javascript:void(0)" class="d-block"><?= $this->session->name ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU UTAMA</li>
                <li class="nav-item">
                    <a href="<?= site_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || empty($this->uri->segment(1)) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('portofolio') ?>" class="nav-link <?= $this->uri->segment(1) == 'portofolio' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Daftar Portofolio</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('portofolio') ?>" class="nav-link <?= $this->uri->segment(1) == 'portofolio' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Portofolio Saya</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('submissions') ?>" class="nav-link <?= $this->uri->segment(1) == 'submissions' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Daftar Pengajuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('submission') ?>" class="nav-link <?= $this->uri->segment(1) == 'submission' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Pengajuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('submission_types') ?>" class="nav-link <?= $this->uri->segment(1) == 'submission_types' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-box"></i>
                                <p>Submission Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('submission_type_details') ?>" class="nav-link <?= $this->uri->segment(1) == 'submission_type_details' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-box"></i>
                                <p>Submission Type Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('submission_statuses') ?>" class="nav-link <?= $this->uri->segment(1) == 'submission_statuses' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-box"></i>
                                <p>Submission Statuses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('faculties') ?>" class="nav-link <?= $this->uri->segment(1) == 'faculties' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-box"></i>
                                <p>Fakultas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('users') ?>" class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-box"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
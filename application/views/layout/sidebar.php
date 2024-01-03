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
                <?php if (akses_role('Dosen') == '1') { ?>
                    <li class="nav-item">
                        <a href="<?= site_url('users/biodata') ?>" class="nav-link <?= $this->uri->segment(2) == 'biodata' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Biodata</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if (akses_role('Administrator') == '1') { ?>
                    <li class="nav-item">
                        <a href="<?= site_url('portofolio') ?>" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Semua Portofolio<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('scopus') ?>" class="nav-link <?= $this->uri->segment(1) == 'scopus' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Scopus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('wos') ?>" class="nav-link <?= $this->uri->segment(1) == 'wos' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Web of Science</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('google') ?>" class="nav-link <?= $this->uri->segment(1) == 'google' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Google Scholar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('iprs') ?>" class="nav-link <?= $this->uri->segment(1) == 'iprs' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>IPRs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('book') ?>" class="nav-link <?= $this->uri->segment(1) == 'book' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Book</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (akses_role('Dosen') == '1') { ?>
                    <li class="nav-item  <?= $this->uri->segment(1) == 'scopus_documents' ||
                                                $this->uri->segment(1) == 'wos_documents' ||
                                                $this->uri->segment(1) == 'google_documents' ||
                                                $this->uri->segment(1) == 'ipr_documents' ||
                                                $this->uri->segment(1) == 'book_documents' ? 'menu-open' : '' ?>">
                        <a href="<?= site_url('portofolio') ?>" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Portofolio Saya
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('scopus_documents') ?>" class="nav-link <?= $this->uri->segment(1) == 'scopus_documents' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Scopus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('wos_documents') ?>" class="nav-link <?= $this->uri->segment(1) == 'wos_documents' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Web of Science</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('google_documents') ?>" class="nav-link <?= $this->uri->segment(1) == 'google_documents' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Google Scholar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('ipr_documents') ?>" class="nav-link <?= $this->uri->segment(1) == 'ipr_documents' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>IPRs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('book_documents') ?>" class="nav-link <?= $this->uri->segment(1) == 'book_documents' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Book</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (akses_role('Administrator') == '1') { ?>
                    <li class="nav-item">
                        <a href="<?= site_url('submissions_all') ?>" class="nav-link <?= $this->uri->segment(1) == 'submissions_all' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Semua Pengajuan</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if (akses_role('Dosen') == '1') { ?>
                    <li class="nav-item">
                        <a href="<?= site_url('submissions/by_users') ?>" class="nav-link <?= $this->uri->segment(1) == 'submissions' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-upload"></i>
                            <p>Pengajuan Saya</p>
                        </a>
                    </li>
                <?php } ?>
                <!-- <li class="nav-item">
                    <a href="<?= site_url('submission') ?>" class="nav-link <?= $this->uri->segment(1) == 'submission' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Pengajuan</p>
                    </a>
                </li> -->
                <?php if (akses_role('Administrator') == '1' || akses_role('Rektor') == '1' || akses_role('LPPM') == '1' || akses_role('Dekan') == '1') { ?>
                    <li class="nav-item <?= $this->uri->segment(1) == 'surat_pengantar_dekan' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>Validasi Surat Digital
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('surat_pengantar_dekan') ?>" class="nav-link <?= $this->uri->segment(1) == 'surat_pengantar_dekan' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Validasi Dekan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('surat_pernyataan_lppm') ?>" class="nav-link <?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Validasi LPPM</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('surat_permohonan_rektor') ?>" class="nav-link <?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>Validasi Rektor</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if (akses_role('Administrator') == '1') { ?>
                    <li class="nav-item <?= $this->uri->segment(1) == 'submission_types' ||
                                            $this->uri->segment(1) == 'submission_type_details' ||
                                            $this->uri->segment(1) == 'submission_statuses' ||
                                            $this->uri->segment(1) == 'faculties' ||
                                            $this->uri->segment(1) == 'users' ||
                                            $this->uri->segment(1) == 'role' ||
                                            $this->uri->segment(1) == 'user_role' ||
                                            $this->uri->segment(1) == 'authors' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('submission_types') ?>" class="nav-link <?= $this->uri->segment(1) == 'submission_types' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Submission Types</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('submission_type_details') ?>" class="nav-link <?= $this->uri->segment(1) == 'submission_type_details' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Submission Type Details</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('submission_statuses') ?>" class="nav-link <?= $this->uri->segment(1) == 'submission_statuses' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Submission Statuses</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('faculties') ?>" class="nav-link <?= $this->uri->segment(1) == 'faculties' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Fakultas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('role') ?>" class="nav-link <?= $this->uri->segment(1) == 'role' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('users') ?>" class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Users</p>
                                </a>
                            </li>

                            <!-- <li class="nav-item">
                            <a href="<?= site_url('user_role') ?>" class="nav-link" <?= $this->uri->segment(1) == 'user_role' ? 'active' : '' ?>>
                                <i class="nav-icon fas fa-box"></i>
                                <p>User Role</p>
                            </a>
                        </li> -->
                            <li class="nav-item">
                                <a href="<?= site_url('authors') ?>" class="nav-link" <?= $this->uri->segment(1) == 'authors' ? 'active' : '' ?>>
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Authors</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </nav>
    </div>
</aside>
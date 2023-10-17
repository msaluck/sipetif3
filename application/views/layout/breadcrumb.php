<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= isset($judul_header) ? $judul_header : strtoupper(str_replace('_', ' ', $this->uri->segment(1))); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                    <?php
					if ($this->uri->segment(1) != 'dashboard') {
						echo generateBreadcrumb();
					}
					?>
                </ol>
            </div>
        </div>
    </div>
</div>
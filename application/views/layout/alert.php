<!--Alert -->
<?php if ($this->session->flashdata('swal-success')) { ?>
	<div class="swal-success" data-success="<?= $this->session->flashdata('swal-success') ?>"></div>
<?php } else if ($this->session->flashdata('swal-error')) { ?>
	<div class="swal-error" data-error="<?= $this->session->flashdata('swal-error') ?>"></div>
<?php } else if ($this->session->flashdata('swal-info')) { ?>
	<div class="swal-info" data-info="<?= $this->session->flashdata('swal-info') ?>"></div>
<?php } else if ($this->session->flashdata('swal-warning')) { ?>
	<div class="swal-warning" data-warning="<?= $this->session->flashdata('swal-warning') ?>"></div>
<?php } else if ($this->session->flashdata('question')) { ?>
	<div class="swal-question" data-question="<?= $this->session->flashdata('swal-warning') ?>"></div>
<?php } ?>

<?php if ($this->session->flashdata('toastr-success')) { ?>
	<div class="toastr-success" data-success="<?= $this->session->flashdata('toastr-success') ?>"></div>
<?php } else if ($this->session->flashdata('toastr-error')) { ?>
	<div class="toastr-error" data-error="<?= $this->session->flashdata('toastr-error') ?>"></div>
<?php } else if ($this->session->flashdata('toastr-info')) { ?>
	<div class="toastr-info" data-info="<?= $this->session->flashdata('toastr-info') ?>"></div>
<?php } else if ($this->session->flashdata('toastr-warning')) { ?>
	<div class="toastr-warning" data-warning="<?= $this->session->flashdata('toastr-warning') ?>"></div>
<?php } ?>
<!-- End Alert -->
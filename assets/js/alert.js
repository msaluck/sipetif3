$(function() {


	const success = $('.swal-success').data('success');
	if (success) {
		Swal.fire({
			type: 'success',
			title: 'Berhasil!',
			text: success,
		})
	}

	const info = $('.swal-info').data('info');
	if (info) {
		Swal.fire({
			type: 'info',
			title: 'Informasi',
			text: info,
		})
	}

	const error = $('.swal-error').data('error');
	if (error) {
		Swal.fire({
			type: 'error',
			title: 'Gagal!',
			text: error,
			showConfirmButton: false,
        	timer: 2000
		})
	}
	
	const warning = $('.swal-warning').data('warning');
	if (warning) {
		Swal.fire({
			type: 'warning',
			title: 'Peringatan!',
			text: warning,
		})
	}

	const question = $('.swal-question').data('question');
	if (question) {
		Swal.fire({
			type: 'question',
			title: 'Pertanyaan',
			text: question,
		})
	}

	// ------------------------------------------------------------------------------//


	const success2 = $('.toastr-success').data('success');
	if (success2) {
		toastr.success(success2)
	}

	const info2 = $('.toastr-info').data('info');
	if (info2) {
		toastr.info(info2)
	}

	const error2 = $('.toastr-error').data('error');
	if (error2) {
		toastr.error(error2)
	}

	const warning2 = $('.toastr-warning').data('warning');
	if (warning2) {
		toastr.warning(warning2)
	}
	
});
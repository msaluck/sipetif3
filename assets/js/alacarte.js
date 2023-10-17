//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
	theme: 'bootstrap4',
	placeholder: "Pilih",
})

$(document).ready(function () {
	$('.summernote').summernote({
		height: 200, // set editor height
		minHeight: null, // set minimum height of editor
		maxHeight: null, // set maximum height of editor

	});
});

//Date picker
$('.datepicker').datepicker({
	autoclose: true,
	format: 'yyyy-mm-dd',
});

$('.monthpicker').datepicker({
	autoclose: true,
});

$(function () {
	$('.photo-input').fileinput({
		browseLabel: 'Select Photo',
		browseClass: 'btn btn-info',
		browseIcon: '<i class="fa fa-picture-o"></i>',
		removeLabel: 'Cancel',
		removeClass: 'btn btn-danger',
		removeIcon: '<i class="fa fa-times-circle"></i>',
		layoutTemplates: {
			icon: '<i class="fa fa-file-image-o"></i>'
		},
		showUpload: false,
		showClose: false,
		maxFilesNum: 10,
		allowedFileExtensions: ["jpg", "png", "jpeg", "gif"],
		overwriteInitial: true,
	});
});

$(function () {
	$('.file-input').fileinput({
		browseLabel: 'Select File',
		browseClass: 'btn btn-info',
		browseIcon: '<i class="fa fa-file-o"></i>',
		removeLabel: 'Cancel',
		removeClass: 'btn btn-danger',
		removeIcon: '<i class="fa fa-times-circle"></i>',
		layoutTemplates: {
			icon: '<i class="fa fa-file-image-o"></i>'
		},
		showUpload: false,
		showClose: false,
		maxFilesNum: 10,
		allowedFileExtensions: ["txt", "pdf", "docx", "xlsx", "pptx", "rtf", "rar", "zip", "doc", "xls", "ppt", "jpg", "png", "jpeg", "gif"],
		overwriteInitial: true,
		initialPreviewAsData: true,
		browseOnZoneClick: true
	});
});

$(function () {
	$('.file-input-update').fileinput({
		browseLabel: 'Ubah File',
		browseClass: 'btn btn-info',
		browseIcon: '<i class="fa fa-file-o"></i>',
		removeLabel: 'Cancel',
		removeClass: 'btn btn-danger',
		removeIcon: '<i class="fa fa-times-circle"></i>',
		layoutTemplates: {
			icon: '<i class="fa fa-file-image-o"></i>'
		},
		showUpload: false,
		showClose: false,
		maxFilesNum: 10,
		allowedFileExtensions: ["txt", "pdf", "docx", "xlsx", "pptx", "rtf", "rar", "zip", "doc", "xls", "ppt"],
		overwriteInitial: true,
		dropZoneEnabled: false,
		initialCaption: '1 File Uploaded',
	});
});

$('.uang').priceFormat({
	prefix: 'Rp  ',
	thousandsSeparator: '.',
	centsLimit: 0
});

$(function () {
	$('.datetimepicker').bootstrapMaterialDatePicker({ format: 'YYYY-MM-DD HH:mm', lang: 'id' });
});

$(document).on('click', '[data-toggle="lightbox"]', function (event) {
	event.preventDefault();
	$(this).ekkoLightbox({
		alwaysShowClose: true
	});
});

$(document).ready(function () {
	$('#uploadForm').submit(function (e) {
		e.preventDefault(); // Prevent the default form submission

		var formData = new FormData(this);

		$.ajax({
			url: '<?= base_url('upload/ upload_files') ?>',
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {
				$('#uploadStatus').html('Upload successful!');
				$('#uploadResults').html(response);
			},
			error: function () {
				$('#uploadStatus').html('Upload failed!');
			}
        });
});
});

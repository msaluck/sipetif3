<?php defined('BASEPATH') or exit('no direct access');

function nama_aplikasi()
{
	$data = "Sistem Pengajuan Insentif <br> LPPM UNSOED";
	return $data;
}

function mini_judul()
{
	$data = "Sipetif";
	return $data;
}

function header_judul()
{
	$data = "Sistem Pengajuan Insentif";
	return $data;
}

function icon()
{
	$data = base_url('assets/images/banyumas.png');
	return $data;
}

function nama_user()
{
	$CI = &get_instance();
	if ($CI->session->userdata('nama')) {
		return $CI->session->userdata('nama');
	} else {
		return "User";
	}
}

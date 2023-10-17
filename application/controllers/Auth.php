<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->library('Form_validation');
        $this->load->library('Api');
        $this->Api = new Api;
	}

	public function index()
	{
		if ($this->session->userdata('key') == "login_industri_k4yu") {
			redirect(site_url('dashboard'));
		} else {
			$this->load->view('login/login_page');
		}
	}

	public function aksi_login()
	{
		$this->form_validation->set_rules('identity', 'username / email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('alert-error', 'Harap Masukkan Email dan Password');
			redirect(site_url('internal'));
		} else {
			$identity = $this->input->post('identity', TRUE);
			$password = md5($this->input->post('password', TRUE));


			$row = $this->Users_model->get_by_identity($identity);

			if ($row != NULL) {
				if ($row['username'] == $identity or $row['email'] == $identity) {
					if (password_verify($password, $row['password'])) {
						$data_session = array(
							'id_user'       => $row['id_user'],
							'name'          => $row['name'],
							'username'      => $row['username'],
							'email'         => $row['email'],
							'key'           => 'login_industri_k4yu',
							'jabatan'		=> $row['jabatan']
						);
						$this->session->set_userdata($data_session);
						$this->session->set_flashdata('toastr-success', 'Selamat Datang');
						redirect(site_url('dashboard'));
					} else {
						$this->session->set_flashdata('toastr-error', 'Gagal Login');
						redirect(site_url('auth'));
					}
				} else {
					$this->session->set_flashdata('toastr-error', 'Akun tidak terdaftar');
					redirect(site_url('auth'));
				}
			}
			// else if(){
				
			// }
			// if ($row['username'] == $identity or $row['email'] == $identity) {
			// 	if (password_verify($password, $row['password'])) {
			// 		$data_session = array(
			// 			'id_user'       => $row['id_user'],
			// 			'name'          => $row['name'],
			// 			'username'      => $row['username'],
			// 			'email'         => $row['email'],
			// 			'key'           => 'login_industri_k4yu',
			// 			'sebagai'       => 'internal',
			// 			'jabatan'		=> $row['jabatan']
			// 		);
			// 		$this->session->set_userdata($data_session);
			// 		$this->session->set_flashdata('toastr-success', 'Selamat Datang');
			// 		redirect(site_url('dashboard'));
			// 	} else {
			// 		$this->session->set_flashdata('toastr-error', 'Gagal Login');
			// 		redirect(site_url('auth'));
			// 	}
			// } elseif() {
			// 	$this->session->set_flashdata('toastr-error', 'Akun tidak terdaftar');
			// 	redirect(site_url('auth'));
			// }
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('auth'));
	}

}
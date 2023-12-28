<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		//$this->load->model('Dosen_model');
		//Do your magic here
	}

	public function index()
	{
		include_once APPPATH . "../vendor/autoload.php";
		$data_oauth = google_oauth_key();
		$google_client = new Google_Client();
		$google_client->setClientId($data_oauth['client_id']); //Define your ClientID
		$google_client->setClientSecret($data_oauth['client_secret']); //Define your Client Secret Key
		$google_client->setRedirectUri($data_oauth['url']); //Define your Redirect Uri
		$google_client->addScope('email');
		$google_client->addScope('profile');
		if (isset($_GET["code"])) {
			//jika ada request get dari login google
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			if (!isset($token["error"])) {
				//jika tidak ada error
				$google_client->setAccessToken($token['access_token']);
				$this->session->set_userdata('access_token', $token['access_token']);
				$google_service = new Google_Service_Oauth2($google_client);
				$hasil = $google_service->userinfo->get();
				$current_datetime = date('Y-m-d H:i:s');
				//print_r($hasil); die();
				$email = $hasil['email'];
				$pecah = explode('@', $email);
				if ($pecah[1] == 'unsoed.ac.id') {
					$cek_user = $this->db->get_where('users', ['email' => $email])->row();
					if ($cek_user) {
						$data = array(
							'id_user'       => $cek_user->id,
							'name'          => $cek_user->name,
							'email'         => $cek_user->email,
							'username' 		=> $cek_user->username,
						);
						$this->session->set_userdata($data);
						$this->session->set_flashdata('toastr-success', "Selamat Datang!");
						redirect(site_url('dashboard'));
					} else {
						// $this->session->set_flashdata('swal-error', $email . ' Tidak Terdaftar');
						// redirect(site_url('login'));
						//daftarkan data ke tabel users
						$cek_data = $this->sync_pegawai_by_email($email);
						if ($cek_data['status'] == 'berhasil') {
							$cek_user = $cek_data['data_pegawai'];
							$data = array(
								'id_user'       => $cek_user->id,
								'name'          => $cek_user->name,
								'email'         => $cek_user->email,
								'username' 		=> $cek_user->username,
							);
							$this->session->set_userdata($data);
							$this->session->set_flashdata('toastr-success', "Selamat Datang!");
							redirect(site_url('dashboard'));
						} else {
							$this->session->set_flashdata('swal-error', 'Login Gagal');
							redirect(site_url('login'));
						}
					}
				} else {
					//bukan domain unsoed
				}
			} else {
				$this->session->set_flashdata('swal-error', 'Waktu Sesi Login Habis');
				redirect(site_url('login'));
			}
		}
		$data = array(
			'meta_title' 		=> 'Sipetif LPPM UNSOED',
			'name_app' 			=> 'Sipetif LPPM UNSOED',
			'meta_description' 	=> 'Sipetif LPPM UNSOED',
			'meta_url' 			=> 'Universitas Jenderal Soedirman',
			'nama_instansi' 	=> 'Universitas Jenderal Soedirman',
			'meta_images'       => base_url('assets/img/logo.png'),
			'login_button'		=> $google_client->createAuthUrl(),
		);
		$this->load->view('login/login_page', $data, FALSE);
	}

	public function aksi_login()
	{
		$username = $this->input->post('username', TRUE);
		//$password = md5($this->input->post('password', TRUE));
		$password = $this->input->post('password', TRUE);

		//$row = $this->Users_model->get_by_identity($username);
		$row = $this->Users_model->get_by_username($username);
		//var_dump($password);
		//die();
		if ($row != NULL) {
			if ($row['username'] == $username && $row['password'] != NULL) {
				if (password_verify($password, $row['password'])) {
					// $id_user = $row['id_user'];
					// $row2 = $this->Dosen_model->get_by_id_user($id_user);
					$data = array(
						'id'       => $row['id'],
						'name'          => $row['name'],
						'email'         => $row['email'],
						'username' 		=> $row['username'],
						'status' 		=> 'login_skpi',
						'akses' 		=> $row['jabatan'],
					);
					$this->session->set_userdata($data);
					$this->session->set_flashdata('toastr-success', "Selamat Datang!");
					redirect(site_url('dashboard'));
				} else {
					$this->session->set_flashdata('swal-error', 'Password Salah');
					redirect(site_url('login'));
				}
			} else {
				$this->session->set_flashdata('swal-error', 'Username Tidak Terdaftar');
				redirect(site_url('login'));
			}
		} else {
			$this->session->set_flashdata('swal-error', 'Username Tidak Terdaftar');
			redirect(site_url('login'));
		}
		// else {
		// 	if ($row['username'] == $username && $row['password'] != NULL) {
		// 		if (password_verify($password, $row['password'])) {
		// 			$data = array(
		// 				'id_user' => $row['id_user'],
		// 				'username' => $row['username'],
		// 				'name'          => $row['name'],
		// 				'status' => 'login_skpi',
		// 				'akses' => 'admin'

		// 			);
		// 			$this->session->set_userdata($data);
		// 			$this->session->set_flashdata('toastr-success', "Selamat Datang!");
		// 			redirect(site_url('dashboard'));
		// 		} else {
		// 			$this->session->set_flashdata('swal-error', 'Password Salah');
		// 			redirect(site_url('login'));
		// 		}
		// 	} else {
		// 		$this->session->set_flashdata('swal-error', 'Username Tidak Terdaftar');
		// 		redirect(site_url('login'));
		// 	}
		// }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}

	private function sync_pegawai_by_email($email)
	{

		$row = $this->db->get_where("users", ['email' => $email])->num_rows();

		if ($row == 0) {
			// URL API yang ingin dikirimkan data
			$url = 'http://103.226.138.252/api/index.php/unsoed/get_pegawai';
			// Data yang ingin dikirimkan
			$data = array(
				'kunci'      => 'jsd',
				'email' => $email,
			);

			// Konfigurasi CURL
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/x-www-form-urlencoded'
			));

			// Eksekusi CURL dan simpan responnya
			$response = curl_exec($ch);
			curl_close($ch);

			// Tampilkan respon dari API
			$row_api = json_decode($response);

			if ($row_api) {
				// print_r($row_api);
				// die();
				$cek_email_unsoed = $this->db->get_where("users", ['email' => $row_api->email_unsoed])->num_rows();
				if ($cek_email_unsoed == 0) {
					$data2 = array(
						'username' => $row_api->email_unsoed,
						'password' => md5($row_api->nidn),
						'name' => $row_api->nama_dosen,
						'email'    => $row_api->email_unsoed,
						'nip'		=> $row_api->nip,
					);

					$this->db->insert('users', $data2);
					$get_user = $this->db->get_where("users", ['email' => $row_api->email_unsoed])->row();

					$respon = array("status" => "berhasil", "data_pegawai" => $get_user);
				}
			}
		} else {
			$get_pegawai = $this->db->get_where("users", ['email_unsoed' => $email])->row();
			$respon = array("status" => "berhasil", "data_pegawai" => $get_pegawai);
		}
		//echo json_encode($respon);
		return $respon;
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
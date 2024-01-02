<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		verify_session();
	}

	public function index()
	{
		$data = array();
		//$coba = $this->db2->query("select * from sinta.authors limit 10")->result();
		//print_r($coba);
		//die();
		$id_user = $this->session->id_user;
		$cek_users = $this->db->get_where("users", ['id' => $id_user])->row();
		if ($cek_users) {
			if ($cek_users->iddosen == null) {
				$email = $this->session->email;
				$this->db_sinelitabmas = $this->load->database('sinelitabmas', TRUE);
				$row_api = $this->db_sinelitabmas->query("select * from dosen where emailunsoed='$email'")->row();
				$cek_authors = $this->db_sinelitabmas->get_where('sinta.authors', ['NIDN' => $row_api->nidn])->row();
				if ($cek_authors) {
					$idauthors = $cek_authors->id;
				} else {
					$cek_authors_lagi = $this->db_sinelitabmas->get_where('sinta.authors', ['NIDN' => $row_api->nip])->row();
					if ($cek_authors_lagi) {
						$idauthors = $cek_authors_lagi->id;
					} else {
						$idauthors = null;
					}
				}
				$iddosen = $row_api->id;
				$nip = $row_api->nip;
				$update = $this->db->query("update users set iddosen='$iddosen',nip='$nip',idauthors='$idauthors' where email='$email'");
			}
		}
		$this->template->load('layout/master', 'dashboard/dashboard', $data);
	}

	// public function add_absen_berangkat($data)
	// {
	// 	$tgl_sekarang = date("Y-m-d");
	// 	$nip = $this->session->id_user;

	// 	$row = $this->db->query("SELECT * FROM qrcode")->row();

	// 	$code = $data;
	// 	if ($row->data_qrcode == $code) {
	// 		$cuti = $this->db->query("SELECT * FROM cuti WHERE nip='$nip' AND status_cuti='Disetujui' ORDER BY id_cuti DESC LIMIT 1 ")->row();
	// 		if ($cuti) {
	// 			$tgl_awal = strtotime($cuti->tgl_awal);
	// 			$tgl_akhir = strtotime($cuti->tgl_akhir);
	// 			$sekarang2 = strtotime(date('Y-m-d'));

	// 			if ($sekarang2 >= $tgl_awal && $sekarang2 <= $tgl_akhir) {
	// 				$this->session->set_flashdata('toastr-error', 'Anda Sedang Cuti');
	// 				redirect(site_url('dashboard'));
	// 			} else {
	// 				$cek_absen = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND tgl_absen='$tgl_sekarang' AND jenis_absen='Berangkat'")->row();

	// 				if ($cek_absen) {
	// 					$this->session->set_flashdata('toastr-error', 'Sudah Absen Berangkat');
	// 					redirect(site_url('dashboard'));
	// 				} else {
	// 					$cek_jadwal = $this->db->query("SELECT * FROM jadwal_kerja WHERE nip='$nip' AND tanggal_kerja='$tgl_sekarang'")->row();

	// 					if ($cek_jadwal != NULL) {
	// 						$shift =  $this->db->query("SELECT * FROM paket_jadwal WHERE id_paket='$cek_jadwal->id_paket_jadwal'")->row();
	// 						$masuk = strtotime($shift->jam_masuk);
	// 						$pulang = strtotime($shift->jam_pulang);
	// 						$sekarang = strtotime(date('H:i:s'));

	// 						if ($sekarang <= $masuk) {
	// 							$data = array(
	// 								'tgl_absen' => $tgl_sekarang,
	// 								'jam_absen' => date('H:i:s'),
	// 								'nip' => $nip,
	// 								'jenis_absen' => 'Berangkat',
	// 								'id_jadwal_kerja' => $cek_jadwal->id_jadwal_kerja,
	// 								'status_absen' => 'Tepat Waktu',
	// 								'status_kerja' => $shift->status_kerja
	// 							);

	// 							$this->Absen_model->insert($data);
	// 							$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 							redirect(site_url('dashboard'));
	// 						} elseif ($sekarang > $masuk && $sekarang < $pulang) {
	// 							$data = array(
	// 								'tgl_absen' => $tgl_sekarang,
	// 								'jam_absen' => date('H:i:s'),
	// 								'nip' => $nip,
	// 								'jenis_absen' => 'Berangkat',
	// 								'id_jadwal_kerja' => $cek_jadwal->id_jadwal_kerja,
	// 								'status_absen' => 'Terlambat',
	// 								'status_kerja' => $shift->status_kerja
	// 							);

	// 							$this->Absen_model->insert($data);
	// 							$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 							redirect(site_url('dashboard'));
	// 						} elseif ($sekarang >= $pulang) {
	// 							$this->session->set_flashdata('toastr-error', 'Sudah Waktunya Pulang');
	// 							redirect(site_url('dashboard'));
	// 						}
	// 					} else {
	// 						$this->session->set_flashdata('toastr-error', 'Jadwal Kerja Tidak Ditemukan');
	// 						redirect(site_url('dashboard'));
	// 					}
	// 				}
	// 			}
	// 		} else {
	// 			$cek_absen = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND tgl_absen='$tgl_sekarang' AND jenis_absen='Berangkat'")->row();

	// 			if ($cek_absen) {
	// 				$this->session->set_flashdata('toastr-error', 'Sudah Absen Berangkat');
	// 				redirect(site_url('dashboard'));
	// 			} else {
	// 				$cek_jadwal = $this->db->query("SELECT * FROM jadwal_kerja WHERE nip='$nip' AND tanggal_kerja='$tgl_sekarang'")->row();

	// 				if ($cek_jadwal != NULL) {
	// 					$shift =  $this->db->query("SELECT * FROM paket_jadwal WHERE id_paket='$cek_jadwal->id_paket_jadwal'")->row();
	// 					$masuk = strtotime($shift->jam_masuk);
	// 					$pulang = strtotime($shift->jam_pulang);
	// 					$sekarang = strtotime(date('H:i:s'));

	// 					if ($sekarang <= $masuk) {
	// 						$data = array(
	// 							'tgl_absen' => $tgl_sekarang,
	// 							'jam_absen' => date('H:i:s'),
	// 							'nip' => $nip,
	// 							'jenis_absen' => 'Berangkat',
	// 							'id_jadwal_kerja' => $cek_jadwal->id_jadwal_kerja,
	// 							'status_absen' => 'Tepat Waktu',
	// 							'status_kerja' => $shift->status_kerja
	// 						);

	// 						$this->Absen_model->insert($data);
	// 						$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 						redirect(site_url('dashboard'));
	// 					} elseif ($sekarang > $masuk && $sekarang < $pulang) {
	// 						$data = array(
	// 							'tgl_absen' => $tgl_sekarang,
	// 							'jam_absen' => date('H:i:s'),
	// 							'nip' => $nip,
	// 							'jenis_absen' => 'Berangkat',
	// 							'id_jadwal_kerja' => $cek_jadwal->id_jadwal_kerja,
	// 							'status_absen' => 'Terlambat',
	// 							'status_kerja' => $shift->status_kerja
	// 						);

	// 						$this->Absen_model->insert($data);
	// 						$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 						redirect(site_url('dashboard'));
	// 					} elseif ($sekarang >= $pulang) {
	// 						$this->session->set_flashdata('toastr-error', 'Sudah Waktunya Pulang');
	// 						redirect(site_url('dashboard'));
	// 					}
	// 				} else {
	// 					$this->session->set_flashdata('toastr-error', 'Jadwal Kerja Tidak Ditemukan');
	// 					redirect(site_url('dashboard'));
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	// public function add_absen_pulang($data)
	// {
	// 	$tgl_sekarang = date("Y-m-d");
	// 	$nip = $this->session->id_user;

	// 	$row = $this->db->query("SELECT * FROM qrcode")->row();

	// 	$code = $data;
	// 	if ($row->data_qrcode == $code) {
	// 		$cuti = $this->db->query("SELECT * FROM cuti WHERE nip='$nip' AND status_cuti='Disetujui' ORDER BY id_cuti DESC LIMIT 1 ")->row();

	// 		if ($cuti) {
	// 			$tgl_awal = strtotime($cuti->tgl_awal);
	// 			$tgl_akhir = strtotime($cuti->tgl_akhir);
	// 			$sekarang2 = strtotime(date('Y-m-d'));

	// 			if ($sekarang2 >= $tgl_awal && $sekarang2 <= $tgl_akhir) {
	// 				$this->session->set_flashdata('toastr-error', 'Anda Sedang Cuti');
	// 				redirect(site_url('dashboard'));
	// 			} else {
	// 				$cek_absen = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND tgl_absen='$tgl_sekarang' AND jenis_absen='Pulang'")->row();

	// 				if ($cek_absen) {
	// 					$this->session->set_flashdata('toastr-error', 'Sudah Absen Pulang');
	// 					redirect(site_url('dashboard'));
	// 				} else {
	// 					$cek_jadwal = $this->db->query("SELECT * FROM jadwal_kerja WHERE nip='$nip' AND tanggal_kerja='$tgl_sekarang'")->row();

	// 					if ($cek_jadwal != NULL) {
	// 						$shift =  $this->db->query("SELECT * FROM paket_jadwal WHERE id_paket='$cek_jadwal->id_paket_jadwal'")->row();
	// 						$masuk = strtotime($shift->jam_masuk);
	// 						$pulang = strtotime($shift->jam_pulang);
	// 						$sekarang = strtotime(date('H:i:s'));

	// 						if ($sekarang < $pulang && $sekarang > $masuk) {
	// 							$data = array(
	// 								'tgl_absen' => $tgl_sekarang,
	// 								'jam_absen' => date('H:i:s'),
	// 								'nip' => $nip,
	// 								'jenis_absen' => 'Pulang',
	// 								'id_jam_kerja' => $cek_jadwal->id_jadwal_kerja,
	// 								'status_absen' => 'Pulang Lebih Awal',
	// 								'status_kerja' => $shift->status_kerja
	// 							);

	// 							$this->Absen_model->insert($data);
	// 							$this->session->set_flashdata('toastr-success', 'Pulang Lebih Awal');
	// 							redirect(site_url('dashboard'));
	// 						} elseif ($sekarang >= $pulang) {
	// 							$data = array(
	// 								'tgl_absen' => $tgl_sekarang,
	// 								'jam_absen' => date('H:i:s'),
	// 								'nip' => $nip,
	// 								'jenis_absen' => 'Pulang',
	// 								'id_jam_kerja' => $cek_jadwal->id_jadwal_kerja,
	// 								'status_absen' => 'Tepat Waktu',
	// 								'status_kerja' => $shift->status_kerja
	// 							);

	// 							$this->Absen_model->insert($data);
	// 							$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 							redirect(site_url('dashboard'));
	// 						} elseif ($sekarang <= $masuk) {
	// 							$this->session->set_flashdata('toastr-error', 'Waktunya Absen Berangkat');
	// 							redirect(site_url('dashboard'));
	// 						}
	// 					} else {
	// 						$this->session->set_flashdata('toastr-error', 'Jadwal Kerja Tidak Ditemukan');
	// 						redirect(site_url('dashboard'));
	// 					}
	// 				}
	// 			}
	// 		} else {
	// 			$cek_absen = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND tgl_absen='$tgl_sekarang' AND jenis_absen='Pulang'")->row();

	// 			if ($cek_absen) {
	// 				$this->session->set_flashdata('toastr-error', 'Sudah Absen Pulang');
	// 				redirect(site_url('dashboard'));
	// 			} else {
	// 				$cek_jadwal = $this->db->query("SELECT * FROM jadwal_kerja WHERE nip='$nip' AND tanggal_kerja='$tgl_sekarang'")->row();

	// 				if ($cek_jadwal != NULL) {
	// 					$shift =  $this->db->query("SELECT * FROM paket_jadwal WHERE id_paket='$cek_jadwal->id_paket_jadwal'")->row();
	// 					$masuk = strtotime($shift->jam_masuk);
	// 					$pulang = strtotime($shift->jam_pulang);
	// 					$sekarang = strtotime(date('H:i:s'));

	// 					if ($sekarang < $pulang && $sekarang > $masuk) {
	// 						$data = array(
	// 							'tgl_absen' => $tgl_sekarang,
	// 							'jam_absen' => date('H:i:s'),
	// 							'nip' => $nip,
	// 							'jenis_absen' => 'Pulang',
	// 							'id_jam_kerja' => $cek_jadwal->id_jadwal_kerja,
	// 							'status_absen' => 'Pulang Lebih Awal',
	// 							'status_kerja' => $shift->status_kerja
	// 						);

	// 						$this->Absen_model->insert($data);
	// 						$this->session->set_flashdata('toastr-success', 'Pulang Lebih Awal');
	// 						redirect(site_url('dashboard'));
	// 					} elseif ($sekarang >= $pulang) {
	// 						$data = array(
	// 							'tgl_absen' => $tgl_sekarang,
	// 							'jam_absen' => date('H:i:s'),
	// 							'nip' => $nip,
	// 							'jenis_absen' => 'Pulang',
	// 							'id_jam_kerja' => $cek_jadwal->id_jadwal_kerja,
	// 							'status_absen' => 'Tepat Waktu',
	// 							'status_kerja' => $shift->status_kerja
	// 						);

	// 						$this->Absen_model->insert($data);
	// 						$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 						redirect(site_url('dashboard'));
	// 					} elseif ($sekarang <= $masuk) {
	// 						$this->session->set_flashdata('toastr-error', 'Waktunya Absen Berangkat');
	// 						redirect(site_url('dashboard'));
	// 					}
	// 				} else {
	// 					$this->session->set_flashdata('toastr-error', 'Jadwal Kerja Tidak Ditemukan');
	// 					redirect(site_url('dashboard'));
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	// public function cek_barcode()
	// {
	// 	$row = $this->db->query("SELECT * FROM qrcode")->row();
	// 	$code = $_POST['data_qrcode'];
	// 	if ($row->data_qrcode == $code) {
	// 		$this->session->set_flashdata('toastr-success', 'Code Benar');
	// 		redirect(site_url('dashboard/guru'));
	// 	} else {
	// 		$this->session->set_flashdata('toastr-error', 'code salah');
	// 		redirect(site_url('dashboard/guru'));
	// 	}
	// }

	// public function berangkat()
	// {
	// 	$row = $this->Guru_model->get_by_id($this->session->id_user);
	// 	$cek_absen_berangkat = $this->Guru_model->cek_absen_berangkat($row->nip);
	// 	if($cek_absen_berangkat > 0){
	// 		$this->session->set_flashdata('toastr-error', 'Anda sudah absen berangkat!');
	// 		redirect(site_url('dashboard/guru'));
	// 	}

	// 	$data = array();

	// 	$this->template->load('layout/master', 'dashboard/absen_berangkat', $data);
	// }

	// public function pulang()
	// {
	// 	$row = $this->Guru_model->get_by_id($this->session->id_user);
	// 	$cek_absen_pulang = $this->Guru_model->cek_absen_pulang($row->nip);
	// 	if($cek_absen_pulang > 0){
	// 		$this->session->set_flashdata('toastr-error', 'Anda sudah absen pulang!');
	// 		redirect(site_url('dashboard/guru'));
	// 	}

	// 	$data = array();

	// 	$this->template->load('layout/master', 'dashboard/absen_pulang', $data);
	// }

	// public function waktu()
	// {
	// 	date_default_timezone_set('Asia/Jakarta'); //Menyesuaikan waktu dengan tempat kita tinggal
	// 	echo $timestamp = date('H:i:s'); //Menampilkan Jam Sekarang
	// }

	// public function guru()
	// {
	// 	$row = $this->Guru_model->get_by_id($this->session->id_user);
	// 	$cek_absen_berangkat = $this->Guru_model->cek_absen_berangkat($row->nip);
	// 	$cek_absen_pulang = $this->Guru_model->cek_absen_pulang($row->nip);
	// 	$get_absen_berangkat = $this->Guru_model->get_absen_berangkat($row->nip);
	// 	$get_absen_pulang = $this->Guru_model->get_absen_pulang($row->nip);

	// 	$data = array(
	// 		'nip' => $row->nip,
	// 		'nama_lengkap' => $row->nama_lengkap,
	// 		'tgl_lahir' => $row->tgl_lahir,
	// 		'alamat' => $row->alamat,
	// 		'jabatan' => $row->jabatan,
	// 		'posisi' => $row->posisi,
	// 		'username' => $row->username,
	// 		'password' => $row->password,
	// 		'cek_absen_berangkat' => $cek_absen_berangkat,
	// 		'cek_absen_pulang' => $cek_absen_pulang,
	// 		'get_absen_berangkat' => $get_absen_berangkat,
	// 		'get_absen_pulang' => $get_absen_pulang,
	// 	);

	// 	$this->template->load('layout/master', 'dashboard/dashboard2', $data);
	// }

	// public function jadwal_guru()
	// {
	// 	$this->template->load('layout/master', 'dashboard/jadwal_guru');
	// }

	// public function absen_berangkat($data)
	// {
	// 	$tgl_sekarang = date("Y-m-d");
	// 	$nip = $this->session->id_user;

	// 	$row = $this->db->query("SELECT * FROM qrcode")->row();

	// 	$code = $data;
	// 	if ($row->data_qrcode == $code) {

	// 		$libur = $this->db->query("SELECT * FROM hari_libur WHERE tgl_libur='$tgl_sekarang'")->row();

	// 		if ($libur) {
	// 			$this->session->set_flashdata('toastr-error', 'Hari ini' . $libur->keterangan . '');
	// 			redirect(site_url('dashboard'));
	// 		} else {
	// 			$cuti = $this->db->query("SELECT * FROM cuti WHERE nip='$nip' AND status_cuti='Disetujui' ORDER BY id_cuti DESC LIMIT 1 ")->row();

	// 			if ($cuti) {
	// 				$tgl_awal = strtotime($cuti->tgl_awal);
	// 				$tgl_akhir = strtotime($cuti->tgl_akhir);
	// 				$sekarang2 = strtotime(date('Y-m-d'));

	// 				if ($sekarang2 >= $tgl_awal && $sekarang2 <= $tgl_akhir) {
	// 					$this->session->set_flashdata('toastr-error', 'Anda Sedang Cuti');
	// 					redirect(site_url('dashboard'));
	// 				} else {
	// 					$cek_absen = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND tgl_absen='$tgl_sekarang' AND jenis_absen='Berangkat'")->row();

	// 					if ($cek_absen) {
	// 						$this->session->set_flashdata('toastr-error', 'Sudah Absen Berangkat');
	// 						redirect(site_url('dashboard'));
	// 					} else {
	// 						$cek_jadwal = $this->db->query("SELECT * FROM jam_kerja WHERE nip='$nip' AND tanggal='$tgl_sekarang'")->row();

	// 						if ($cek_jadwal != NULL) {
	// 							$masuk = strtotime($cek_jadwal->jam_masuk);
	// 							$pulang = strtotime($cek_jadwal->jam_pulang);
	// 							$sekarang = strtotime(date('H:i:s'));

	// 							if ($sekarang <= $masuk) {
	// 								$data = array(
	// 									'tgl_absen' => $tgl_sekarang,
	// 									'jam_absen' => date('H:i:s'),
	// 									'nip' => $nip,
	// 									'jenis_absen' => 'Berangkat',
	// 									'id_jam_kerja' => $cek_jadwal->id_jam_kerja,
	// 									'status_absen' => 'Tepat Waktu',
	// 								);

	// 								$this->Absen_model->insert($data);
	// 								$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 								redirect(site_url('dashboard'));
	// 							} elseif ($sekarang > $masuk && $sekarang < $pulang) {
	// 								$data = array(
	// 									'tgl_absen' => $tgl_sekarang,
	// 									'jam_absen' => date('H:i:s'),
	// 									'nip' => $nip,
	// 									'jenis_absen' => 'Berangkat',
	// 									'id_jam_kerja' => $cek_jadwal->id_jam_kerja,
	// 									'status_absen' => 'Terlambat',
	// 								);

	// 								$this->Absen_model->insert($data);
	// 								$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 								redirect(site_url('dashboard'));
	// 							} elseif ($sekarang >= $pulang) {
	// 								$this->session->set_flashdata('toastr-error', 'Sudah Waktunya Pulang');
	// 								redirect(site_url('dashboard'));
	// 							}
	// 						} else {
	// 							$this->session->set_flashdata('toastr-error', 'Jadwal Kerja Tidak Ditemukan');
	// 							redirect(site_url('dashboard'));
	// 						}
	// 					}
	// 				}
	// 			} else {
	// 				$cek_absen = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND tgl_absen='$tgl_sekarang' AND jenis_absen='Berangkat'")->row();

	// 				if ($cek_absen) {
	// 					$this->session->set_flashdata('toastr-error', 'Sudah Absen Berangkat');
	// 					redirect(site_url('dashboard'));
	// 				} else {
	// 					$cek_jadwal = $this->db->query("SELECT * FROM jam_kerja WHERE nip='$nip' AND tanggal='$tgl_sekarang'")->row();

	// 					if ($cek_jadwal != NULL) {
	// 						$masuk = strtotime($cek_jadwal->jam_masuk);
	// 						$pulang = strtotime($cek_jadwal->jam_pulang);
	// 						$sekarang = strtotime(date('H:i:s'));

	// 						if ($sekarang <= $masuk) {
	// 							$data = array(
	// 								'tgl_absen' => $tgl_sekarang,
	// 								'jam_absen' => date('H:i:s'),
	// 								'nip' => $nip,
	// 								'jenis_absen' => 'Berangkat',
	// 								'id_jam_kerja' => $cek_jadwal->id_jam_kerja,
	// 								'status_absen' => 'Tepat Waktu',
	// 							);

	// 							$this->Absen_model->insert($data);
	// 							$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 							redirect(site_url('dashboard'));
	// 						} elseif ($sekarang > $masuk && $sekarang < $pulang) {
	// 							$data = array(
	// 								'tgl_absen' => $tgl_sekarang,
	// 								'jam_absen' => date('H:i:s'),
	// 								'nip' => $nip,
	// 								'jenis_absen' => 'Berangkat',
	// 								'id_jam_kerja' => $cek_jadwal->id_jam_kerja,
	// 								'status_absen' => 'Terlambat',
	// 							);

	// 							$this->Absen_model->insert($data);
	// 							$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 							redirect(site_url('dashboard'));
	// 						} elseif ($sekarang >= $pulang) {
	// 							$this->session->set_flashdata('toastr-error', 'Sudah Waktunya Pulang');
	// 							redirect(site_url('dashboard'));
	// 						}
	// 					} else {
	// 						$this->session->set_flashdata('toastr-error', 'Jadwal Kerja Tidak Ditemukan');
	// 						redirect(site_url('dashboard'));
	// 					}
	// 				}
	// 			}
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('toastr-error', 'code salah');
	// 		redirect(site_url('dashboard'));
	// 	}
	// }

	// public function absen_pulang($data)
	// {
	// 	$tgl_sekarang = date("Y-m-d");
	// 	$nip = $this->session->id_user;

	// 	$row = $this->db->query("SELECT * FROM qrcode")->row();
	// 	$code = $data;
	// 	if ($row->data_qrcode == $code) {
	// 		$libur = $this->db->query("SELECT * FROM hari_libur WHERE tgl_libur='$tgl_sekarang'")->row();

	// 		if ($libur) {
	// 			$this->session->set_flashdata('toastr-error', 'Hari ini' . $libur->keterangan . '');
	// 			redirect(site_url('dashboard'));
	// 		} else {
	// 			$cuti = $this->db->query("SELECT * FROM cuti WHERE nip='$nip' AND status_cuti='Disetujui' ORDER BY id_cuti DESC LIMIT 1 ")->row();

	// 			if ($cuti) {
	// 				$tgl_awal = strtotime($cuti->tgl_awal);
	// 				$tgl_akhir = strtotime($cuti->tgl_akhir);
	// 				$sekarang2 = strtotime(date('Y-m-d'));

	// 				if ($sekarang2 >= $tgl_awal && $sekarang2 <= $tgl_akhir) {
	// 					$this->session->set_flashdata('toastr-error', 'Anda Sedang Cuti');
	// 					redirect(site_url('dashboard'));
	// 				} else {
	// 					$cek_absen = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND tgl_absen='$tgl_sekarang' AND jenis_absen='Pulang'")->row();

	// 					if ($cek_absen) {
	// 						$this->session->set_flashdata('toastr-error', 'Sudah Absen Pulang');
	// 						redirect(site_url('dashboard'));
	// 					} else {
	// 						$cek_jadwal = $this->db->query("SELECT * FROM jam_kerja WHERE nip='$nip' AND tanggal='$tgl_sekarang'")->row();

	// 						if ($cek_jadwal != NULL) {
	// 							$masuk = strtotime($cek_jadwal->jam_masuk);
	// 							$pulang = strtotime($cek_jadwal->jam_pulang);
	// 							$sekarang = strtotime(date('H:i:s'));

	// 							if ($sekarang < $pulang && $sekarang > $masuk) {
	// 								$data = array(
	// 									'tgl_absen' => $tgl_sekarang,
	// 									'jam_absen' => date('H:i:s'),
	// 									'nip' => $nip,
	// 									'jenis_absen' => 'Pulang',
	// 									'id_jam_kerja' => $cek_jadwal->id_jam_kerja,
	// 									'status_absen' => 'Pulang Lebih Awal',
	// 								);

	// 								$this->Absen_model->insert($data);
	// 								$this->session->set_flashdata('toastr-success', 'Pulang Lebih Awal');
	// 								redirect(site_url('dashboard'));
	// 							} elseif ($sekarang >= $pulang) {
	// 								$data = array(
	// 									'tgl_absen' => $tgl_sekarang,
	// 									'jam_absen' => date('H:i:s'),
	// 									'nip' => $nip,
	// 									'jenis_absen' => 'Pulang',
	// 									'id_jam_kerja' => $cek_jadwal->id_jam_kerja,
	// 									'status_absen' => 'Tepat Waktu',
	// 								);

	// 								$this->Absen_model->insert($data);
	// 								$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 								redirect(site_url('dashboard'));
	// 							} elseif ($sekarang <= $masuk) {
	// 								$this->session->set_flashdata('toastr-error', 'Waktunya Absen Berangkat');
	// 								redirect(site_url('dashboard'));
	// 							}
	// 						} else {
	// 							$this->session->set_flashdata('toastr-error', 'Jadwal Kerja Tidak Ditemukan');
	// 							redirect(site_url('dashboard'));
	// 						}
	// 					}
	// 				}
	// 			} else {
	// 				$cek_absen = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND tgl_absen='$tgl_sekarang' AND jenis_absen='Pulang'")->row();

	// 				if ($cek_absen) {
	// 					$this->session->set_flashdata('toastr-error', 'Sudah Absen Pulang');
	// 					redirect(site_url('dashboard'));
	// 				} else {
	// 					$cek_jadwal = $this->db->query("SELECT * FROM jam_kerja WHERE nip='$nip' AND tanggal='$tgl_sekarang'")->row();

	// 					if ($cek_jadwal != NULL) {
	// 						$masuk = strtotime($cek_jadwal->jam_masuk);
	// 						$pulang = strtotime($cek_jadwal->jam_pulang);
	// 						$sekarang = strtotime(date('H:i:s'));

	// 						if ($sekarang < $pulang && $sekarang > $masuk) {
	// 							$data = array(
	// 								'tgl_absen' => $tgl_sekarang,
	// 								'jam_absen' => date('H:i:s'),
	// 								'nip' => $nip,
	// 								'jenis_absen' => 'Pulang',
	// 								'id_jam_kerja' => $cek_jadwal->id_jam_kerja,
	// 								'status_absen' => 'Pulang Lebih Awal',
	// 							);

	// 							$this->Absen_model->insert($data);
	// 							$this->session->set_flashdata('toastr-success', 'Pulang Lebih Awal');
	// 							redirect(site_url('dashboard'));
	// 						} elseif ($sekarang >= $pulang) {
	// 							$data = array(
	// 								'tgl_absen' => $tgl_sekarang,
	// 								'jam_absen' => date('H:i:s'),
	// 								'nip' => $nip,
	// 								'jenis_absen' => 'Pulang',
	// 								'id_jam_kerja' => $cek_jadwal->id_jam_kerja,
	// 								'status_absen' => 'Tepat Waktu',
	// 							);

	// 							$this->Absen_model->insert($data);
	// 							$this->session->set_flashdata('toastr-success', 'Berhasil Absen');
	// 							redirect(site_url('dashboard'));
	// 						} elseif ($sekarang <= $masuk) {
	// 							$this->session->set_flashdata('toastr-error', 'Waktunya Absen Berangkat');
	// 							redirect(site_url('dashboard'));
	// 						}
	// 					} else {
	// 						$this->session->set_flashdata('toastr-error', 'Jadwal Kerja Tidak Ditemukan');
	// 						redirect(site_url('dashboard'));
	// 					}
	// 				}
	// 			}
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('toastr-error', 'code salah');
	// 		redirect(site_url('dashboard'));
	// 	}
	// }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
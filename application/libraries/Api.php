<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Api
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function getKey()
    {
        $x_api_key = $this->CI->config->item('x_api_key');
        $secretkey = $this->CI->config->item('secretkey');
        $data = array(
            'x_api_key' => $x_api_key,
            'secretkey' => $secretkey,
        );
        return $data;
    }

    public function url($ekor = null)
    {
        //return 'https://soa.unsoed.ac.id/sia-sandbox/v1/' . $ekor;
        return 'https://soa.unsoed.ac.id/sia/v1/' . $ekor;
    }

    public function ruang()
    {
        $url = $this->url('ruang/index');

        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function hari()
    {
        $url = $this->url('hari/index');

        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function slotjadwal()
    {
        $url = $this->url('slotjadwal/index');

        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function progstudi()
    {
        $url = $this->url('progstudi/index');

        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function profile_mahasiswa($id)
    {
        $url = $this->url('mahasiswa/profil?nim=' . $id);
        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function profile_dosen($id)
    {
        $url = $this->url('dosen/profil?emailunsoed=' . $id);
        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function komponenpenilaian($array)
    {
        $url = $this->url('matakuliah/komponenpenilaian');
        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',

        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }


    public function get_makul($id)
    {
        $url = $this->url('matakuliah/perprodi?kodenim=H1B0&kodetahunakadkul=' . $id);
        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }


    public function get_makul_prodi($kodeprodi, $id)
    {
        $url = $this->url('matakuliah/perprodi?kodenim=' . $kodeprodi . '&kodetahunakadkul=' . $id);
        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function get_permakul($array)
    {
        $url = $this->url('matakuliah/persemester');

        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',

        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function get_matakuliah_mahasiswa($array)
    {

        $url = $this->url('krs/permahasiswa');

        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',

        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }

    public function get_matakuliah_mahasiswa_komponen($array)
    {

        $url = $this->url('krs/komponennilaipermk');

        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',

        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }



    public function matakuliah_persemester($array)
    {


        $url = $this->url('matakuliah/persemester');

        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-API-KEY:" .  $this->CI->config->item('x_api_key'),
            "user_key: " . $this->CI->config->item('secretkey'),
            'Connection: Keep-Alive',
            'Keep-Alive: 300',
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($data);
        if (empty($hasil->status)) {
            $respon = array("status" => "no_respon", "info" => "Gagal Akses");
        } else if ($hasil->status == 200) {
            $respon = array("status" => $hasil->status, "info" => $hasil->message, "data_respon" => $hasil->data);
        } else {
            $respon = array("status" => $hasil->status, "info" => $hasil->message);
        }
        return $respon;
    }
}

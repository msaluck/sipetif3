<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model();
    }
}

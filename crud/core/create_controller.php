<?php

$string = "<?php
defined('BASEPATH') OR exit('No direct script access allowed');";

if ($export_excel == '1') {
$string .= "\n\nuse PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;";
}

$string .= "\n\nclass " . $c . " extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        \$this->load->model('$m');
        \$this->load->library('form_validation');";

if ($jenis_tabel == 'datatables') {
    $string .= "\n\t\t\$this->load->library('datatables');";
}
        
$string .= "
    }";

if ($jenis_tabel == 'reguler_table') {
    
$string .= "\n\n    public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->input->get('start'));
        
        if (\$q <> '') {
            \$config['base_url'] = site_url() . '$c_url/?q=' . urlencode(\$q);
            \$config['first_url'] = site_url() . '$c_url/?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = site_url() . '$c_url';
            \$config['first_url'] = site_url() . '$c_url';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = TRUE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);

        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
        );
        \$this->template->load('layout/master','$c_url/$v_list', \$data);
    }";

} else if ($jenis_tabel == 'datatables'){
    
$string .="\n\n    public function index()
    {
        \$this->template->load('layout/master','$c_url/$v_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo \$this->" . $m . "->json();
    }";

} else if ($jenis_tabel == 'clientside') {
    $string .="\n\n    public function index()
    {
        \$data = array(
            '" .$c_url."_data' => \$this->" . $m . "->get_all(),
        );
        \$this->template->load('layout/master','$c_url/$v_list', \$data);
    }";
}
    
$string .= "\n\n    public function read(\$id) 
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);
        if (\$row) {
            \$data = array(";
foreach ($all as $row) {
    $string .= "\n\t\t\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
}
$string .= "\n\t\t\t);
            \$this->template->load('layout/master','$c_url/$v_read', \$data);
        } else {
            \$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('$c_url'));
        }
    }

    public function create() 
    {
        \$data = array(
            'button' => 'Tambah',
            'action' => site_url('$c_url/create_action'),";
foreach ($all as $row) {
    $string .= "\n\t\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
}
$string .= "\n\t\t);
        \$this->template->load('layout/master','$c_url/$v_form', \$data);
    }
    
    public function create_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->create();
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t\t\t);

            \$this->".$m."->insert(\$data);
            \$this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update(\$id) 
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$data = array(
                'button' => 'Ubah',
                'action' => site_url('$c_url/update_action'),";
foreach ($all as $row) {
    $string .= "\n\t\t\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->". $row['column_name']."),";
}
$string .= "\n\t\t\t);
            \$this->template->load('layout/master','$c_url/$v_form', \$data);
        } else {
            \$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->update(\$this->input->post('$pk', TRUE));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}    
$string .= "\n\t\t\t);

            \$this->".$m."->update(\$this->input->post('$pk', TRUE), \$data);
            \$this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('$c_url'));
        }
    }
    
    public function delete(\$id) 
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$this->".$m."->delete(\$id);
            \$this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('$c_url'));
        } else {
            \$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('$c_url'));
        }
    }

    public function _rules() 
    {";
foreach ($non_pk as $row) {
    $int = $row3['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
    $string .= "\n\t\t\$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required$int');";
}    
$string .= "\n\n\t\t\$this->form_validation->set_rules('$pk', '$pk', 'trim');";
$string .= "\n\t\t\$this->form_validation->set_error_delimiters('<span class=\"text-danger\">', '</span>');
    }";

if ($export_excel == '1') {
    $string .= "\n\n    public function excel()
    {
        \$data = \$this->".$m."->get_all();
        \$spreadsheet = new Spreadsheet();

        // Set document properties
        \$spreadsheet->getProperties()->setCreator('CV Jenderal Software')
        ->setLastModifiedBy('CV Jenderal Software')
        ->setTitle('Laporan " . $c . "')
        ->setSubject('Laporan " . $c . "')
        ->setDescription('Laporan " . $c . "')
        ->setKeywords('Laporan " . $c . "')
        ->setCategory('Laporan " . $c . "');

        \$spreadsheet->setActiveSheetIndex(0)";
        $range = range("A", "Z");
        $i = 1;
foreach ($non_pk as $row => $key) {
        $column_name = label($key['column_name']);
        $string .= "\n\t\t->setCellValue('".$range[$row].$i."', '".$column_name."')";
}

$string .= ";\n\n\t\t\$i=2;
        foreach (\$data as \$value) {
            \$spreadsheet->setActiveSheetIndex(0)";

foreach ($non_pk as $row => $key) {
        $column_name = $key['column_name'];
        $string .= "\n\t\t\t->setCellValue('".$range[$row]."'.\$i, \$value->".$column_name.")";
}
$string .= ";\n\t\t\t\$i++;
        }

        \$spreadsheet->getActiveSheet()->setTitle('Laporan " . $c . "');
        \$spreadsheet->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=\"Laporan " . $c . ".xlsx\"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        \$writer = IOFactory::createWriter(\$spreadsheet, 'Xlsx');
        \$writer->save('php://output');
        exit;
    }";
}

if ($export_word == '1') {
    $string .= "\n\n    public function word()
    {
        header(\"Content-type: application/vnd.ms-word\");
        header(\"Content-Disposition: attachment;Filename=$table_name.doc\");

        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );
        
        \$this->template->load('template','" . $c_url ."/". $v_doc . "',\$data);
    }";
}

if ($export_pdf == '1') {
    $string .= "\n\n    public function pdf()
    {
        \$data = array(
            'data_" . $table_name . "' => \$this->" . $m . "->get_all(),
        );
   
        \$this->load->view('" . $c_url ."/". $v_pdf . "', \$data);
    }";
}

$string .= "\n\n}\n\n/* End of file $c_file */
/* Location: ./application/controllers/$c_file */
/* Created at ".date('Y-m-d H:i:s')." */
/* Please DO NOT modify this information : */";

$hasil_controller = createFile($string, $target . "controllers/" . $c_file);

?>
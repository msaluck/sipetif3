<!DOCTYPE html>
<html>
<?php
if ($this->session->userdata('status') != "login_skpi") {
    //  redirect(site_url('login'));
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= nama_aplikasi() ?></title>
    <link rel="icon" href="<?= icon() ?>" type="image/jpeg">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ionicons/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- file upload -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fileUpload/css/fileinput.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/pace-progress/themes/red/pace-theme-flat-top.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- FullCalendar -->
    <link href='<?= base_url() ?>assets/fullcalendar/main.css' rel='stylesheet' />
    <script src="<?= base_url() ?>assets/fullcalendar/main.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/jquery.js"></script> -->
    <script src="<?= base_url() ?>assets/js/qrcodelib.js"></script>
    <script src="<?= base_url() ?>assets/js/webcodecamjquery.js"></script>
    <script src="<?= base_url() ?>assets/js/webcodecamjs.js"></script>
    <script src="<?= base_url() ?>assets/js/filereader.js"></script>
    <script src="<?= base_url() ?>assets/js/html5-qrcode.min.js"></script>
    </body>
    <link rel="stylesheet" href="<?= base_url() ?>assets/calendar/fullcalendar.min.css">
</head>
<!-- Preloader -->

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <div style="display: none;">
            <?= print_r($this->session->userdata) ?>
        </div>
        <?php $this->load->view('layout/header'); ?>

        <?php $this->load->view('layout/sidebar'); ?>

        <div class="content-wrapper">
            <?php $this->load->view('layout/breadcrumb'); ?>

            <section class="content">
                <div class="container-fluid">
                    <?php echo $contents; ?>
                </div>
            </section>
        </div>


        <?php $this->load->view('layout/footer'); ?>

        <?php $this->load->view('layout/alert'); ?>

    </div>
    <!-- ./wrapper -->


    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $(function() {
            $('.summernote').summernote({
                height: 150, //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });
            //Initialize Select2 Elements
            $('.select2').select2()
            $.widget.bridge('uibutton', $.ui.button);
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'YYYY-MM-DD HH:mm:ss'

            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'YYYY-MM-DD hh:mm'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )
        });
    </script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- HIGHCHART -->
    <script src="<?= base_url() ?>assets/plugins/highcharts/highcharts.js"></script>
    <script src="<?= base_url() ?>assets/plugins/highcharts/exporting.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="<?= base_url() ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- File Upload -->
    <script src="<?= base_url(); ?>assets/plugins/fileUpload/js/fileinput.js"></script>
    <!-- Moment Js Local ID -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/id.js" type="text/javascript"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
    <!-- Swal and Toast Control -->
    <script src="<?= base_url() ?>assets/js/alert.js"></script>
    <!-- pace-progress -->
    <script src="<?= base_url() ?>assets/plugins/pace-progress/pace.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/js/adminlte.js"></script>
    <!-- Price Format -->
    <script src="<?= base_url() ?>assets/js/jquery.price_format.2.0.js"></script>
    <!-- Material Datetimepicker -->
    <script src="<?= base_url() ?>assets/plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>
    <!-- Jquery Number -->
    <script src="<?= base_url() ?>assets/js/jquery.number.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/js/demo.js"></script>
    <!-- Alacarte -->
    <script src="<?= base_url() ?>assets/js/alacarte.js"></script>
    <!-- Qr Code  -->


</html>
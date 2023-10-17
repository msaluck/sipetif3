<?php $this->session->set_userdata(array('url_baru' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])); ?>
<div class="row">
	<div class="col-md-9">
		<div class="card card-primary">
			<div class="card-header">
				<h4><i class="fa fa-calendar"></i>&nbsp;<b> Timeline Permintaan Pemeriksaan Lab pada <?=$this->session->name?> </b> </h4>
				<link rel="stylesheet" href="<?php echo base_url() ?>assets/calendar/fullcalendar.min.css" />
			</div>
			<div class="card-body">
				
				<div style="height: 570px;" class="kalender">

					<div id="calendar"></div>
				</div>

			</div>
		</div>
	</div>
	<div class="col-md-3">
		
		<!-- ./col -->
		<div class="col-md-12">
			<!-- small box -->
			<div class="small-box bg-success">
				<div class="inner">
					<?php $idinstansi=$this->session->idinstansi; ?>
					<h3><?=$this->db->query("select * from pengajuan_pemeriksaan where idinstansi='$idinstansi'")->num_rows()?></h3>

					<p>Permintaan</p>
				</div>
				<div class="icon">
					<i class="fa fa-download"></i>
				</div>
				<a href="<?=site_url('pengajuan_pemeriksaan')?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

		<!-- ./col -->
		
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<script src="<?php echo base_url() ?>assets/calendar/lib/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>assets/calendar/gcal.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#calendar').fullCalendar({

		});
	});
	var date_last_clicked = null;

	function get_height() {
		return $('.kalender').height();
	}
	$('#calendar').fullCalendar({
		monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
		monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
		dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', ],
		dayNamesShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
		height: get_height(),
		windowResize: function(view) {
        // $('#calendar').fullCalendar('option', 'height', get_calendar_height());
    },
    eventSources: [{
    	events: function(start, end, timezone, callback) {
    		$.ajax({
    			url: '<?php echo site_url() ?>pengajuan_pemeriksaan/get_events_instansi',
    			dataType: 'json',
    			data: {
    				start: start.unix(),
    				end: end.unix()
    			},
    			success: function(msg) {
    				var events = msg.events;
    				callback(events);
    			}
    		});
    	}
    }, ],

    eventClick: function(event, jsEvent, view) {
    	$('#name').val(event.title);
    	$('#description').val(event.description);
    	$('#jenis').val(event.jenis);
    	$('#pelanggan').val(event.pelanggan);
    	$('#detail').val(event.detail);
    	$('#lokasi').val(event.lokasi);
    	url = "<?= site_url() ?>pengajuan_pemeriksaan/read/" + event.id;
    	$('#start_date').val(moment(event.start).format('DD MMMM YYYY'));
    	if (event.end) {
    		$('#end_date').val(moment(event.end).format('DD MMMM YYYY HH:mm'));
    	} else {
    		$('#end_date').val(moment(event.start).format('DD MMMM YYYY HH:mm'));
    	}
    	$('#event_id').val(event.id);
    	window.location.href = url;
    },


});
</script>

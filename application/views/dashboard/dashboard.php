<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/fullcalendar/dist/fullcalendar.min.css')?>">
<div class="row">
	<div class="col-md-12">
		<?php echo content_open(); ?>
		<div class="box-body">
			<!-- THE CALENDAR -->
			<div id="calendar"></div>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
<!-- fullCalendar -->
<script src="<?php echo base_url('assets/bower_components/moment/moment.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/fullcalendar/dist/fullcalendar.min.js')?>"></script>
<script type="text/javascript">
	/* initialize the calendar
     -----------------------------------------------------------------*/
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
      	<?php foreach($results as $data) { $date = explode('-', $data->tanggal); 
      		$tt = '[Mata Kuliah] '.$data->mata_kuliah.' - [Kategori] '.$data->kategori_ujian.' - [Dosen] '.$data->nama;
      		?>
      		{
	          title          : '<?php echo $tt; ?>',
	          start          : new Date(<?php echo $date[0];?>, <?php echo $date[1] - 1;?>, <?php echo $date[2];?>),
	          backgroundColor: '#00a65a', //Success (green)
	          borderColor    : '#00a65a' //Success (green)
	        },
      	<?php } ?>
      ],
      editable  : false,
      droppable : false // this allows things to be dropped onto the calendar !!
    })
</script>
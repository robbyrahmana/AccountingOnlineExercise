<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Simple Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'))?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'))?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/Ionicons/css/ionicons.min.css'))?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'))?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/dist/css/AdminLTE.min.css'))?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/dist/css/skins/_all-skins.min.css'))?>">
  <!-- jQuery 3 -->
  <script src="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/jquery/dist/jquery.min.js'))?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
   

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <div class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><span id="time"></span> </b>Minutes</span>
    </div>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user-menu">
            <?php echo '<li><a href="javascript:my_submit(\''.base_url('test/submit/'.$kelola_soal_id).'\')">' ?>
              <span class="hidden-xs">Submit Exercise</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
	<aside class="main-sidebar">
	  <!-- sidebar: style can be found in sidebar.less -->
	  <section class="sidebar">
	    <!-- sidebar menu: : style can be found in sidebar.less -->
	    <ul class="sidebar-menu tree" data-widget="tree">
        <?php
          $count = 1;
          foreach ($this->session->userdata('soal') as $key=>$data) {
            echo '<li><a href="javascript:my_function(\''.$key.'\')"> <span>Soal - '. $count .'</span></a></li>';  
            $count++;
          }
        ?>
	    </ul>	    
	  </section>
	  <!-- /.sidebar -->
	</aside>
	<div class="content-wrapper">
      <section class="content-header">
        <h1><span id="no"></span></h1>
      </section>
	    <section class="content">
	    	<div class="row">
  				<div class="col-md-12">
  					<div class="box box-primary">
  					<div class="box-body">
              <?php echo custom_form_open('test/jawaban', array('id'=>'data_jawaban'));?> 
				      <span id="soal"></span>
              <?php echo form_hidden('kelola_soal_id', $kelola_soal_id); ?>
              <?php echo form_hidden('seq_id', 0); ?>
              <?php echo form_hidden('mahasiswa_id', $this->session->userdata('userdata')['id']); ?>
              <?php echo custom_form_close(); ?>
		   			</div>
		   			</div>
		   		</div>
			</div>
   		</section>
  	</div>
</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'))?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'))?>"></script>
<!-- Slimscroll -->
<script src="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'))?>"></script>
<!-- FastClick -->
<script src="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/fastclick/lib/fastclick.js'))?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo str_replace('mahasiswa/', '', base_url('assets/dist/js/adminlte.min.js'))?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo str_replace('mahasiswa/', '', base_url('assets/dist/js/demo.js'))?>"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    my_function(0);
    var fiveMinutes = 60 * <?php echo $this->session->userdata('time'); ?>;
    display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
  });

  function my_function(soal_id) {   
    $("#data_jawaban").ajaxSubmit(function() {
      $(this).load("<?php echo base_url('test/navigate/');?>" + soal_id, function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
          document.getElementById("soal").innerHTML=responseTxt;
          $("input[name='seq_id']").val(soal_id);
          document.getElementById("no").innerHTML= "Soal - " + (+soal_id + 1); 
        if(statusTxt == "error")
          alert("Error: " + xhr.status + ": " + xhr.statusText);
      });
    });
  }

  function startTimer(duration, display) {
      var timer = duration, hours, minutes, seconds;
      setInterval(function () {
          hours = parseInt((timer / (60*60)) % 24, 10)
          minutes = parseInt((timer / 60) % 60, 10)
          seconds = parseInt(timer % 60, 10);

          hours = hours < 10 ? "0" + hours : hours;
          minutes = minutes < 10 ? "0" + minutes : minutes;
          seconds = seconds < 10 ? "0" + seconds : seconds;

          display.textContent = hours + ":" + minutes + ":" + seconds;

          //check if finish
          if (--timer < 0) {
              // timer = duration;
              my_submit('<?php echo base_url('test/submit/'.$kelola_soal_id); ?>');
          }
      }, 1000);
  }

  function my_submit(url) {
    $("#data_jawaban").ajaxSubmit(function() {
      window.location.href = url;
    });
  }
</script>
</body>
</html>

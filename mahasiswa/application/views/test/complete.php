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
	<section class="content-header">
        <h1><span id="no"></span></h1>
      </section>
      <section class="content">
        <div class="error-page">
          <h2 class="headline text-yellow"> <i class="fa fa-thumbs-o-up text-green"></i></h2>

          <div class="error-content">
            <h3> Thank you, exercise is submitted</h3>
            <p>
              You can go to main page by click this <a href="<?php echo base_url('dashboard')?>">link</a>
            </p>
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
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
</body>
</html>

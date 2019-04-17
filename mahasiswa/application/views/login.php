<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'))?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/Ionicons/css/ionicons.min.css'))?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/dist/css/AdminLTE.min.css'))?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo str_replace('mahasiswa/', '', base_url('assets/plugins/iCheck/square/blue.css'))?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <span class="logo-lg"><b>Online</b>Exercise</span>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login</p>

    <?php echo custom_form_open('login');?> 
    
      <?php echo custom_form_error($this->session->flashdata('error')); ?>      

      <?php echo custom_form_input(array('name' => 'username', 'value' => set_value('username'), 'placeholder' => 'Username'), 'envelope') ?>
      <?php echo custom_form_input(array('name' => 'password', 'type' => 'password', 'placeholder' => 'Password'), 'lock') ?>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>

      <a href="<?php echo base_url('/login/register') ?>">Daftar Baru</a>

   <?php echo custom_form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script  src="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/jquery/dist/jquery.min.js'))?>"></script>
<!-- Bootstrap 3.3.7 -->
<script  src="<?php echo str_replace('mahasiswa/', '', base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'))?>"></script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Akun Baru</title>
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
	<div class="content-wrapper">
		<section class="content-header">
	      <h1>Daftar Akun Baru</h1>
	    </section>
	    <section class="content">
	    	<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
					<div class="box-body">
				    <?php echo custom_form_open('login/register');
				    	echo custom_form_error($this->session->flashdata('error'));    

				      	echo custom_form_group_input('NIM', array('name' => 'nim', 'value' => set_value('nim'), 'placeholder' => 'NIM')) ;

				      	echo custom_form_group_input('Nama Mahasiswa', array('name' => 'nama', 'value' => set_value('nama'), 'placeholder' => 'Nama Mahasiswa')) ;

				      	echo custom_form_group_input('SKS Lulus', array('name' => 'jumlah_sks', 'value' => set_value('jumlah_sks'), 'placeholder' => 'SKS Lulus')) ;

				      	echo custom_form_group_input('IPK', array('name' => 'ipk', 'value' => set_value('ipk'), 'placeholder' => 'IPK')) ;


				      	$dosen_data = array();
						$dosen_data[''] = '-- please select --';
						foreach ($dosen as $value) {
							$dosen_data[$value->id] = $value->nama;
						}
						echo custom_form_group_dropdown('Pembimbing Akademik', array('name'=>'dosen_id','selected'=>set_value('dosen_id'), 'options'=>$dosen_data));

				      	echo custom_form_group_input('No. Bukti Pembayaran', array('name' => 'bukti_pembayaran', 'value' => set_value('bukti_pembayaran'), 'placeholder' => 'No. Bukti Pembayaran')) ;

				      	echo custom_form_group_input('Username', array('name' => 'username', 'value' => set_value('username'), 'placeholder' => 'Username')) ;
				      	echo custom_form_group_input('Password', array('name' => 'password', 'type' => 'password', 'placeholder' => 'Password')) ;

				      	echo form_hidden('role', 'Mahasiswa');
				    ?>
				      <div class="row">
				        <!-- /.col -->
				        <div class="col-xs-4 pull-right">
				          <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
				        </div>
				        <!-- /.col -->
				      </div>

				      <a href="<?php echo base_url('/login') ?>">Sudah memiliki akun ?</a>

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
</body>
</html>
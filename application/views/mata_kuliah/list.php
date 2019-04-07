<div class="row">
	<div class="col-md-12">
		<?php 
			$link = array('title' => 'Tambah '.$title, 'url' => base_url($base_url.'/add'));
			echo content_open('Daftar '.$title, $link); 
		?>
		<div class="box-body">
			<?php echo $base_url ?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
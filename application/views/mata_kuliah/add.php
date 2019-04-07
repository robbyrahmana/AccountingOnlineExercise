<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah '.$title); ?>
		<div class="box-body">
			<?php echo custom_form_open($base_url.'/add');?>
				<?php echo custom_form_group('Mata Kuliah'); ?>
				<div class="pull-right box-tools">
					<?php
						$link = array('title' => 'Kembali', 'url' => base_url($base_url), 'type'=>'warning');
						echo custom_button_link($link);
					?>
					<?php echo custom_button_reset(); ?>
					<?php echo custom_button_submit(); ?>
				</div>
			<?php echo custom_form_close(); ?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
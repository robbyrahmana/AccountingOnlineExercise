<div class="row">
	<div class="col-md-12">
		<?php echo content_open(); ?>
		<div class="box-body">
			<?php
				echo custom_form_group_date('Date', array('name'=>'nip','value'=>set_value('nip'), 'placeholder'=>'NIP'));
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
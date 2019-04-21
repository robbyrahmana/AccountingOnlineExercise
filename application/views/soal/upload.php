<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Upload '.$title); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo form_open_multipart($base_url.'/uploadFile');

				echo custom_form_group_input('File', array('name'=>'file', 'type'=>'file'));

				//form action
				echo custom_form_action(base_url($base_url . '/list_soal/' . $kelola_soal_id), false, true);

				echo form_hidden('kelola_soal_id', $kelola_soal_id);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah Essai'); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open($base_url.'/essai');

				// fields
				echo custom_form_group_input('Soal', array('name'=>'soal','value'=>set_value('soal'), 'placeholder'=>'Soal'));
				
				echo custom_form_group_input('Jawaban Benar', array('name'=>'jawaban','value'=>set_value('jawaban'), 'placeholder'=>'Jawaban Benar'));

				echo custom_form_group_input('Bobot Nilai', array('name'=>'bobot_nilai','type'=>'number','value'=>set_value('bobot_nilai'), 'placeholder'=>'Bobot Nilai'));

				echo form_hidden('tipe_soal', '0');
				echo form_hidden('kelola_soal_id', $kelola_soal_id);

				//form action
				echo custom_form_action(base_url($base_url.'/list_soal/'.$kelola_soal_id), true, true);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
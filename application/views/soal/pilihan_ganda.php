<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah Pilihan Ganda'); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open($base_url.'/pilihan_ganda');

				// fields
				echo custom_form_group_input('Soal', array('name'=>'soal','value'=>set_value('soal'), 'placeholder'=>'Soal'));
				
				echo custom_form_group_input('Jawaban A', array('name'=>'jawaban_a','value'=>set_value('jawaban_a'), 'placeholder'=>'Jawaban A'));
				
				echo custom_form_group_input('Jawaban B', array('name'=>'jawaban_b','value'=>set_value('jawaban_b'), 'placeholder'=>'Jawaban B'));
				
				echo custom_form_group_input('Jawaban C', array('name'=>'jawaban_c','value'=>set_value('jawaban_c'), 'placeholder'=>'Jawaban C'));
				
				echo custom_form_group_input('Jawaban D', array('name'=>'jawaban_d','value'=>set_value('jawaban_d'), 'placeholder'=>'Jawaban D'));

				$jawaban = array();
				$jawaban[''] = '-- please select --';
				$jawaban['a'] = 'A';
				$jawaban['b'] = 'B';
				$jawaban['c'] = 'C';
				$jawaban['d'] = 'D';
				echo custom_form_group_dropdown('Jawaban Benar', array('name'=>'jawaban','selected'=>set_value('jawaban'), 'options'=>$jawaban));

				echo form_hidden('tipe_soal', '1');
				echo form_hidden('kelola_soal_id', $kelola_soal_id);

				//form action
				echo custom_form_action(base_url($base_url.'/list_soal/'.$kelola_soal_id), true, true);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
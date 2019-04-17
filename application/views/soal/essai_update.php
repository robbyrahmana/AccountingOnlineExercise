<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Edit Essai'); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open($base_url.'/essai_update');

				// fields
				foreach($results as $data) {
					$soal = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('soal') : $data->soal;
					echo custom_form_group_input('Soal', array('name'=>'soal','value'=>$soal, 'placeholder'=>'Soal'));
					
					$jawaban = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('jawaban') : $data->jawaban;
					echo custom_form_group_input('Jawaban Benar', array('name'=>'jawaban','value'=>$jawaban, 'placeholder'=>'Jawaban Benar'));

					$bobot_nilai = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('bobot_nilai') : $data->bobot_nilai;
					echo custom_form_group_input('Bobot Nilai', array('name'=>'bobot_nilai','type'=>'number','value'=>$bobot_nilai, 'placeholder'=>'Bobot Nilai'));

					echo form_hidden('tipe_soal', '0');
					echo form_hidden('kelola_soal_id', $kelola_soal_id);
					echo form_hidden('id', $data->id);
					echo form_hidden('jawaban_id', $data->jawaban_id);
				}
				//form action
				echo custom_form_action(base_url($base_url.'/list_soal/'.$kelola_soal_id), false, true);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
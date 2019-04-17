<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Edit Pilihan Ganda'); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open($base_url.'/pilihan_ganda_update');

				// fields
				foreach($results as $data) {
					$soal = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('soal') : $data->soal;
					echo custom_form_group_input('Soal', array('name'=>'soal','value'=>$soal, 'placeholder'=>'Soal'));
					
					$jawaban_a = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('jawaban_a') : $data->jawaban_a;
					echo custom_form_group_input('Jawaban A', array('name'=>'jawaban_a','value'=>$jawaban_a, 'placeholder'=>'Jawaban A'));
					
					$jawaban_b = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('jawaban_b') : $data->jawaban_b;
					echo custom_form_group_input('Jawaban B', array('name'=>'jawaban_b','value'=>$jawaban_b, 'placeholder'=>'Jawaban B'));
					
					$jawaban_c = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('jawaban_c') : $data->jawaban_c;
					echo custom_form_group_input('Jawaban C', array('name'=>'jawaban_c','value'=>$jawaban_c, 'placeholder'=>'Jawaban C'));
					
					$jawaban_d = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('jawaban_d') : $data->jawaban_d;
					echo custom_form_group_input('Jawaban D', array('name'=>'jawaban_d','value'=>$jawaban_d, 'placeholder'=>'Jawaban D'));

					$jawaban_d = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('jawaban') : $data->jawaban;
					$jawaban = array();
					$jawaban[''] = '-- please select --';
					$jawaban['a'] = 'A';
					$jawaban['b'] = 'B';
					$jawaban['c'] = 'C';
					$jawaban['d'] = 'D';
					echo custom_form_group_dropdown('Jawaban Benar', array('name'=>'jawaban','selected'=>$jawaban_d, 'options'=>$jawaban));

					$bobot_nilai = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('bobot_nilai') : $data->bobot_nilai;
					echo custom_form_group_input('Bobot Nilai', array('name'=>'bobot_nilai','type'=>'number','value'=>$bobot_nilai, 'placeholder'=>'Bobot Nilai'));

					echo form_hidden('tipe_soal', '1');
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
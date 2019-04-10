<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah '.$title); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open(uri_string());

				foreach($results as $data) {
					// fields
					$mata_kuliah_id = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('mata_kuliah_id') : $data->mata_kuliah_id;
					$mata_kuliah_data = array();
					$mata_kuliah_data[''] = '-- please select --';
					foreach ($mata_kuliah as $value) {
						$mata_kuliah_data[$value->id] = '[Mata Kuliah] '.$value->mata_kuliah.' - [Kategori] '.$value->kategori_ujian.' - [Dosen] '.$value->nama;
					}
					echo custom_form_group_dropdown('Mata Kuliah', array('name'=>'mata_kuliah_id', 'selected'=>$mata_kuliah_id, 'options'=>$mata_kuliah_data));

					$tanggal = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('tanggal') : $data->tanggal;
					echo custom_form_group_date('Tanggal Ujian', array('name'=>'tanggal','value'=>nice_date($data->tanggal, 'm/d/Y'), 'placeholder'=>'Kode Mata Kuliah'));

					$jumlah_soal = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('jumlah_soal') : $data->jumlah_soal;
					echo custom_form_group_input('Jumlah Soal', array('type'=>'number','name'=>'jumlah_soal','value'=>$jumlah_soal, 'placeholder'=>'Jumlah Soal'));

					$waktu = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('waktu') : $data->waktu;
					echo custom_form_group_input('Waktu', array('type'=>'number','name'=>'waktu','value'=>$waktu, 'placeholder'=>'Waktu (menit)'));

					echo form_hidden('id', $data->id);
				}

				//form action
				echo custom_form_action(base_url($base_url), false, true);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
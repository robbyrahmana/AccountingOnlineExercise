<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah '.$title); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open(uri_string());

				foreach($results as $data) {
					// fields
					$mata_kuliah_cd = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('mata_kuliah_cd') : $data->mata_kuliah_cd;
					echo custom_form_group_input('Kode Mata Kuliah', array('name'=>'mata_kuliah_cd','value'=>$mata_kuliah_cd, 'placeholder'=>'Kode Mata Kuliah'));

					$mata_kuliah = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('mata_kuliah') : $data->mata_kuliah;
					echo custom_form_group_input('Mata Kuliah', array('name'=>'mata_kuliah','value'=>$mata_kuliah, 'placeholder'=>'Mata Kuliah'));

					$kategori_ujian_id = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('kategori_ujian_id') : $data->kategori_ujian_id;
					$kategori_data = array();
					foreach ($kategori as $value) {
						$kategori_data[$value->id] = $value->kategori_ujian;
					}
					echo custom_form_group_dropdown('Kategori Ujian', array('name'=>'kategori_ujian_id', 'selected'=>$kategori_ujian_id, 'options'=>$kategori_data));

					$dosen_id = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('dosen_id') : $data->dosen_id;
					$dosen_data = array();
					foreach ($dosen as $value) {
						$dosen_data[$value->id] = $value->nama;
					}
					echo custom_form_group_dropdown('dosen', array('name'=>'dosen_id', 'selected'=>$dosen_id, 'options'=>$dosen_data));

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
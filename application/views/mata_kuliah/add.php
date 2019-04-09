<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah '.$title); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open($base_url.'/add');

				// fields
				echo custom_form_group_input('Kode Mata Kuliah', array('name'=>'mata_kuliah_cd','value'=>set_value('mata_kuliah_cd'), 'placeholder'=>'Kode Mata Kuliah'));
				echo custom_form_group_input('Mata Kuliah', array('name'=>'mata_kuliah','value'=>set_value('mata_kuliah'), 'placeholder'=>'Mata Kuliah'));

				$kategori_data = array();
				foreach ($kategori as $value) {
					$kategori_data[$value->id] = $value->kategori_ujian;
				}
				echo custom_form_group_dropdown('Kategori Ujian', array('name'=>'kategori_ujian_id', 'options'=>$kategori_data));

				$dosen_data = array();
				foreach ($dosen as $value) {
					$dosen_data[$value->id] = $value->nama;
				}
				echo custom_form_group_dropdown('Dosen', array('name'=>'dosen_id', 'options'=>$dosen_data));

				//form action
				echo custom_form_action(base_url($base_url), true, true);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
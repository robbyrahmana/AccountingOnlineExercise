<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah '.$title); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open($base_url.'/add');

				// fields
				$mata_kuliah_data = array();
				$mata_kuliah_data[''] = '-- please select --';
				foreach ($mata_kuliah as $value) {
					$mata_kuliah_data[$value->id] = '[Mata Kuliah] '.$value->mata_kuliah.' - [Kategori] '.$value->kategori_ujian.' - [Dosen] '.$value->nama;
				}
				echo custom_form_group_dropdown('Mata Kuliah', array('name'=>'mata_kuliah_id','selected'=>set_value('mata_kuliah_id'), 'options'=>$mata_kuliah_data));

				echo custom_form_group_date('Tanggal Ujian', array('name'=>'tanggal','value'=>set_value('name'),'value'=>set_value('tanggal')));

				echo custom_form_group_input('Jumlah Pilihan Ganda', array('type'=>'number','name'=>'jumlah_pilihan_ganda','value'=>set_value('jumlah_pilihan_ganda'), 'placeholder'=>'Jumlah Pilihan Ganda'));

				echo custom_form_group_input('Jumlah Soal Essai', array('type'=>'number','name'=>'jumlah_essai','value'=>set_value('jumlah_essai'), 'placeholder'=>'Jumlah Soal Essai'));

				//form action
				echo custom_form_action(base_url($base_url), true, true);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
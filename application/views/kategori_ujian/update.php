<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah '.$title); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open(uri_string());

				foreach($results as $data) {
					// fields
					$kategori_ujian = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('kategori_ujian') : $data->kategori_ujian;
					echo custom_form_group('Kategori Ujian', array('value'=>$kategori_ujian,'name'=>'kategori_ujian', 'placeholder'=>'Kategori ujian'));

					echo form_hidden('id', $data->id);
				}

				//form action
				echo custom_form_action(base_url($base_url), true, true);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah '.$title); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open(uri_string());

				foreach($results as $data) {
					// fields
					$nip = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('nip') : $data->nip;
					echo custom_form_group_input('NIP', array('name'=>'nip','value'=>$nip, 'placeholder'=>'NIP'));

					$nama = $_SERVER["REQUEST_METHOD"]=='POST' ? set_value('nama') : $data->nama;
					echo custom_form_group_input('Nama Dosen', array('name'=>'nama','value'=>$nama, 'placeholder'=>'Nama Dosen'));

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
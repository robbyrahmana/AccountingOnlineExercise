<div class="row">
	<div class="col-md-12">
		<?php echo content_open('Tambah '.$title); ?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo custom_form_open($base_url.'/add');

				// fields
				echo custom_form_group_input('NIP', array('name'=>'nip','value'=>set_value('nip'), 'placeholder'=>'NIP'));
				echo custom_form_group_input('Nama Dosen', array('name'=>'nama','value'=>set_value('nama'), 'placeholder'=>'Nama Dosen'));
				
				echo custom_form_group_input('Username', array('name'=>'username','value'=>set_value('username'), 'placeholder'=>'Username'));
				echo custom_form_group_input('Password', array('name'=>'password','value'=>set_value('password'), 'placeholder'=>'Password', 'type'=>'password'));

				echo form_hidden('role', 'Dosen');

				//form action
				echo custom_form_action(base_url($base_url), true, true);

				echo custom_form_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
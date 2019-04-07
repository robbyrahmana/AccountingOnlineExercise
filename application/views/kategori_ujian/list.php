<div class="row">
	<div class="col-md-12">
		<?php 
			$link = array('title' => 'Tambah '.$title, 'url' => base_url($base_url.'/add'));
			echo content_open('Daftar '.$title, $link); 
		?>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo table_open();

				// table header
				echo table_header(
					array(
						'Kategori ujian'=>'',
						'Aksi'=>'150'
					)
				); 

				// table content
				if (! $results) {
					echo table_no_record(2);
				} else {
					foreach($results as $data) {
						echo '<tr>';
						echo '<td>'.$data->kategori_ujian.'</td>';
						echo table_action(base_url($base_url), $data->id, true, true);
						echo '</tr>';
					}
				}

				echo table_close();

				// table pagination
				echo '<p>'.$links.'</p>';
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
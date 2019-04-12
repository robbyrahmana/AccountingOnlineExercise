<div class="row">
	<div class="col-md-12">
		<?php 
			$link = array('title' => 'Kembali ke Kelola Soal', 'url' => base_url('/kelola_soal'), 'type'=>'warning');
			echo content_open('Daftar '.$title, $link); 
		?>
		<div class="box-body">
			<?php 
				$total_soal = $count_essai + $count_pilihan_ganda;
				$tambah = true;
				foreach($kelola_soal as $data) { 
					if ($data->jumlah_soal == $total_soal) {
						$tambah = false;
					}
			?>
			<dl class="dl-horizontal">
                <dt>Mata Kuliah</dt>
                	<dd><?php echo $data->mata_kuliah; ?></dd>
                <dt>Kategori Ujian</dt>
                	<dd><?php echo $data->kategori_ujian; ?></dd>
                <dt>Dosen</dt>
                	<dd><?php echo $data->nama; ?></dd>
                <dt>Tanggal Ujian</dt>
                	<dd><?php echo nice_date($data->tanggal, 'd - M - Y'); ?></dd>
                <dt>Jumlah Soal</dt>
                	<dd><?php echo $data->jumlah_soal . ' (essai: '. $count_essai .', pilihan ganda: '. $count_pilihan_ganda .')'; ?></dd>
                <dt>Waktu</dt>
                	<dd><?php echo $data->waktu.' menit'; ?></dd>
            </dl>
        	<?php } ?>
        	<hr/>
        	<?php 
        	//if total soal is equal sum essai and pilihan, hide form
        	if ($tambah) {
        		echo custom_form_open($base_url.'/add');

				$tipe_soal = array();
				$add_data[''] = '-- please select --';
				$add_data['0'] = 'Essai';
				$add_data['1'] = 'Pilihan Ganda';
				echo '<dl class="dl-horizontal">
						<dt>Tambal Soal</dt>
						<dd><div class="col-md-3">'.custom_form_dropdown(array('name'=>'tipe_soal','selected'=>set_value('tipe_soal'), 'options'=>$add_data)).'<button type="submit" class="btn btn-success btn-flat">Tambah</button>
						</div></dd>
					</dl>';

					echo form_hidden('kelola_soal_id', $id);

				echo custom_form_close();
			}
        	?>
			<?php
				// table
				echo custom_form_error($this->session->flashdata('error'));
				echo table_open();

				// table header
				echo table_header(
					array(
						'Tipe Soal'=>'',
						'Soal'=>'',
						'Jawaban'=>'',
						'Aksi'=>'150'
					)
				); 

				// table content
				if (! $results) {
					echo table_no_record(4);
				} else {
					foreach($results as $data) {
						if ( $data->tipe_soal) {
							if ($data->jawaban == 'a') {
								$data->jawaban = $data->jawaban_a;
							} else if ($data->jawaban == 'b') {
								$data->jawaban = $data->jawaban_b;
							} else if ($data->jawaban == 'c') {
								$data->jawaban = $data->jawaban_c;
							} else if ($data->jawaban == 'd') {
								$data->jawaban = $data->jawaban_d;
							}
						}
						$type = $data->tipe_soal ? 'Pilihan Ganda' : 'Essai';
						echo '<tr>';
						echo '<td>'.$type.'</td>';
						echo '<td>'.$data->soal.'</td>';
						echo '<td>'.$data->jawaban.'</td>';
						echo table_action(base_url($base_url), $data->id.'/'.$data->soal_id.'/'.$id, true, true);
						echo '</tr>';
					}
				}

				echo table_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
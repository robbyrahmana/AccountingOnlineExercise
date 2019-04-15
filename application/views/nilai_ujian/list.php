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
						'Mata Kuliah'=>'',
						'Kategori Ujian'=>'',
						'Dosen'=>'',
						'Tanggal Ujian'=>'',
						'Jumlah Soal'=>'',
						'Waktu'=>'',
						'Data Siswa'=>'150'
					)
				); 

				// table content
				if (! $results) {
					echo table_no_record(8);
				} else {
					foreach($results as $data) {
						echo '<tr>';
						echo '<td>'.$data->mata_kuliah.'</td>';
						echo '<td>'.$data->kategori_ujian.'</td>';
						echo '<td>'.$data->nama.'</td>';
						echo '<td>'.nice_date($data->tanggal, 'd - M - Y').'</td>';
						echo '<td>'.$data->jumlah_soal.'</td>';
						echo '<td>'.$data->waktu.' menit</td>';
						echo '
								<td>
									<div class="box-tools">
										<a href="'.base_url('nilai_ujian/list_mahasiswa/'.$data->id).'" type="button" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-users"></i></a>&nbsp;&nbsp;
										
									</div>
								</td>
							';
							// <a href="'.base_url($base_url.'/'.$data->id).'" type="button" class="btn btn-sm btn-flat btn-success"><i class="fa fa-eye"></i></a>
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
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">List Mahasiswa</h3>
			<div class="box-tools">
				<a href="<?php echo base_url('nilai_ujian'); ?>" type="button" class="btn btn-sm btn-flat btn-warning">Kembali ke daftar ujian</a>
			</div>
		</div>
		<div class="box-body">
			<?php 
				echo custom_form_error($this->session->flashdata('error'));
				echo table_open();

				// table header
				echo table_header(
					array(
						'NIM'=>'',
						'Nama Mahasiswa'=>'',
						'SKS Lulus'=>'',
						'IPK'=>'',
						'Pembimbing Akademik'=>'',
						'No. Bukti Pembayaran'=>'',
						'Tanggal'=>'',
						'Nilai'=>'150'
					)
				); 

				// table content
				if (! $results) {
					echo table_no_record(8);
				} else {
					foreach($results as $data) {
						echo '<tr>';
						echo '<td>'.$data->nim.'</td>';
						echo '<td>'.$data->nama.'</td>';
						echo '<td>'.$data->jumlah_sks.'</td>';
						echo '<td>'.$data->ipk.'</td>';
						echo '<td>'.$data->nama_dosen.'</td>';
						echo '<td>'.$data->bukti_pembayaran.'</td>';
						echo '<td>'.nice_date($data->tanggal, 'd - M - Y').'</td>';
						echo '
								<td>
									<div class="box-tools">
										<a href="'.base_url('nilai_ujian/mahasiswa_essai/'.$data->id).'" type="button" class="btn btn-sm btn-flat btn-success">periksa essai</a>&nbsp;&nbsp;
										
									</div>
								</td>
							';
							// <a href="'.base_url($base_url.'/'.$data->id).'" type="button" class="btn btn-sm btn-flat btn-success"><i class="fa fa-eye"></i></a>
						echo '</tr>';
					}
				}

				echo table_close();
			?>
		</div>
		<?php echo content_close(); ?>
	</div>
</div>
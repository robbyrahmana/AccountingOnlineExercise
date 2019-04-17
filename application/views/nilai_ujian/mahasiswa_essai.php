<div class="row">
	<div class="col-md-12">
	  <div class="box box-primary">
	    <div class="box-header with-border">
	      <h3 class="box-title">Jawaban Essai</h3>
	      <div class="box-tools">
	      	<a href="<?php echo base_url('nilai_ujian/list_mahasiswa/'.$kelola_soal_id); ?>" type="button" class="btn btn-sm btn-flat btn-warning">Kembali ke daftar mahasiswa</a>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	    	<?php echo custom_form_error($this->session->flashdata('error')); ?>
	      <div class="box-group" id="accordion">
	        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
	      <?php $seq = 1; $open = 0;foreach($results as $data) { ?>
	        <div class="panel box box-success">
	          <div class="box-header with-border">
	            <h4 class="box-title">
	              <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $seq; ?>">
	                Essai <?php echo $seq; ?>
	              </a>
	            </h4>
	          </div>
	          <div id="<?php echo $seq; ?>" class="panel-collapse collapse <?php if ($open == 0 & $data->nilai == null) { echo 'in'; $open++; } ?>">
	            <div class="box-body">
	              	<div class="form-group">
						<label>Soal</label>
						<p><?php echo $data->soal; ?></p>
					</div>
					<div class="form-group">
						<label>Jawaban Benar</label>
						<p><?php echo $data->jawaban; ?></p>
					</div>
					<div class="form-group">
						<label>Jawaban Mahasiswa</label>
						<p><?php echo $data->jawaban_mahasiswa; ?></p>
					</div>
					<div class="form-group">
						<label>Bobot Nilai</label>
						<p><?php echo $data->bobot_nilai; ?></p>
					</div>
					<div class="form-group">
						<label>Nilai</label>
						<p><?php echo custom_form_open('nilai_ujian/mahasiswa_essai/'.$kelola_soal_mahasiswa_id.'/'.$mahasiswa_id.'/'. $kelola_soal_id); ?>
							<dl class="dl-horizontal">
								<dt>
									<input type="number" name="nilai" value="<?php echo $data->nilai; ?>" placeholder="Nilai" class="form-control">
								</dt>
								<?php if (! $data->nilai) { ?>
								<dd>
									<input type="submit" class="btn btn-primary btn-flat" value="Simpan">	
								</dd>
							<?php } ?>
							</dl>
							<?php echo form_hidden('id', $data->id); ?>
							<?php echo form_hidden('id_kelola_mahasiswa', $data->id_kelola_mahasiswa);?>
							<?php echo form_hidden('final_result', $data->final_result);  ?>
							<?php echo custom_form_close();  ?>
						</p>
					</div>
	            </div>
	          </div>
	        </div>
	      <?php $seq++; } ?>
	      </div>
	    </div>
	    <!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
</div>
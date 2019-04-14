<div class="form-group">
	<label>Soal</label>
	<p><?php echo $data_soal->soal; ?></p>
</div>

<p>
	<div class="form-group">
		<div class="radio">
			<label>
				<?php echo form_radio('jawaban', 'a', $this->session->userdata('soal-'.$data_soal->id)['jawaban'] == 'a' ? true : false ) .$data_soal->jawaban_a; ?>
			</label>
		</div>
		<div class="radio">
			<label>
				<?php echo form_radio('jawaban', 'b', $this->session->userdata('soal-'.$data_soal->id)['jawaban'] == 'b' ? true : false ) .$data_soal->jawaban_b; ?>
			</label>
		</div>
		<div class="radio">
			<label>
				<?php echo form_radio('jawaban', 'c', $this->session->userdata('soal-'.$data_soal->id)['jawaban'] == 'c' ? true : false ) .$data_soal->jawaban_c; ?>
			</label>
		</div>
		<div class="radio">
			<label>
				<?php echo form_radio('jawaban', 'd', $this->session->userdata('soal-'.$data_soal->id)['jawaban'] == 'd' ? true : false ) .$data_soal->jawaban_d; ?>
			</label>
		</div>
	</div>
</p>
<?php echo form_hidden('soal_id', $data_soal->id); ?>
<?php echo form_hidden('tipe_soal', $data_soal->tipe_soal); ?>
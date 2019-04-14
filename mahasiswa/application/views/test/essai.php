<div class="form-group">
	<label>Soal</label>
	<p><?php echo $data_soal->soal; ?></p>
</div>

<div class="form-group">
	<label>Jawaban</label>
	<p><?php echo custom_form_input(array('name'=>'jawaban','value'=> $this->session->userdata('soal-'.$data_soal->id)['jawaban'], 'placeholder'=>'Jawaban'));
?></p>
</div>
<?php echo form_hidden('soal_id', $data_soal->id); ?>
<?php print_r($this->session->userdata($data_soal->id)); ?>
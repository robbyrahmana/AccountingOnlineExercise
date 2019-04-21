<?php
function read_file_docx($filename){
	$striped_content = '';
	$content = '';

	if(!$filename || !file_exists($filename)) {
		echo "fail read file<br/>"; 
		return false;
	}

	$zip = zip_open($filename);

	if (!$zip || is_numeric($zip)) {
		echo "fail open<br/>"; 
		return false;
	}

	while ($zip_entry = zip_read($zip)) {

		if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

		if (zip_entry_name($zip_entry) != "word/document.xml") continue;

		$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

		zip_entry_close($zip_entry);

	}// end while

	zip_close($zip);

	// $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);

	// $content = str_replace('</w:r></w:p>', "\r\n", $content);

	$striped_content = strip_tags($content);

	return $striped_content;

}

$filename = "assets/Check.docx";// or /var/www/html/file.docx

$content = read_file_docx($filename);

if($content !== false) {

	$soal = explode("[soal]", $content);
	array_shift($soal);
	foreach ($soal as $data) {
		$soal_val = '';
		$tipe_soal = 0;
		$jawaban_a = '';
		$jawaban_b = '';
		$jawaban_c = '';
		$jawaban_d = '';
		$jawaban_e = '';
		$jawaban_val = '';
		$bobot_val = '';

		$bobot = explode("[bobot]", $data);
		$bobot_val = $bobot[1];

		$jawaban = explode("[jawaban]", $bobot[0]);
		$jawaban_val = $jawaban[1];

		if (strpos($jawaban[0], '[==]') !== false) {
			$pilihan = explode("[==]", $jawaban[0]);

			$soal_val = $pilihan[0];
			$jawaban_a = $pilihan[1];
			$jawaban_b = $pilihan[2];
			$jawaban_c = $pilihan[3];
			$jawaban_d = $pilihan[4];
			$jawaban_e = $pilihan[5];
			$tipe_soal = 1;
		} else {
			$soal_val = $jawaban[0];
			$tipe_soal = 0;
		}

		echo 'soal = ' . $soal_val;
		echo '<br/>';
		echo 'tipe_soal = ' . $tipe_soal;
		echo '<br/>';
		echo 'jawaban_a = ' . $jawaban_a;
		echo '<br/>';
		echo 'jawaban_b = ' . $jawaban_b;
		echo '<br/>';
		echo 'jawaban_c = ' . $jawaban_c;
		echo '<br/>';
		echo 'jawaban_d = ' . $jawaban_d;
		echo '<br/>';
		echo 'jawaban_e = ' . $jawaban_e;
		echo '<br/>';
		echo 'jawaban = ' . $jawaban_val;
		echo '<br/>';
		echo 'bobot = ' . $bobot_val;
		echo '<br/>';
		echo '====================================================================================================</br>';
	}
}
else {
	echo 'Couldn\'t the file. Please check that file.';
}
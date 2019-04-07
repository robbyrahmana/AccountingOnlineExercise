<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('table'))
{
	function table($header = array()) {
		return 	'<table class="table table-bordered">'.
					table_header($header).
				'</table>';
	}
}

if ( ! function_exists('table_header'))
{
	function table_header($data = array()) {

		$content = '';

		foreach ($data as $value=>$width) {
			$w = '';
			if (isset($width)) {
				$w = 'style="width: '.$width.'px"';
			}
			$content .= '<th '.$w.'>'.$value.'</th>';
		}

		return 	'<tr>'.$content.'</tr>';
	}
}
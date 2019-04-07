<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('content_open'))
{
	function content_open($sub_title = '', $link = '') {
		$header = '';
		$action = '';

		if ($link && get_session_action()) {
			$action = '<div class="box-tools">'.
		                custom_button_link($link).
		              '</div>';
		}

		if ($sub_title) {
			$header = 	'<div class="box-header with-border">
						  <h3 class="box-title">'.$sub_title.'</h3>'.
						  $action.
						'</div>';
		}

		return 	'<div class="box box-primary">'.$header;
	}
}

if ( ! function_exists('content_close'))
{
	function content_close() {
		return 	'</div>';
	}
}
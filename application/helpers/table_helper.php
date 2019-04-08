<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('table_open'))
{
	/**
	 * table_open
	 *
	 * @return	string
	 */
	function table_open() {
		return 	'<table class="table table-bordered">';
	}
}

if ( ! function_exists('table_header'))
{
	/**
	 * table_header
	 *
	 * @param	mixed	$data (value=>width)
	 * @return	string
	 */
	function table_header($data = array()) {

		$content = '';

		foreach ($data as $value=>$width) {
			$content .= '<th style="width: '.$width.'px">'.$value.'</th>';
		}

		return 	'<thead><tr>'.$content.'</thead></tr>';
	}
}

if ( ! function_exists('table_close'))
{
	/**
	 * table_close
	 *
	 * @return	string
	 */
	function table_close() {
		return 	'</table>';
	}
}

if ( ! function_exists('table_action'))
{
	/**
	 * custom_form_action
	 *
	 * @param	string	$url
	 * @param	string	$id
	 * @param	boolean	$edit
	 * @param	boolean	$delete
	 * @return	string
	 */
	function table_action($url, $id, $edit = false, $delete = false)
	{
		$action = '';
		
		if ($edit) {
			$data = array('url'=>$url.'/update/'.$id,'type'=>'success','title'=>'<i class="fa fa-pencil"></i>');
			$action .= custom_button_link($data) . '&nbsp;&nbsp;';
		}

		if ($delete) {
			$data = array('url'=>$url.'/delete/'.$id,'type'=>'danger','title'=>'<i class="fa fa-remove"></i>');
			$action .= custom_button_link($data);
		}

		return get_session_action() ? '<td><div class="box-tools">'.
					$action.
				'</div></td>' : '';
	}
}

if ( ! function_exists('table_no_record'))
{
	/**
	 * table_no_record
	 *
	 * @param	number	$count
	 * @return	string
	 */
	function table_no_record($count) {
		return 	'<td colspan="'.$count.'"><center><i><small>tidak ada data<small></small></i></center></td>';
	}
}
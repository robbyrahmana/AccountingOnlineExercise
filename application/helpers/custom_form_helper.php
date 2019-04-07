<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('custom_form_open'))
{
	function custom_form_open($action = '') {
		return form_open($action);
	}
}

if ( ! function_exists('custom_form_close'))
{
	function custom_form_close()
	{
		return form_close();
	}
}

if ( ! function_exists('custom_form_error'))
{
	function custom_form_error($error = '')
	{
		$type = '';
		if (isset($_SESSION['error_code']) && $_SESSION['error_code'] == 0) {
			$type = 'success';
		} else {
			$type = 'danger';
		}
		$error_display = '';
		if ($error) {
			$error_display = '<p class="text-red"><div class="alert alert-'.$type.' alert-dismissible">'.$error.'</div></p>';
		}

		return $error_display;
	}
}

if ( ! function_exists('custom_form_input'))
{
	function custom_form_input($data = array(), $feedback_icon = '')
	{
		$defaults = array(
			'type' => 'text',
			'name' => '',
			'value' => '',
			'placeholder' => ''
		);

		$from_data = array_merge ($defaults, $data);

		$error = form_error($from_data['name'], '<span class="help-block">', '</span>');

		$error_display = '';
		if ($error) {
			$error_display = 'has-error';
		}

		$show_icon = '';
		if ($feedback_icon) {
			$show_icon = '<span class="glyphicon glyphicon-'.$feedback_icon.' form-control-feedback"></span>';
		}

		$extra = array(
			'class' => 'form-control',
			'placeholder' => $from_data['placeholder']
		);

		$form = form_input($from_data['name'], $from_data['value'], $extra);
		if ($from_data['type'] == 'text') {
			$form = form_input($from_data['name'], $from_data['value'], $extra);
		} else if ($from_data['type'] == 'password') {
			$form = form_password($from_data['name'], $from_data['value'], $extra);
		}

		return 	'<div class="form-group has-feedback '.$error_display.'">'.
					$form.$show_icon.$error.
				'</div>';
	}
}

if ( ! function_exists('custom_form_group'))
{
	function custom_form_group($label = '', $data = array(), $feedback_icon = '')
	{
		$defaults = array(
			'name' => 'defaults',
		);

		$from_data = array_merge ($defaults, $data);

		return 	'<div class="form-group">
                  <label for="'.$from_data['name'].'" class="col-sm-2 control-label">'.$label.'</label>'.
                  '<div class="col-sm-10">'.
                  	custom_form_input($data, $feedback_icon).
                  '</div>'.
                '</div>';
	}
}

if ( ! function_exists('custom_button_link'))
{
	function custom_button_link($data = array())
	{
		$defaults = array(
			'url' => '',
			'type' => 'primary',
			'title' => ''
		);

		$from_data = array_merge ($defaults, $data);

		return '<a href="'.$from_data['url'].'" type="button" class="btn btn-sm btn-flat btn-'.$from_data['type'].'">'.$from_data['title'].'</a>';
	}
}

if ( ! function_exists('custom_button_submit'))
{
	function custom_button_submit()
	{
		return '<button type="submit" class="btn btn-success btn-flat">Simpan</button>';
	}
}

if ( ! function_exists('custom_button_reset'))
{
	function custom_button_reset()
	{
		return '<button type="reset" class="btn btn-default btn-flat">Reset</button>';
	}
}

if ( ! function_exists('custom_form_action'))
{
	function custom_form_action($url, $reset = false, $back = false)
	{
		$link = array('title' => 'Kembali', 'url' => $url, 'type'=>'warning');

		$action = '';
		
		if ($back) {
			$action .= custom_button_link($link) . '&nbsp;&nbsp;';
		}

		if ($reset) {
			$action .= custom_button_reset() . '&nbsp;&nbsp;';
		}

		$action .= custom_button_submit();

		return get_session_action() ? '<div class="pull-right box-tools">'.
					$action.
				'</div>' : '';
	}
}
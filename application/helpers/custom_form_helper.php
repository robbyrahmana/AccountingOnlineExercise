<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('custom_form_open'))
{
	/**
	 * custom_form_open
	 *
	 * @param	string	$action
	 * @return	string
	 */
	function custom_form_open($action = '') {
		return form_open($action);
	}
}

if ( ! function_exists('custom_form_close'))
{
	/**
	 * custom_form_close
	 *
	 * @return	string
	 */
	function custom_form_close()
	{
		return form_close();
	}
}

if ( ! function_exists('custom_form_error'))
{
	/**
	 * custom_form_error
	 *
	 * @param	string	$error
	 * @return	string
	 */
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
	/**
	 * custom_form_input
	 *
	 * @param	mixed	$data (type, name, value, placeholder)
	 * @param	string	$feedback_icon
	 * @param	mixed	$extra_data
	 * @return	string
	 */
	function custom_form_input($data = array(), $feedback_icon = '', $extra_default = array())
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

		$extra_data = array_merge ($extra_default, $extra);

		$form = form_input($from_data['name'], $from_data['value'], $extra_data);
		if ($from_data['type'] == 'text') {
			$form = form_input($from_data['name'], $from_data['value'], $extra_data);
		} else if ($from_data['type'] == 'password') {
			$form = form_password($from_data['name'], $from_data['value'], $extra_data);
		} else if ($from_data['type'] == 'number') {
			$form = form_input($from_data, $from_data['value'], $extra_data);
		}

		return 	'<div class="form-group has-feedback '.$error_display.'">'.
					$form.$show_icon.$error.
				'</div>';
	}
}

if ( ! function_exists('custom_form_group_input'))
{
	/**
	 * custom_form_group_input
	 *
	 * @param	string	$label
	 * @param	mixed	$data (type, name, value, placeholder)
	 * @param	string	$feedback_icon
	 * @return	string
	 */
	function custom_form_group_input($label = '', $data = array(), $feedback_icon = '')
	{
		$defaults = array(
			'name' => 'defaults',
		);

		$from_data = array_merge ($defaults, $data);

		return 	'<div class="form-group">
                  <label for="'.$from_data['name'].'" class="col-sm-3 control-label">'.$label.'</label>'.
                  '<div class="col-sm-9">'.
                  	custom_form_input($data, $feedback_icon).
                  '</div>'.
                '</div>';
	}
}

if ( ! function_exists('custom_form_dropdown'))
{
	/**
	 * custom_form_dropdown
	 *
	 * @param	mixed	$data (name, selected, options(key=>val))
	 * @return	string
	 */
	function custom_form_dropdown($data = array())
	{

		$defaults = array(
			'name'=>'',
			'selected' => '',
			'options' => ''
		);

		$from_data = array_merge ($defaults, $data);

		$error = form_error($from_data['name'], '<span class="help-block">', '</span>');

		$error_display = '';
		if ($error) {
			$error_display = 'has-error';
		}

		$extra = array(
			'class' => 'form-control'
		);

		$form = form_dropdown($from_data, null, null, $extra);

		return 	'<div class="form-group has-feedback '.$error_display.'">'.
					$form.$error.
				'</div>';
	}
}

if ( ! function_exists('custom_form_group_dropdown'))
{
	/**
	 * custom_form_group_dropdown
	 *
	 * @param	string	$label
	 * @param	mixed	$data (name, selected, options(key=>val))
	 * @return	string
	 */
	function custom_form_group_dropdown($label = '', $data = array())
	{
		$defaults = array(
			'name' => 'defaults',
		);

		$from_data = array_merge ($defaults, $data);

		return 	'<div class="form-group">
                  <label for="'.$from_data['name'].'" class="col-sm-3 control-label">'.$label.'</label>'.
                  '<div class="col-sm-9">'.
                  	custom_form_dropdown($data).
                  '</div>'.
                '</div>';
	}
}

if ( ! function_exists('custom_form_date'))
{
	/**
	 * custom_form_dropdown
	 *
	 * @param	mixed	$data (name, selected, options(key=>val))
	 * @return	string
	 */
	function custom_form_date($data = array())
	{

		$defaults = array(
			'type' => 'text',
			'name' => '',
			'value' => '',
			'placeholder' => 'mm/dd/yyyy'
		);

		$from_data = array_merge ($defaults, $data);

		$date_script = 	'<script>
							$(function () {
								$("#'.$data['name'].'").datepicker({
									autoclose: true
								})
							});
						</script>';

		return 	custom_form_input($from_data, '', array('id'=>$data['name'], 'readonly'=>'true', 'style'=>'background:white')).$date_script;
	}
}

if ( ! function_exists('custom_form_group_date'))
{
	/**
	 * custom_form_group_dropdown
	 *
	 * @param	string	$label
	 * @param	mixed	$data (name, selected, options(key=>val))
	 * @return	string
	 */
	function custom_form_group_date($label = '', $data = array())
	{
		$defaults = array(
			'name' => 'defaults',
		);

		$from_data = array_merge ($defaults, $data);

		return 	'<div class="form-group">
                  <label for="'.$from_data['name'].'" class="col-sm-3 control-label">'.$label.'</label>'.
                  '<div class="col-sm-9">'.
                  	custom_form_date($data).
                  '</div>'.
                '</div>';
	}
}

if ( ! function_exists('custom_button_link'))
{
	/**
	 * custom_button_link
	 *
	 * @param	mixed	$data (url, type, title)
	 * @return	string
	 */
	function custom_button_link($data = array(), $size = 'btn-sm')
	{
		$defaults = array(
			'url' => '',
			'type' => 'primary',
			'title' => ''
		);

		$from_data = array_merge ($defaults, $data);

		return '<a href="'.$from_data['url'].'" type="button" class="btn '.$size.' btn-flat btn-'.$from_data['type'].'">'.$from_data['title'].'</a>';
	}
}

if ( ! function_exists('custom_button_submit'))
{
	/**
	 * custom_button_submit
	 *
	 * @return	string
	 */
	function custom_button_submit()
	{
		return '<button type="submit" class="btn btn-success btn-flat">Simpan</button>';
	}
}

if ( ! function_exists('custom_button_reset'))
{
	/**
	 * custom_button_reset
	 *
	 * @return	string
	 */
	function custom_button_reset()
	{
		return '<button type="reset" class="btn btn-default btn-flat">Reset</button>';
	}
}

if ( ! function_exists('custom_form_action'))
{
	/**
	 * custom_form_action
	 *
	 * @param	string	$url
	 * @param	boolean	$reset
	 * @param	boolean	$back
	 * @return	string
	 */
	function custom_form_action($url, $reset = false, $back = false)
	{
		$link = array('title' => 'Kembali', 'url' => $url, 'type'=>'warning');

		$action = '';
		
		if ($back) {
			$action .= custom_button_link($link, '') . '&nbsp;&nbsp;';
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('asset_url()'))
{
	function asset_url()
	{
		return base_url().'assets/';
	}
}

if ( ! function_exists('css_url()'))
{
	function css_url()
	{
		return base_url().'assets/css/';
	}
}

if ( ! function_exists('js_url()'))
{
	function js_url()
	{
		return base_url().'assets/js/';
	}
}

if ( ! function_exists('images_url()'))
{
	function images_url()
	{
		return base_url().'assets/images/';
	}
}

if ( ! function_exists('employees_url()'))
{
	function employees_url()
	{
		return base_url().'assets/uploads/employees/';
	}
}
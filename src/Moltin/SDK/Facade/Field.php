<?php

/**
* This file is part of Moltin PHP-SDK, a PHP package which
* provides convinient and rapid access to the API.
*
* Copyright (c) 2013-2014 Moltin Ltd.
* http://github.com/moltin/php-sdk
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
* @package moltin/php-sdk
* @author Jamie Holdroyd <jamie@molt.in>
* @copyright 2014 Moltin Ltd.
* @version dev
* @link http://github.com/moltin/php-sdk
*
*/

namespace Moltin\SDK\Facade;

class Field
{
	protected static $sdk;

	public static function init(\Moltin\SDK\SDK $sdk)
	{
		self::$sdk = $sdk;
	}

	public static function Get($slug)
	{
		return self::$sdk->get('flow/'.$slug);
	}

	public static function Create($flow, $data)
	{
		return self::$sdk->post('flow/'.$flow.'/field', $data);
	}

	public static function Update($flow, $slug, $data)
	{
		return self::$sdk->put('flow/'.$flow.'/field/'.$slug, $data);
	}

	public static function Fields($slug = null)
	{
		return self::$sdk->fields('flow', $slug);
	}

	public static function Types()
	{
		return self::$sdk->get('flows/types');
	}

	public static function Type($flow, $type)
	{
		return self::$sdk->fields('flow/'.$flow.'/types', $type, 'options', 'options');
	}

	public static function Options($flow, $slug)
	{
		return self::$sdk->fields('flow/'.$flow.'/fields', $slug, 'options', 'options');
	}

	public static function Delete($flow, $slug)
	{
		return self::$sdk->delete('flow/'.$flow.'/fields/'.$slug);
	}
}

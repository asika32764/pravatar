<?php
/**
 * Part of pavatar project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Pavatar\Helper;

/**
 * The Hasher class.
 *
 * @since  {DEPLOY_VERSION}
 */
class Hasher
{
	/**
	 * strToHex
	 *
	 * @param   string  $string
	 *
	 * @return  string
	 */
	public static function stringToHex($string)
	{
		$hex = '';

		for ($i = 0; $i < strlen($string); $i++)
		{
			$ord = ord($string[$i]);
			$hexCode = dechex($ord);
			$hex .= substr('0' . $hexCode, -2);
		}

		return strtoupper($hex);
	}

	/**
	 * hexToStr
	 *
	 * @param   string  $hex
	 *
	 * @return  string
	 */
	public static function hexToString($hex)
	{
		$string = '';

		for ($i = 0; $i < strlen($hex) - 1; $i += 2)
		{
			$string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
		}

		return $string;
	}
}

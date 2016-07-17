<?php
/**
 * Part of pavatar project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Pavatar\Image;

use Windwalker\Ioc;

/**
 * The PavatarHelper class.
 *
 * @since  {DEPLOY_VERSION}
 */
class PavatarHelper
{
	/**
	 * getResourcePath
	 *
	 * @param   int  $id
	 *
	 * @return  string
	 */
	public static function getImagePath($id)
	{
		return static::getResourceFolder() . '/' . $id . '.jpg';
	}

	/**
	 * getResourceFolder
	 *
	 * @return  string
	 */
	public static function getResourceFolder()
	{
		return WINDWALKER_RESOURCES . '/pavatar';
	}

	/**
	 * getImageUrl
	 *
	 * @param int $size
	 * @param int $id
	 *
	 * @return  string
	 */
	public static function getImageUrl($size = null, $id = null)
	{
		$size = (int) $size;
		$size = $size ? : 1000;
		$query = $id ? '?img=' . (int) $id : null;

		$uri = Ioc::getUriData();

		return $uri->host . $uri->path . '/' . $size . $query;
	}
}

<?php
/**
 * Part of pavatar project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Pavatar\Image;

use Lyrasoft\Unidev\Storage\AbstractStorageHelper;

/**
 * The PavatarUploadHelper class.
 *
 * @since  {DEPLOY_VERSION}
 */
class PavatarUploadHelper extends AbstractStorageHelper
{
	/**
	 * Get remote uri path.
	 *
	 * @param   mixed $identify The identify of this file or item.
	 *
	 * @return  string  Identify path.
	 */
	public static function getPath($identify)
	{
		return static::getBaseFolder() . md5($identify . ':pavatar') . '.jpg';
	}

	/**
	 * Get base folder name.
	 *
	 * @return  string
	 */
	public static function getBaseFolder()
	{
		return 'origin/';
	}
}

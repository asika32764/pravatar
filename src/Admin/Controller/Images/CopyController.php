<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Images;

use Phoenix\Controller\Batch\AbstractCopyController;
use Windwalker\Core\Controller\Traits\CsrfProtectionTrait;

/**
 * The CopyController class.
 *
 * @since  1.0
 */
class CopyController extends AbstractCopyController
{
	use CsrfProtectionTrait;
	
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'images';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'image';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'images';
}

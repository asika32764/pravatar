<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Images;

use Phoenix\Controller\Grid\AbstractFilterController;
use Windwalker\Core\Controller\Traits\CsrfProtectionTrait;

/**
 * The FilterController class.
 * 
 * @since  1.0
 */
class FilterController extends AbstractFilterController
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

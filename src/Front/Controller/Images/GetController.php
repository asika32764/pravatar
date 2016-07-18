<?php
/**
 * Part of Front project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Front\Controller\Images;

use Front\Model\ImagesModel;
use Front\View\Images\ImagesHtmlView;
use Phoenix\Controller\Display\ListDisplayController;
use Windwalker\Core\Model\ModelRepository;

/**
 * The GetController class.
 * 
 * @since  1.0
 */
class GetController extends ListDisplayController
{
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

	/**
	 * Property model.
	 *
	 * @var  ImagesModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  ImagesHtmlView
	 */
	protected $view;

	/**
	 * Property ordering.
	 *
	 * @var  string
	 */
	protected $defaultOrdering = 'image.id';

	/**
	 * Property direction.
	 *
	 * @var  string
	 */
	protected $defaultDirection = 'DESC';

	/**
	 * Property limit.
	 *
	 * @var  int
	 */
	protected $limit = 0;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();
	}

	/**
	 * prepareUserState
	 *
	 * @param   ModelRepository $model
	 *
	 * @return  void
	 */
	protected function prepareModelState(ModelRepository $model)
	{
		parent::prepareModelState($model);
	}

	/**
	 * postExecute
	 *
	 * @param mixed $result
	 *
	 * @return  mixed
	 */
	protected function postExecute($result = null)
	{
		return parent::postExecute($result);
	}
}

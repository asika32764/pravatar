<?php
/**
 * Part of Front project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Front\Controller\Home;

use Front\Model\HomeModel;
use Front\View\Home\HomeHtmlView;
use Phoenix\Controller\Display\DisplayController;
use Windwalker\Core\Model\ModelRepository;

/**
 * The GetController class.
 * 
 * @since  1.0
 */
class GetController extends DisplayController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'home';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'home';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'homes';

	/**
	 * Property model.
	 *
	 * @var  HomeModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  HomeHtmlView
	 */
	protected $view;

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
	protected function prepareUserState(ModelRepository $model)
	{
		parent::prepareUserState($model);
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

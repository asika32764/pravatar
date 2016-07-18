<?php
/**
 * Part of Front project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Front\View\Home;

use Phoenix\View\AbstractPhoenixHtmView;

/**
 * The HomeHtmlView class.
 * 
 * @since  1.0
 */
class HomeHtmlView extends AbstractPhoenixHtmView
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'home';

	/**
	 * prepareData
	 *
	 * @param \Windwalker\Data\Data $data
	 *
	 * @return  void
	 */
	protected function prepareData($data)
	{
		parent::prepareData($data);

		$data->images = $this->model->getImages();
	}

	/**
	 * setTitle
	 *
	 * @param string $title
	 *
	 * @return  static
	 */
	public function setTitle($title = null)
	{
		return parent::setTitle($title);
	}
}

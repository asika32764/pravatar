<?php
/**
 * Part of Front project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Front\Model;

use Front\Mapper\HomeMapper;
use Phoenix\Model\ItemModel;
use Windwalker\Core\Model\DatabaseModel;
use Windwalker\Core\Model\DatabaseModelRepository;
use Windwalker\Core\Model\ModelRepository;
use Windwalker\Data\Data;
use Windwalker\Data\DataSet;

/**
 * The HomeModel class.
 * 
 * @since  1.0
 */
class HomeModel extends DatabaseModelRepository
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'home';

	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = 'images';

	/**
	 * getImages
	 *
	 * @return  mixed|DataSet
	 */
	public function getImages()
	{
		return $this->getDataMapper()
			->order('RAND()')
			->limit(12)
			->find(['state' => 1]);
	}
}

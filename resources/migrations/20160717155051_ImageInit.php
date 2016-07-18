<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Admin\Table\Table;
use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;
use Windwalker\Database\Schema\Key;
use Windwalker\Database\Schema\Schema;

/**
 * Migration class of ImageInit.
 */
class ImageInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->createTable(Table::IMAGES, function(Schema $schema)
		{
			$schema->primary('id')->comment('Primary Key');
			$schema->tinyint('state')->signed(true)->comment('0: unpublished, 1:published');
			$schema->varchar('source')->comment('The source.');
		});
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->drop(Table::IMAGES);
	}
}

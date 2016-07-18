<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Form\Image;

use Admin\Field\Image\ImageListField;
use Admin\Field\Image\ImageModalField;
use Lyrasoft\Unidev\Field\SingleImageDragField;
use Phoenix\Form\PhoenixFieldTrait;
use Windwalker\Core\Form\AbstractFieldDefinition;
use Windwalker\Core\Language\Translator;
use Windwalker\Form\Field;
use Windwalker\Form\Form;
use Windwalker\Validator\Rule;

/**
 * The ImageEditDefinition class.
 *
 * @since  1.0
 */
class EditDefinition extends AbstractFieldDefinition
{
	use PhoenixFieldTrait;

	/**
	 * Define the form fields.
	 *
	 * @param Form $form The Windwalker form object.
	 *
	 * @return  void
	 */
	public function doDefine(Form $form)
	{
		// Basic fieldset
		$this->fieldset('basic', function(Form $form)
		{
			// ID
			$this->text('id')->label('ID')
				->readonly();

			// URL
			$this->add('url', new SingleImageDragField)
				->label(Translator::translate('admin.image.field.url'))
				->set('width', 250)
				->set('height', 250)
				->set('export_zoom', 4);

			// Source
			$this->text('source')
				->label('Source');

			// State
			$this->radio('state')
				->label('State')
				->setClass('btn-group')
				->option('Published', 1)
				->option('Unpublished', 0);
		});
	}
}

<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Image;

use Admin\Model\ImageModel;
use Admin\View\Image\ImageHtmlView;
use Gregwar\Image\Image;
use Lyrasoft\Unidev\Field\SingleImageDragField;
use Lyrasoft\Unidev\Image\Base64Image;
use Muse\Filesystem\File;
use Pavatar\Image\PavatarHelper;
use Pavatar\Image\PavatarUploadHelper;
use Phoenix\Controller\AbstractSaveController;
use Windwalker\Core\Controller\Traits\CsrfProtectionTrait;
use Windwalker\Data\Data;

/**
 * The SaveController class.
 * 
 * @since  1.0
 */
class SaveController extends AbstractSaveController
{
	use CsrfProtectionTrait;
	
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'image';

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
	 * Property formControl.
	 *
	 * @var  string
	 */
	protected $formControl = 'item';

	/**
	 * Property model.
	 *
	 * @var  ImageModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  ImageHtmlView
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
	 * preSave
	 *
	 * @param Data $data
	 *
	 * @return void
	 */
	protected function preSave(Data $data)
	{
		parent::preSave($data);
	}

	/**
	 * postSave
	 *
	 * @param Data $data
	 *
	 * @return  void
	 */
	protected function postSave(Data $data)
	{
		parent::postSave($data);

		$base64 = $this->input->post->getRaw('input-item-url-data');
		$delete = $this->input->post->get('input-item-url-delete-image');

		if ($base64)
		{
			Base64Image::toFile($base64, PavatarHelper::getImagePath($data->id));
		}

		if ($delete)
		{
			File::delete(PavatarHelper::getImagePath($data->id));
		}

		$data->url = PavatarHelper::getImageUrl(1000, $data->id);

		$this->model->save($data);
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

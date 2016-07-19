<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later. see LICENSE
 */

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Windwalker\Http\Helper\ServerHelper;
use Windwalker\Http\HttpClient;
use Windwalker\Http\WebHttpServer;
use Windwalker\IO\Input;

$root = __DIR__ . '/..';

if (!is_file($root . '/vendor/autoload.php'))
{
	exit('Please run `composer install` First.');
}

include_once $root . '/vendor/autoload.php';
include_once $root . '/etc/define.php';

class Application
{
	/**
	 * Property server.
	 *
	 * @var WebHttpServer
	 */
	protected $server;

	/**
	 * Application constructor.
	 */
	public function __construct()
	{
		$this->server = WebHttpServer::createFromGlobals([$this, 'doExecute']);
	}

	/**
	 * execute
	 *
	 * @return  void
	 */
	public function execute()
	{
		$this->server->listen();
	}

	/**
	 * execute
	 *
	 * @param ServerRequestInterface $request
	 * @param ResponseInterface      $response
	 * @param callable|null          $error
	 *
	 * @return  ResponseInterface
	 */
	public function doExecute(ServerRequestInterface $request, ResponseInterface $response, callable $error = null)
	{
		$this->analytics();

		$route = $this->server->uri->route;
		$route = explode('/', $route)[0];

		$query = $request->getQueryParams();
		$input = new Input($query);
		$img = $input->getInt('img');
		$u = $input->getString('u');

		// Img ID provided
		if ($img)
		{
			$file = \Pavatar\Image\PavatarHelper::getImagePath($img);

			$this->server->cachable(WebHttpServer::CACHE_ENABLE);
		}
		// Unique ID
		elseif ($u)
		{
			$files = glob(\Pavatar\Image\PavatarHelper::getResourceFolder() . '/*.jpg');
			$total = count($files);

			$u = abs(crc32($u));
			$id = (int) gmp_strval(gmp_mod($u, $total)) + 1;

			$file = \Pavatar\Image\PavatarHelper::getImagePath($id);

			$this->server->cachable(WebHttpServer::CACHE_ENABLE);
		}
		// Random Images
		else
		{
			$files = glob(\Pavatar\Image\PavatarHelper::getResourceFolder() . '/*.jpg');

			$file = $files[rand(0, count($files) - 1)];

			$this->server->cachable(WebHttpServer::CACHE_DISABLE);
		}

		if (!is_file($file))
		{
			return $response->withStatus(404);
		}

		// Get image source
		$image = file_get_contents($file);

		// Resize
		$size = $route ? $route : 1000;

		if ($size > 1000)
		{
			$size = 1000;
		}

		if ($size < 1000)
		{
			$image = \Gregwar\Image\Image::fromData($image);
			$image->cropResize($size, $size);
			$image = $image->get();
		}

		// Respond
		$response->getBody()->write($image);
		$response = $response->withHeader('content-type', 'image/jpeg')
			->withStatus(200);

		return $response;
	}

	/**
	 * analytics
	 *
	 * @return  ResponseInterface
	 */
	protected function analytics()
	{
		$data = [
			'v' => 1,
			'tid' => 'UA-48372917-7',
			't' => 'pageview',
			'dp' => ServerHelper::getValue($this->server->getRequest()->getServerParams(), 'REQUEST_URI'),
			'dh' => $this->server->getRequest()->getUri()->getHost(),
		];

		$http = new HttpClient;
		
		$r = $http->post('https://www.google-analytics.com/collect', $data);
		
		show($r);exit(' @Checkpoint');
	}
}

(new Application)->execute();

<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later. see LICENSE
 */

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$root = __DIR__ . '/..';

if (!is_file($root . '/vendor/autoload.php'))
{
	exit('Please run `composer install` First.');
}

include_once $root . '/vendor/autoload.php';
include_once $root . '/etc/define.php';

$server = \Windwalker\Http\WebHttpServer::createFromGlobals('empty');

$server->cachable($server::CACHE_ENABLE);

$server->setHandler(function (ServerRequestInterface $request,
	ResponseInterface $response, callable $error = null) use ($server)
{
	$route = $server->uri->route;
	$route = explode('/', $route)[0];

	$query = $request->getQueryParams();
	$img = isset($query['img']) ? $query['img'] : null;

	if ($img)
	{
		$file = \Pavatar\Image\PavatarHelper::getImagePath($img);
	}

	else
	{
		$files = glob(\Pavatar\Image\PavatarHelper::getResourceFolder() . '/*.jpg');
		
		$file = $files[rand(0, count($files) - 1)];
	}

	if (!is_file($file))
	{
		return $response->withStatus(404);
	}

	$image = file_get_contents($file);

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

	$response->getBody()->write($image);
	$response = $response->withHeader('content-type', 'image/jpeg')
		->withStatus(200);

	$server->cachable($server::CACHE_DISABLE);

	return $response;
});

$server->listen();

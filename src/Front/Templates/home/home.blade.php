{{-- Part of Front project. --}}
<?php
/**
 * Global variables
 * --------------------------------------------------------------
 * @var $app      \Windwalker\Web\Application                 Global Application
 * @var $package  \Front\FrontPackage                   Package object.
 * @var $view     \Windwalker\Data\Data                       Some information of this view.
 * @var $uri      \Windwalker\Uri\UriData               Uri information, example: $uri->path
 * @var $datetime \DateTime                                   PHP DateTime object of current time.
 * @var $helper   \Windwalker\Core\View\Helper\Set\HelperSet  The Windwalker HelperSet object.
 * @var $router   \Windwalker\Core\Router\PackageRouter       Router object.
 */
?>

@extends('_global.html')

@section('content')
<div class="container home-item">
    <div id="image-banner">
        @foreach ($images as $image)
            <div class="img-box">
                <img src="{{ \Pavatar\Image\PavatarHelper::getImageUrl(100, $image->id) }}" alt="Avatar">
            </div>
        @endforeach

    </div>

    {{-- Add your content --}}
</div>
@stop

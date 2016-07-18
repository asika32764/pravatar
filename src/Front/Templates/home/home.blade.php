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
    <style>
        #usage pre code {
            font-size: 150%;
            line-height: 175%;
        }
    </style>
<div class="container home-item">
    <div id="image-banner" style="margin-top: 50px">
        @foreach ($images as $image)
            <div class="img-box pull-left" style="margin-right: 15px; margin-bottom: 15px;">
                <img height="150" width="150" src="{{ \Pavatar\Image\PavatarHelper::getImageUrl(150, $image->id) }}" alt="Avatar">
            </div>
        @endforeach

        <div style="clear: both;"></div>
    </div>

    <hr />

    <section id="usage">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">Random Avatar</h2>
                <pre><code>http://{{ $host }}/<strong>{size}</strong></code></pre>
                <h4 class="text-center">Example <a href="http://{{ $host }}/300">See</a></h4>
                <pre><code>http://{{ $host }}/300</code></pre>
                <blockquote>
                    Max size is <code>1000</code>
                </blockquote>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">Direct Image ID</h2>
                <pre><code>http://{{ $host }}/150<strong>?img=3</strong></code></pre>
                <p>
                    See all <a href="@route('images')">Images</a>
                </p>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">Unique ID</h2>
                <pre><code>http://{{ $host }}/150<strong>?u=123</strong><br>http://{{ $host }}/150<strong>?u=a042581f4e29026704d</strong></code></pre>
                <blockquote>
                    Add a hash then always get same image
                </blockquote>
            </div>
        </div>
    </section>

    {{-- Add your content --}}
</div>
@stop

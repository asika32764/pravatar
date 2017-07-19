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

        .twitter-tweet-button {
            position: relative !important;
            top: 5px !important;
        }

        #patreon-button {
            margin-bottom: -6px;
        }
    </style>
<div class="container home-item">
    <div id="image-banner" class="text-center" style="margin-top: 50px">
        @foreach ($images as $image)
            <div class="img-box" style="margin-right: 15px; margin-bottom: 15px; display: inline-block;">
                <img height="150" width="150" src="{{ \Pavatar\Image\PavatarHelper::getImageUrl(150, $image->id) }}" alt="Avatar">
            </div>
        @endforeach

        <div style="clear: both;"></div>
    </div>

    <div id="share" class="text-center" style="margin-top: 45px">
        <div class="fb-share-button" data-href="http://pravatar.cc" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fpravatar.cc%2F&amp;src=sdkpreparse">Share</a></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        <iframe id="patreon-button" src="https://carlo.github.io/patreon-buttons/patreon-btn.html?creator=asika32764&amp;size=large"
            allowtransparency="true"
            frameborder="0"
            scrolling="0"
            width="110"
            height="30">
        </iframe>
    </div>

    <hr />

    <section id="usage">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">Random Avatar</h2>
                <pre><code>{{ $host }}/<strong>{size}</strong></code></pre>
                <h4 class="text-center">Example <a href="{{ $host }}/300" target="_blank">See</a></h4>
                <pre><code>{{ $host }}/300</code></pre>
                <blockquote>
                    Max size is <code>1000</code>
                </blockquote>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">Direct Image ID</h2>
                <pre><code>{{ $host }}/150<strong>?img=3</strong></code></pre>
                <p>
                    See all <a href="@route('images')">Images</a>
                </p>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">Unique ID</h2>
                <pre><code>{{ $host }}/150<strong>?u=fake@pravatar.com</strong><br>{{ $host }}/150<strong>?u=a042581f4e29026704d</strong></code></pre>
                <blockquote>
                    Add an identify then always get same image
                </blockquote>
            </div>
        </div>
    </section>

    {{-- Add your content --}}
</div>
@stop

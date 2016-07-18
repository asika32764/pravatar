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
 *
 * View variables
 * --------------------------------------------------------------
 * @var $state         \Windwalker\Registry\Registry
 * @var $items         \Windwalker\Data\DataSet|\Flower\Record\Traits\ImageDataTrait[]
 * @var $item          \Flower\Record\Traits\ImageDataTrait
 * @var $pagination    \Windwalker\Core\Pagination\Pagination
 */
?>

@extends('_global.html')

@section('content')
<div class="container image-item">
    <h1>Image List</h1>
    <div class="images-items">
        <div class="row">
        @foreach ($items as $i => $item)
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <img src="{{ \Pavatar\Image\PavatarHelper::getImageUrl(400, $item->id) }}" alt="Avatar">
                    <div class="caption">
                        <h3 class="pull-left">#{{ $item->id }}</h3>
                        <a href="{{ $item->source ? : 'javascript:void(0);' }}" target="_blank"
                            class="btn btn-default btn-sm pull-right" role="button"
                            style="margin-top: 17px"
                        >Source</a>
                        <div style="clear: both"></div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <hr />
    <div class="pagination">
        {!! $pagination->route('images', [])->render('images') !!}
    </div>
</div>
@stop

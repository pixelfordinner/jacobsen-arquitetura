<!doctype html>
<html class="feat--no-js<?php font_classes(); browser_features_classes(); ?>" <?php language_attributes(); ?>>
@include('layouts.partials.head')
    <body>
        <div id="content-wrapper" class="page-transition--fadein">
            @include('layouts.partials.header')
            @include('layouts.partials.menu')

            <main id="main" class="main" role="main">
@section('main')
            Default page content
@show
            </main>

            @include('layouts.partials.footer')
        </div>
        @include('layouts.partials.foot')
    </body>
</html>

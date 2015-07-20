<!doctype html>
<html class="feat--no-js<?php font_classes(); browser_features_classes(); ?>" <?php language_attributes(); ?>>
@include('layouts.partials.head')
    <body>
        @include('layouts.partials.header')

        <main class="main" role="main">
@section('main')
            Default page content
@show
        </main>

        @include('layouts.partials.footer')
        @include('layouts.partials.foot')
    </body>
</html>

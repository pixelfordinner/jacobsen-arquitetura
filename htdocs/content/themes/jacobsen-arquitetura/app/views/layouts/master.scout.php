<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
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

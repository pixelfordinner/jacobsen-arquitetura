@if (isset($header) && $header['display'] === true)
        <header class="header" role="banner">
            <?php Macro::symbol('jarquitetura-logo-type-collapsed', 'Jacobsen Arquitetura', array('logo__type--collapsed')); ?>

            <?php Macro::symbol('jarquitetura-logo-type-expanded', 'Jacobsen Arquitetura', array('logo__type--expanded')); ?>

        </header>
@endif

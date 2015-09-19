@if (isset($header) && $header['display'] === true)
        <header class="header" role="banner">
            {{ Macros::symbol('jarquitetura-logo-type-collapsed', 'Jacobsen Arquitetura Logo', array('logo__type--collapsed')) }}

            {{ Macros::symbol('jarquitetura-logo-type-expanded', 'Jacobsen Arquitetura Logo', array('logo__type--expanded')) }}

        </header>
@endif

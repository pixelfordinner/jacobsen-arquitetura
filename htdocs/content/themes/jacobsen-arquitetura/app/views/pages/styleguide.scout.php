@extends('layouts.master', ['header' => ['display' => true], 'footer' => ['logo' => true]])

@section('main')
            <div class="container">
                <div class="row row--padded">
                    <h1 class="heading--alpha">Styleguide</h1>
                </div>

                <div class="row row--padded">
                    <h2 class="heading--beta">Typography</h2>

                    <div class="text">
                        <p>Jacobsen Arquitetura uses two fonts: <a href="https://www.myfonts.com/fonts/emtype/geogrotesque/" target="_blank">Geogrotesque</a> and <a href="https://typekit.com/fonts/expo-serif-pro" target="_blank">Expo Serif Sans</a>.<br> Modular scales are used to setup heading and body text base sizes, along with being responsive to every screen size.<br> Vertical Rhythm along with baseline set on x-height are used to achieve maximum readability and clarity.<br> Lastly, font-kerning, ligatures are activated once the fonts are loaded.</p>
                    </div>
                </div>

                <div class="row row--padded">
                    <h2 class="heading--beta">Headings</h2>

                    <h1 class="heading--alpha">Header Level 1 (alpha)</h1>
                    <h2 class="heading--beta">Header Level 2 (beta)</h2>
                    <h3 class="heading--gamma">Header Level 3 (gamma)</h3>
                    <h4 class="heading--delta">Header Level 4 (delta)</h4>
                    <h5 class="heading--epsilon">Header Level 5 (epsilon)</h5>
                    <h6 class="heading--zeta">Header Level 6 (zeta)</h6>
                </div>

                <div class="row row--padded">
                    <h2 class="heading--beta">Body Text</h2>
                    <div class="text">
                        <p>Before they sold out ennui crucifix meditation PBR&amp;B. Scenester letterpress asymmetrical Marfa leggings, actually keytar McSweeney's heirloom Brooklyn chambray kitsch street art squid. Before they sold out ennui crucifix meditation PBR&amp;B. Scenester letterpress asymmetrical Marfa leggings, actually keytar McSweeney's heirloom Brooklyn chambray kitsch street art squid.</p>
                        <p>PBR polaroid leggings, jean shorts meggings fanny pack aesthetic skateboard meditation squid DIY. McSweeney's VHS flexitarian YOLO taxidermy heirloom small batch wolf jean shorts. Sartorial street art blog, Pitchfork seitan tilde Vice meggings aesthetic health goth 8-bit mixtape cardigan.</p>
                    </div>
                </div>

                <div class="row row--padded">
                    <h2 class="heading--beta">Buttons</h2>

                    <h3 class="heading--gamma">Normal</h3>

                    <button class="button">Presskit</button>
                    <a href="#" class="button uppercase">Presskit</a>
                    <a href="#" class="button uppercase">{{ Macro::symbol('symbols-download', 'Download', array('button__symbol')) }}Presskit</a>

                    <h3 class="heading--gamma">Small</h3>

                    <button class="button button--small">Presskit</button>
                    <a href="#" class="button button--small uppercase">Presskit</a>
                    <a href="#" class="button button--small uppercase">{{ Macro::symbol('symbols-download', 'Download', array('button__symbol')) }}Presskit</a>

                    <h3 class="heading--gamma">Filters</h3>
                    <button class="button button--small button--filter button--active uppercase">Residential</button>
                    <button class="button button--small button--filter uppercase">Commercial</button>
                    <button class="button button--small button--filter uppercase">Cultural</button>


                    <h3 class="heading--gamma">Menu</h3>

                    <button class="button menu-toggle uppercase">
                        <span class="button__symbol">
                            <span class="menu-toggle__symbol--left"></span>
                            <span class="menu-toggle__symbol--right"></span>
                        </span>Menu
                    </button>
                    <button class="button menu-toggle button--active menu-toggle--open uppercase">
                        <span class="button__symbol">
                            <span class="menu-toggle__symbol--left"></span>
                            <span class="menu-toggle__symbol--right"></span>
                        </span>Menu
                    </button>

                    <h3 class="heading--gamma">Groups</h3>

                    <div class="button__group" role="group" aria-label="Button group example">
                        <button class="button uppercase">FR</button>
                        <button class="button uppercase">EN</button>
                        <button class="button uppercase">PT</button>
                    </div>

                    <div class="button__group" role="group" aria-label="Button group example">
                        <button class="button uppercase">EN</button>
                        <button class="button uppercase">PT</button>
                    </div>

                    <br>

                    <div class="button__group" role="group" aria-label="Small button group example">
                        <button class="button button--small uppercase">FR</button>
                        <button class="button button--small uppercase">EN</button>
                        <button class="button button--small uppercase">PT</button>
                    </div>

                    <div class="button__group" role="group" aria-label="Small button group example">
                        <button class="button button--small uppercase">EN</button>
                        <button class="button button--small uppercase">PT</button>
                    </div>

                    <h3 class="heading--gamma">Groups with icons</h3>

                    <div class="button__group" role="group" aria-label="Button group with icons example">
                        <button class="button uppercase">{{ Macro::symbol('symbols-download', 'Language', array('button__symbol')) }}FR</button>
                        <button class="button uppercase">{{ Macro::symbol('symbols-download', 'Language', array('button__symbol')) }}EN</button>
                        <button class="button uppercase">{{ Macro::symbol('symbols-download', 'Language', array('button__symbol')) }}PT</button>
                    </div>

                    <br>

                    <div class="button__group" role="group" aria-label="Small button group with icons example">
                        <button class="button button--small uppercase">{{ Macro::symbol('symbols-marker', 'Language', array('button__symbol')) }}FR</button>
                        <button class="button button--small uppercase">{{ Macro::symbol('symbols-marker', 'Language', array('button__symbol')) }}EN</button>
                        <button class="button button--small uppercase">{{ Macro::symbol('symbols-marker', 'Language', array('button__symbol')) }}PT</button>
                    </div>
                </div>
            </div>
@overwrite

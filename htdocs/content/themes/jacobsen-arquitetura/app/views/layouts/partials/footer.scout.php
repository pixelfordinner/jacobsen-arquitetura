@if(!isset($footer['logo']) || !isset($footer['copyright']) || $footer['logo'] === true || $footer['copyright'] === true)
        <footer class="footer" role="contentinfo">
@if(isset($footer['logo']) && $footer['logo'] === true)

            {{ Macros::symbol('jarquitetura-logo-type-expanded', 'Jacobsen Arquitetura Logo', array('logo__type--expanded', 'footer-logo')) }}
@endif
@if(isset($footer['copyright']) && $footer['copyright'] === true)
            <div class="copyright">
                <p class="body--theta">copyright <?php echo date('Y') ?></p>
            </div>
@endif
        </footer>
@endif

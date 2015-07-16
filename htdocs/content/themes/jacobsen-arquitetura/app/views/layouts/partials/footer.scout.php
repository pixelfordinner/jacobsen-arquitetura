        <footer class="footer" role="contentinfo">
@if (isset($footer['logo']) && $footer['logo'] === true)

            <?php Macro::symbol('jarquitetura-logo-type-expanded', 'Jacobsen Arquitetura', array('logo__type--expanded')); ?>
@endif
            <div class="copyright">
                <p class="body--theta">copyright <?php echo date('Y') ?></p>
            </div>
        </footer>

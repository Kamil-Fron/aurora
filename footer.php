<footer id="colophon" class="site-footer">
    <div class="site-info">
        <div class="footer-content">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_id' => 'footer-menu',
            ));
            ?>
            <p class="copyright">
                © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                Wszelkie prawa zastrzeżone.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>

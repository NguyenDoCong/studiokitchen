<footer>
    <div class="top">
        <div class="footer-menu">
            <div class="main-menu poppins-semibold h6">
                <?php if (is_active_sidebar('main-menu')) {
                    dynamic_sidebar('main-menu');
                } ?>
            </div>
            <div class="second-menu poppins-semibold h6">
                <?php if (is_active_sidebar('second-menu')) {
                    dynamic_sidebar('second-menu');
                } ?>
            </div>
            <div class="empty">
            </div>
        </div>
        <div class="subscribe">
                <?php if (is_active_sidebar('subscribe')) {
                    dynamic_sidebar('subscribe');
                } ?>
            </div>
            <div class="follow">
                <?php if (is_active_sidebar('follow')) {
                    dynamic_sidebar('follow');
                } ?>
            </div>
    </div>

    <div class="bottom">
        <figure class="logo">
            <img src="<?php echo esc_url(get_parent_theme_file_uri('./assets/images/logo.png')); ?>" alt="" />
        </figure>
        <p>© 2022 StudioKitchen. All rights reserved.</p>
    </div>

</footer>
<?php wp_footer(); ?>
</body>

</html>
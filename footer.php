<?php $container = get_theme_mod('understrap_container_type'); ?>

<div class="wrapper" id="wrapper-footer">
    <div class="<?php echo esc_attr($container); ?>">
        <footer class="site-footer" id="colophon">
            <div class="row">
                <div class="col-sm-5 order-sm-2 col-md-7 col-lg-8">
                    <?php wp_nav_menu(array(
                        'theme_location'  => 'footer',
                        'menu_class'      => 'navbar-nav',
                        'menu_id'         => 'footer-menu',
                        "depth"           => 2
                    )); ?>
                </div>
                <div class="col-sm-7 col-md-5 col-lg-4">
                    <a class="title" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
                        <img class="logo" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/logo.png" alt="College Park Church" />
                        <h2>College Park<br /><span class="light">Church</span></h2>
                    </a>
                    <div class="info">
                        <p>
                            <strong>Every Sunday</strong><br />
                            9 am & 10:30 am
                        </p>
                        <p>
                            <a href="https://goo.gl/maps/xZGMzXRckbo" target="_blank">1945 COLLEGE AVE. HUNTINGTON, IN 46750</a><br />
                            <a href="mailto:office@cpubchurch.com">office@cpubchurch.com</a><br />
                            <a href="tel:260-356-2642">(260) 356-2642</a>
                        </p>
                        <p class="social">
                            <a href="https://www.facebook.com/cpubchurch" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/cpubchurch" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://www.youtube.com/c/CollegeParkUnitedBrethrenChurch" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/cpubchurch" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </p>
                        &copy;<?php echo date("Y"); ?> College Park Church - All Rights Reserved
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</div>
<?php wp_footer(); ?>
</body>

</html>
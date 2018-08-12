            <?php
                $the_theme = wp_get_theme();
                $container = get_theme_mod( 'understrap_container_type' );
            ?>

            <?php get_sidebar( 'footerfull' ); ?>

            <div class="wrapper" id="wrapper-footer">
                <div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <footer class="site-footer" id="colophon">
                                <div class="site-info">
                                    1945 College Ave., Huntington, IN 46750 <span class="pipe">|</span> (260) 356-2642 <span class="pipe">|</span> <a href="https://goo.gl/maps/xZGMzXRckbo" target="_blank">Map &amp; Directions</a>
                                    <br />
                                    <?php echo date("Y"); ?> &copy; College Park Church - All Rights Reserved
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>

            <?php
            $the_theme = wp_get_theme();
            $container = get_theme_mod('understrap_container_type');
            ?>

            <div class="wrapper" id="wrapper-footer">
                <div class="<?php echo esc_attr($container); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <footer class="site-footer" id="colophon">
                                <div class="social ml-lg-2 mr-3">
                                    <a href="https://www.facebook.com/cpubchurch" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="https://twitter.com/cpubchurch" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="<?php echo esc_url(home_url('newsletters')); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                </div>
                                <div class="site-info">
                                    1945 College Ave., Huntington, IN 46750 <span class="pipe">|</span> (260)&nbsp;356&#8209;2642 <span class="pipe">|</span> <a href="https://goo.gl/maps/xZGMzXRckbo" target="_blank">Map&nbsp;&amp;&nbsp;Directions</a>
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
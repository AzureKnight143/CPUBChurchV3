<?php
$latest_sermon_args = array( 
    'numberposts' => '1',
    'post_status' => 'publish', 
    'meta_key' => '_thumbnail_id',
    'category_name' => 'sermons');
$latest_sermon = wp_get_recent_posts( $latest_sermon_args )[0];
wp_reset_query();
    
$recent_posts_args = array( 
    'numberposts' => '4',
    'post_status' => 'publish');
$recent_posts = wp_get_recent_posts( $recent_posts_args );

$container = get_theme_mod( 'understrap_container_type' );
get_header();
?>

<div class="wrapper" id="home-wrapper">
    <main class="site-main" id="main">
        <div class="<?php echo esc_attr( $container ); ?>">
            <h1>Connect with <span class="script">God</span></h1>
        </div>
        <div class="<?php echo esc_attr( $container ); ?> content">
            <div class="row">
                <div class="col-md mb-4 mb-md-0">
                    <h2>Weekly Worship Schedule</h2>
                    <h6>Sundays</h6>
                    8:30 AM Worship Service<br />
                    9:45 AM Sunday School<br />
                    11:00 AM Contemporary Worship Service<br />
                    6:06 PM CP Youth
                </div>  
                <div class="col-md">
                    <?php if (has_post_thumbnail( $latest_sermon["ID"] ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $latest_sermon["ID"] ), 'single-post-thumbnail' ); ?>
                        <a href="<?php echo get_permalink($latest_sermon["ID"]); ?>">
                            <img src="<?php echo $image[0]; ?>" alt="<?php echo $latest_sermon["post_title"]; ?>" />
                        </a>
                    <?php endif; ?>
                    <a class="btn btn-primary btn-sm mt-3" href="<?php echo esc_url( home_url('category/sermons') ); ?>">Sermons</a>
                    <a class="btn btn-primary btn-sm mt-3" href="<?php echo esc_url( home_url('contact-us') ); ?>">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr( $container ); ?>">
            <h1>Connect with <span class="script">others</span></h1>
        </div>
        <div class="<?php echo esc_attr( $container ); ?> content others text-center">
            <div class="row">
                <div class="col">
                    <a href="<?php echo esc_url( home_url('adult-ministries') ); ?>">
                        <img src="<?php echo dirname( get_bloginfo('stylesheet_url')); ?>/images/cp-adults.png" alt="Adults" />
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo esc_url( home_url('student-ministries') ); ?>">
                        <img src="<?php echo dirname( get_bloginfo('stylesheet_url')); ?>/images/cp-youth.png" alt="Youth" /> 
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo esc_url( home_url('childrens-ministries') ); ?>">
                        <img src="<?php echo dirname( get_bloginfo('stylesheet_url')); ?>/images/cp-children.png" alt="Children" />
                    </a>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr( $container ); ?>">
            <h1>Connect with <span class="script">ministry</span></h1>
        </div>
        <div class="<?php echo esc_attr( $container ); ?> content">
            <div class="row">
                <div class="col-md mb-4 mb-md-0">
                    <a href="<?php echo esc_url( home_url('get-involved') ); ?>">
                        <img src="<?php echo dirname( get_bloginfo('stylesheet_url')); ?>/images/get-involved.png" alt="Get Involved" /> 
                    </a>                  
                </div>
                <div class="col-md">
                    <a href="<?php echo esc_url( home_url('care-ministries') ); ?>">
                        <img src="<?php echo dirname( get_bloginfo('stylesheet_url')); ?>/images/request-support.png" alt="Request Support" />
                    </a>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr( $container ); ?>">
            <h1>Connect with <span class="script">the world</span></h1>
        </div>
        <div class="<?php echo esc_attr( $container ); ?> content">
            <div class="row">
                <div class="col-md mb-4 mb-md-0">
                    <h2>Impact the World for Christ</h2>
                    <a href="<?php echo esc_url( home_url('missions') ); ?>">
                        <img src="<?php echo dirname( get_bloginfo('stylesheet_url')); ?>/images/missions.png" alt="Missions" />
                    </a>
                </div>
                <div class="col-md">
                    <h2>News from College Park</h2>
                    <dl>
                    <?php foreach( $recent_posts as $recent ) { ?>
                        <dd><a href="<?php echo get_permalink($recent["ID"]); ?>"><?php echo $recent["post_title"]; ?></a></dd>
                    <?php } ?>
                    </dl>
                    <a class="btn btn-primary btn-sm" href="<?php echo esc_url( home_url('category/news') ); ?>">View More</a>
                    <a class="btn btn-primary btn-sm" href="<?php echo esc_url( home_url('calendar') ); ?>">Upcoming Events</a>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
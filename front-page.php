<?php
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="home-wrapper">
    <main class="site-main" id="main">
        <div class="<?php echo esc_attr( $container ); ?>">
            <h1>Connect with <span class="script">God</span></h1>
        </div>
        <div class="<?php echo esc_attr( $container ); ?> content">
            <div class="row">
                <div class="col-sm">
                    <h2>Weekly Worship Schedule</h2>
                    <h6>Sundays</h6>
                    8:30 AM Worship Service<br />
                    9:45 AM Sunday School<br />
                    11:00 AM Contemporary Worship Service<br />
                    6:06 PM CP Youth
                </div>  
                <div class="col-sm">

                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr( $container ); ?>">
            <h1>Connect with <span class="script">others</span></h1>
        </div>
        <div class="<?php echo esc_attr( $container ); ?> content">
            <div class="row">
                <div class="col-sm">
                    <a href="<?php echo esc_url( home_url('adult-ministries') ); ?>">adults</a>
                </div>
                <div class="col-sm">
                    <a href="<?php echo esc_url( home_url('small-group-ministries') ); ?>">small groups</a>
                </div>
                <div class="col-sm">
                    <a href="<?php echo esc_url( home_url('student-ministries') ); ?>">youth</a>
                </div>
                <div class="col-sm">
                    <a href="<?php echo esc_url( home_url('childrens-ministries') ); ?>">children</a>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr( $container ); ?>">
            <h1>Connect with <span class="script">ministry</span></h1>
        </div>
        <div class="<?php echo esc_attr( $container ); ?> content">
            <div class="row">
                <div class="col-sm">
                    <a href="<?php echo esc_url( home_url('ministries') ); ?>">
                        <img src="<?php echo dirname( get_bloginfo('stylesheet_url')); ?>/images/get-involved.png" alt="Get Involved" /> 
                    </a>                  
                </div>
                <div class="col-sm">
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
                <div class="col-sm">
                    <h2>News from College Park</h2>
                </div>
                <div class="col-sm">
                    <h2>Impact the World for Christ</h2>
                    <a href="<?php echo esc_url( home_url('missions') ); ?>">Missions</a>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
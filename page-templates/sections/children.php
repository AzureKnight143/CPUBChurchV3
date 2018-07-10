<div class="row mt-4">
<?php
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC'
    );

$parent = new WP_Query( $args );

if ( $parent->have_posts() ) :                      
    while ( $parent->have_posts() ) : $parent->the_post();
?>
    <div class="col-lg-4 col-6">
        <div class="card mb-4">
            <a href="<?php esc_url( the_permalink() ) ?>">
                <?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'card-img-top' ) ); ?>
            </a>
            <div class="card-body">
                <a href="<?php esc_url( the_permalink() ) ?>">
                    <h5 class="card-title"><?php the_title() ?></h5>
                </a>
                <?php if (get_field('subtitle')) { ?>
                    <div class="card-text">
                        <?php the_field('subtitle'); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php        
    endwhile;
endif; 
wp_reset_postdata();
?>
</div>
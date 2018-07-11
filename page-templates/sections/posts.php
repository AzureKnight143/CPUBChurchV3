<?php
$categoryIdMeta = get_field('category');

if ($categoryIdMeta) :
    $categoryLink = get_category_link( $categoryIdMeta );

    $category_posts_args = array(
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'cat' => $categoryIdMeta);
    $category_posts = new WP_Query( $category_posts_args );
?>

    <?php if ( $category_posts->have_posts() ) : ?>
        <div class="page-posts">
            <h1>Latest News</h2>
            <?php
            while ( $category_posts->have_posts() ) : $category_posts->the_post();
                get_template_part( 'loop-templates/content', get_post_format() );
            endwhile;   
            wp_reset_postdata();
            ?>
            <a class="btn btn-outline-primary" href="<?php echo $categoryLink ?>">Read Older Posts</a>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php
$categoryMeta = get_post_meta( get_the_ID(), 'category', true );
$category = get_category_by_slug( $categoryMeta );
$categoryLink = get_category_link( $category->cat_ID );

$category_posts_args = array(
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'category_name' => $category->slug);
$category_posts = new WP_Query( $category_posts_args );

if ( $category_posts->have_posts() ) :
    while ( $category_posts->have_posts() ) : $category_posts->the_post();
        get_template_part( 'loop-templates/content', get_post_format() );
    endwhile;   
    wp_reset_postdata();
?>
    <a class="btn btn-outline-primary" href="<?php echo $categoryLink ?>">Read Older Posts</a>
<?php
else :
    get_template_part( 'loop-templates/content', 'none' );
endif;
?>
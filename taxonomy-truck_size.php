<?php
get_header();

$plows = [];

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

$args = array(
    'post_type' => 'plows',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'truck_size',
            'field'    => 'slug',
            'terms'    => array( $term->slug ),
        ),
    ),
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $p = get_post();
        $terms = get_the_terms( $p->ID, 'plow_categories' );
        $p->manufacturer = $terms[0]->name;
        $plows[] = $p;
    }
} 
wp_reset_postdata();

echo '<h1 class="text-center">'. $term->name .' Snow Plows</h1>';
echo '<ul class="text-center">';
foreach($plows as $currPlow) {
    $currPlowTitle = $currPlow->manufacturer . ' ' . $currPlow->post_title;
    $currPlowSlug = $currPlow->post_name;
    foreach($plows as $vsPlow) {
        $vsPlowTitle = $vsPlow->manufacturer . ' ' . $vsPlow->post_title;
        $vsPlowSlug = $vsPlow->post_name;
        if ($currPlowTitle !== $vsPlowTitle) { ?>
            <li>
                <a href="<?php echo site_url('/compare?plow[]=' . $currPlowSlug . '&plow[]=' . $vsPlowSlug); ?>">
                    <?php echo $currPlowTitle . ' vs ' . $vsPlowTitle; ?>
                </a>
            </li>
        <?php }
    }
}
echo '</ul>';

get_footer();
<?php
get_header();


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

echo spn_list_plow_comparisons($the_query);

get_footer();
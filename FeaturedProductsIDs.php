<?php
/**
 * Function that returns an array containing the IDs of the featured products.
 */
function woo_get_featured_product_ids() {
  // Load from cache
  $featured_product_ids = get_transient( 'wc_featured_products' );
 
  // Valid cache found
  if ( false !== $featured_product_ids )
    return $featured_product_ids;
 
  $featured = get_posts( array(
    'post_type'      => array( 'product', 'product_variation' ),
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_query' => array(
      array(
        'key'     => '_visibility',
        'value'   => array('catalog', 'visible'),
        'compare'   => 'IN'
      ),
      array(
        'key'   => '_featured',
        'value' => 'yes'
      )
    ),
    'fields' => 'id=>parent'
  ) );
 //return $featured;
  $product_ids = array_keys( $featured );
  $parent_ids  = array_values( $featured );
  $featured_product_ids = array_unique( array_merge( $product_ids, $parent_ids ) );
 
  set_transient( 'wc_featured_products', $featured_product_ids );
 
  return $featured_product_ids;
}
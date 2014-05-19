<!-- SudoCode
  //Make a feature parent category
  //etting all sub categories name
  geting its first two product
  //getting first category img
  //getting category link to show all products
  getting product links -->
<?php
// Defining Arguments
$catid = get_cat_id( "CatName" );
$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';
$empty        = 0;
$childof      = $catid;
// Using Defined Arguments
$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'hide_empty'   => $empty,
  'child_of'     =>  0
);
?>
<?php $all_categories = get_categories( $args ); ?>
<?php //var_dump($all_categories);
foreach ( $all_categories as $cat ) {
  //print_r($cat);
  if ( $cat->cat_name == "CatName" ) {
      $category_id = $cat->term_id;
      echo '<br /><a href="'. get_term_link( $cat->slug, 'product_cat' ) .'">'. $cat->name .'</a>'; 
      $args2 = array(
        'taxonomy'     => $taxonomy,
        'child_of'     => 0,
        'parent'       => $category_id,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
      );
      $sub_cats = get_categories( $args2 );
      if ( $sub_cats ) {
            foreach ( $sub_cats as $sub_category ) {
              var_dump( $sub_category );
              echo get_term_link( $sub_category);
              echo  "<h1>". $sub_category->name ."</h1>";
              $thumbnail_id = get_woocommerce_term_meta( $sub_category->term_id, 'thumbnail_id', true );
              $image = wp_get_attachment_url( $thumbnail_id );
              echo $image . "</br>";
              getCatNameProducts( $sub_category->name );
            } // End Forech

       }  //End Subcat if
    } // End Category if
}
?>

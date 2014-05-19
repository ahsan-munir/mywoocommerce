<?php
function getFeaturedProducts($productcategory){
    $args = array( 'post_type' => 'product', 'posts_per_page' => 2, 'product_cat' => $productcategory, 'meta_query' => array(
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
            );
    $loop = new WP_Query( $args ); ?>
    <ul class="featuredproducts">
    <?php 
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <li class="product">    
                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                        <?php the_title(); ?>
                    </a>
                    <?php //woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                </li>
    <?php endwhile; ?>
  </ul><!--/.products-->
<?php wp_reset_query(); } ?>

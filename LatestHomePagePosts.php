<div class="latestposts">
	<h2>Latest Blog</h2>
	<?php // Display blog posts on any page @ http://m0n.co/l
	$temp = $wp_query; $wp_query= null;
	$wp_query = new WP_Query(); $wp_query->query( 'showposts=2' );
	while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	<div <?php echo post_class( 'posts' ); ?>>
		<?php the_post_thumbnail( array( "305", "200" ) ); ?>
		<h3><?php the_title(); ?></h3>
		<div class="dateautor">
			<span class="date"><?php the_time( 'd,M Y' ); ?></span>
		<span class="author"><?php the_author(); ?></span></div>
		<div class="latestexerpt">	<?php remove_empty_p( the_excerpt() ); ?></div>
		<p >
		<a class="bluebtn" href="http://leanbodymd.com/blog/" title="Read more">Learn More</a>
		</p>
	</div>
	<?php endwhile; ?>
</div>
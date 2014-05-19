<?php 
  $page = get_page_by_title( "Page Nice Name" );
  //var_dump($page);
 $pagelink = get_page_link($page->ID);
?>
<div class="pagecontents">
	<h1 class="pagetitle"><?php echo $page->post_title; ?></h1>
	<p class="pagecontents"><?php echo $page->post_content; ?></p>
	<a href="<?php echo $pagelink; ?>">Read More</a>
</div>

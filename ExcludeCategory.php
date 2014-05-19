<?php 
function exclude_widget_categories($args){
$exclude = "1"; // The IDs of the excluding categories
$args["exclude"] = $exclude;
return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");
<?php 
function template_redirect(){
    if( is_page( 'page_slug' ) && ! is_user_logged_in() )
    {
        wp_redirect( home_url( '/pagenametoredirect/' ) );
        exit();
    }
    if( is_page( 'pagename' ) && is_user_logged_in() )
    {
        wp_redirect( home_url( '/pagenametoredirect/' ) );
        exit();
    }
}
add_action( 'template_redirect', 'template_redirect' );
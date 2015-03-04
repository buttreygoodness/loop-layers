<?php

/* Enqueue Child Theme Scripts & Styles */

add_action( 'wp_enqueue_scripts', 'layers_child_styles' ); 

if( ! function_exists( 'layers_child_styles' ) ) {
  function layers_child_styles(){
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('layers-style') );
  }
}


/* HOOKS */

/* ACTIONS */

/*
add_action( 'layers_after_logo', 'my_header_social_links');
 
function my_header_social_links() {
  echo "<div class=\"my-header-social-links\">More HTML Here</div>";
}
*/

add_action('layers_after_header_nav', 'mytheme_menu_search');

function mytheme_menu_search() {
 echo "<div class='loop-menu-search'>";
 get_search_form();
 echo "</div>";
}

/* FILTERS */

function loop_search_form( $form ) {
  $form = '<div class="loop-menu-search"><div class="search-form-reveal">Reveal</div><div class="form-proper">' . '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
  <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
  <input type="text" value="' . get_search_query() . '" name="s" id="s" />
  <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
  </div>
  </form></div></div>';

  return $form;
}

add_filter( 'get_search_form', 'loop_search_form' );
/****************************************************
 *
 *  Get the_title for posts (in the loop)
 *
 * *************************************************/

 // Method #1
<?php
echo '<h1><?php the_title(); ?></h1>';
?>

 // Method #2
<?php the_title( '<h1>' , '</h1>' ); ?>





/****************************************************
 *
 *  Show or Hide Items on the Admin Bar
 *  Remove elements from the left menu on the dashboard
 *  https://developer.wordpress.org/reference/functions/remove_menu_page/
 *
 * *************************************************/
<?php
function _themename_remove_options_menu(){
  // remove_menu_page( 'edit.php' );                   //Posts
  // remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'jetpack' );                    //Jetpack*
  // remove_menu_page( 'upload.php' );                 //Media
  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  // remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  // remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings

}
add_action( 'admin_menu', '_themename_remove_options_menu' );
?>


/****************************************************
 *
 * Sidebar Snippets
 * @documentation: https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * *************************************************/
<?php
    // in functions.php file
    // setup Widget Areas in Sidebar
    function _themename_widgets_init() {
        register_sidebar([
            'name'          => esc_html__( 'my main sidebar', '_themename' ),
            'id'            => 'my-main-sidebar',
            'description'   => esc_html__( 'Add widgets for the main sidebar here', '_themename' ),
            'class'         => 'my-main-sidebar',
            'before_widget' => '<section class="widget">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]);
    }
    add_action( 'widgets_init', '_themename_widgets_init' );

?>


<?php
    // front-end pages (sidebar.php or others)
    if (! is_active_sidebar( 'my-footer-sidebar' )) {
        return;
    }
?>
<div class="container">
    <?php dynamic_sidebar( 'my-footer-sidebar' ); ?>
</div>

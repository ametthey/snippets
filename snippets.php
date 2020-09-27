/*
* Sidebar snippets
* @documentation: https://developer.wordpress.org/reference/functions/register_sidebar/
*/

// functions.php or includes files
<?php
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


// front-end pages (sidebar.php or others)
<?php
    if (! is_active_sidebar( 'my-footer-sidebar' )) {
        return;
    }
?>
<div class="container">
    <?php dynamic_sidebar( 'my-footer-sidebar' ); ?>
</div>

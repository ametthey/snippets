/****************************************************
 *
 * Menu configuration
 *
 * *************************************************/

 <!-- in functions.php -->
<?php
register_nav_menus( array(
    'header-menu'   => esc_html__( 'Main menu', '_themename' )
) );
?>

<!-- in front-end pages (header.php, index.php) -->
<nav>
<?php
$args = [
    // Location pickable in Customizer
    'theme_location'    => 'header-menu',
    // Assigns a default menu to location
    'menu'              => 'Main menu',
    // Main wrapper around the ul of posts
    'container'         => 'div',
    'container_class'   => 'container-class',
    'container_id'      => 'container-id',
    // Wrapper for menu items - default to ul

];
wp_nav_menu( $args );
?>
</nav>

/****************************************************
*
*  Get the_title for posts (in the loop)
*
* *************************************************/

<!--  Method #1 -->
<?php
echo '<h1><?php the_title(); ?></h1>';
?>

<!--  Method #2 -->
<?php the_title( '<h1>' , '</h1>' ); ?>


/****************************************************
*
* Log out and redirect directly to the current page
*
* *************************************************/

<?php wp_loginout( get_permalink() ); ?>

/****************************************************
*
* Login form with arguemnts
*
* *************************************************/

<?php $args = [
    'label_username'    => 'Entrer votre identifiant',
    'label_password'    => 'Entrer votre mot de passe',
    'label_remember'    => 'Vous souvenir de vous ?'
];

wp_login_form( $args );
?>


/****************************************************
*
* If user is not logged in : display form
* if user logged in : !display form
*
* *************************************************/

<?php if ( !is_user_logged_in() ) : ?>
<?php wp_login_form(); ?>
<?php endif; ?>

/****************************************************
*
* URL that allow user to get new passord
*
* *************************************************/

<a href="<?php esc_url( wp_lostpassword_url() ); ?>">
    <?php esc_html_e( 'Lost password? ', '_themename' ); ?>
</a>


/****************************************************
*
* Display List Of Archive by parameters
* @info : display them by year and in descending order
*
* *************************************************/

<?php $args = [
    'type'  => 'yearly',
    'order' => 'DESC'
];
wp_get_archives( $args )
?>


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
* Add Theme Support
* @documentation: https://developer.wordpress.org/reference/functions/add_theme_support/
*
* *************************************************/

<?php
add_theme_support( 'title-tag' );
add_theme_support( '' );
add_theme_support( 'posts-format', ['aside', 'gallery', 'link', 'iamges', 'quote', 'status', 'video', 'audio', 'chat'] );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
// following are for customizer
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'starter-content' );
?>


/****************************************************
*
* Add image size
*
* *************************************************/

<?php
function _themename_image_configuration() {
    // add_image_size( 'nom', hauteur(chiffre), largeur(chiffre) );
    // add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', '_themename_image_configuration' );
?>

/****************************************************
*
* Sidebar Snippets
* @documentation: https://developer.wordpress.org/reference/functions/register_sidebar/
*
* *************************************************/

<!-- in functions.php file -->
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


<!-- front-end pages (sidebar.php or others) -->
<?php
if (! is_active_sidebar( 'my-footer-sidebar' )) {
    return;
}
?>
<div class="container">
    <?php dynamic_sidebar( 'my-footer-sidebar' ); ?>
</div>

/****************************************************
*
*          POSTS TAGS
*          works with post, page & cpt
*
* *************************************************/

<!-- Class Tags -->

<?php body_class(); ?>

<?php body_class( [ 'another-body-class', 'and-another-body-class' ] ); ?>

<?php post_class(); ?>

<?php post_class( [ 'another-class', 'and-another-class' ] )? ?>

<!-- Common Tags -->

<!-- this will be the ID of a post or a page -->
<?php the_ID(); ?>

<?php the_title(); ?>

<?php the_content(); ?>

/********************************************
* This will work if you activate the READ MORE
* funtionnality in the paragraph block
********************************************/
<?php the_content( 'Read More' ); ?>

<?php the_excerpt(); ?>

<?php the_category(); ?>

<?php the_tags(); ?>

<!-- Date Tags -->

<!-- Post Link Tags -->

<!-- Attachment Tags -->

<!-- Less Common Tags -->

<!-- get_the_ ... Tags -->

/****************************************************
*          POSTS THUMBNAIL
* *************************************************/

<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail( $size, $attr ); ?>
<?php endif; ?>

<?php
$attr = [
    'class'     => 'img-featured',
    'title'     => get_the_title()
];

the_post_thumbnail( 'full' , $attr );
?>

/****************************************************
*      AUTHOR META
* *************************************************/

<?php the_author_meta( 'display_name' ) ?>
<?php the_author_meta( 'display_name' , $post->post_author ) ?>
<?php the_author_meta( 'user_login' ); ?>
<?php the_author_meta( 'user_login' , $post->post_author ); ?>
<?php the_author_meta( 'user_pass' ); ?>
<?php the_author_meta( 'user_pass' , $post->post_author); ?>
<?php the_author_meta( 'user_nicename' ); ?>
<?php the_author_meta( 'user_nicename' , $post->post_author); ?>
<?php the_author_meta( 'user_email' ); ?>
<?php the_author_meta( 'user_email' , $post->post_author); ?>
<?php the_author_meta( 'user_url' ); ?>
<?php the_author_meta( 'user_url' , $post->post_author); ?>
<?php the_author_meta( 'display_name' ); ?>
<?php the_author_meta( 'display_name' , $post->post_author); ?>
<?php the_author_meta( 'nickname' ); ?>
<?php the_author_meta( 'nickname' , $post->post_author); ?>
<?php the_author_meta( 'first_name' ); ?>
<?php the_author_meta( 'first_name' , $post->post_author); ?>
<?php the_author_meta( 'last_name' ); ?>
<?php the_author_meta( 'last_name' , $post->post_author); ?>
<?php the_author_meta( 'description' ); ?>
<?php the_author_meta( 'description' , $post->post_author); ?>
<?php the_author_meta( 'user_level' ); ?>
<?php the_author_meta( 'user_level' , $post->post_author); ?>
<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
<?php echo get_edit_user_link( get_the_author_meta( 'ID' ) ); ?>

/****************************************************
*      CUSTOM REDIRECT ON CUSTOM CONDITION
*      Condition: if page is admin and
*      if user is logged in
* *************************************************/
<?php
function custom_redirects() {
    if ( is_page( 'admin' ) && !is_user_logged_in() ) {
        wp_redirect( home_url( '/wp-admin/' ) );
        die;
    }
}

?>

/************************************************************
* Custom copyright based on the year and the name of the site
*************************************************************/

<?php $footer_message = '&copy' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ); ?>

/************************************************************
* Display Taxonomy from a custom post type
* @documentation: https://developer.wordpress.org/reference/functions/get_the_terms/
*************************************************************/

<?php
$terms = get_the_terms( $post->ID , 'custom_project_type', array('number' => 3) );
foreach ( $terms as $term ) {
    echo '<span class="menu__project__item__category">'. $term->name . '</span> <span>-</span> ';
}
?>

/************************************************************
* Change time format to '1 Hour Ago' or '1 Week Ago'
* This is specific for post
* https://www.isitwp.com/convert-date-timestamp-time-ago-posts/
*************************************************************/

<?php
// Change type if needed
function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}
?>

<?php echo time_ago(); ?>

/************************************************************
* Exclude current post from WP_Query
* https://pineco.de/snippets/exclude-current-post-from-wp_query/
*************************************************************/

<?php
$args = {
'post_type'     => array( 'customPostTypeName' ),
    'post__not_in'  => array( get_the_ID() ),
}

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
// HTML template
endwhile;
endif;

wp_reset_postdata();
}



?>

/************************************************************
* Prev and Next buttons
* https://bryantwebdesign.com/code/wordpress-custom-post-type-navigation/
*************************************************************/
<div><?php previous_post_link( '%link', 'Previous' ) ?></div>
<div><?php next_post_link( '%link', 'Next' ) ?></div>

/************************************************************
* Echo out all the categories for debugging
* This can be used for other stuffs
*************************************************************/
<?php
$categories = get_categories();
print_r($categories);
?>

/**********************************************************************
 * Cela permet simplement de vérifier si WordPress est bien chargé,
 * en vérifiant si une de ses constantes est définie. Si quelqu’un
 * essaie d’accéder directement au fichier sans passer par WordPress,
 * on exécute die() et donc on arrête le script.
**********************************************************************/

<?php
defined( 'ABSPATH' ) || die();
?>

/**********************************************************************
* Disable Admin bar for every type of users except admin
**********************************************************************/
<?php
function _themename_remove_admin_bar_for_everyone() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', '_themename_remove_admin_bar_for_everyone');
?>

/**********************************************************************
 * R_Debug
**********************************************************************/

<!-- list_cron et ceux du dessus-->


<!-- List hooks as currently defined -->
<?php R_Debug::list_hooks( $filter ); ?>

<!-- Output hook info -->
<?php R_Debug::dump_hook( $tag, $hook ); ?>

<!-- Enable live listing of hooks as they run -->
<?php R_Debug::list_live_hooks("content"); ?>

<?php R_Debug::list_hook_details("input"); ?>
<?php R_Debug::list_plugins(); ?>
<?php R_Debug::list_post("postID"); ?>
<?php R_Debug::list_queries(); ?>
<?php R_Debug::explain_query("query"; ?>

/**********************************************************************
 * All Post Status
**********************************************************************/

* 'publish' - a published post or page
* 'pending' - post is pending review
* 'draft' - a post in draft status
* 'auto-draft' - a newly created post, with no content
* 'future' - a post to publish in the future
* 'private' - not visible to users who are not logged in
* 'inherit' - a revision. see get_children.
* 'trash' - post is in trashbin. added with Version 2.9


/**********************************************************************
 * Links
**********************************************************************/

<?php
get_permalink( get_page_by_path( 'contact' ) );
get_permalink( get_page_by_title( 'Contact' ) )
?>


/**********************************************************************
 * Function pour affiché tout les hooks sur un certain hook
**********************************************************************/
<?php

add_filter( 'the_content', 'wpcookbook_content' );
/**
* Lists every function hooked on the current hook (the_content) *
* @param string $content Content of the post.
*/
function wpcookbook_content( $content ){
    global $wp_filter;
    $html = '<pre>' . print_r( $wp_filter['mon_hook'], true ) . '</pre>';
    return $content . $html;
}
?>

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

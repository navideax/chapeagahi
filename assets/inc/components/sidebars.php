<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
    //home sidebars
    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => 'Home left sidebar',
        'id'            => 'home_left',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    //page sidebars
    register_sidebar( array(
        'name'          => 'page right sidebar',
        'id'            => 'page_right',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => 'page left sidebar',
        'id'            => 'page_left',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    //post sidebars
    register_sidebar( array(
        'name'          => 'post right sidebar',
        'id'            => 'post_right',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => 'post left sidebar',
        'id'            => 'post_left',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    //category sidebars
    register_sidebar( array(
        'name'          => 'category right sidebar',
        'id'            => 'category_right',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => 'category left sidebar',
        'id'            => 'category_left',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    //search sidebars
    register_sidebar( array(
        'name'          => 'category right sidebar',
        'id'            => 'category_right',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => 'search left sidebar',
        'id'            => 'search_left',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    //tag sidebars
    register_sidebar( array(
        'name'          => 'tag right sidebar',
        'id'            => 'tag_right',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => 'tag left sidebar',
        'id'            => 'tag_left',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    //archive sidebars
    register_sidebar( array(
        'name'          => 'archive right sidebar',
        'id'            => 'archive_right',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => 'archive left sidebar',
        'id'            => 'archive_left.php',
        'before_widget' => '<div class="side-box"><div class="side-item">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="side-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
?>
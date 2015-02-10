<?php 

if( !isset($content_width)){
    $content_width = 600;
}

function my_scripts(){
    if(is_single()){
        wp_enqueue_script('comment-reply');
    }
}
function my_length($length){
    return 200;
}

function my_more($more) {
    return "…";
}

add_action('wp_enqueue_scripts', 'my_scripts');

add_filter('excerpt_mblength', 'my_length');
add_filter('excerpt_more', 'my_more');

add_theme_support('post-thumbnails');
set_post_thumbnail_size(250,180, true);

register_sidebar( array(
    'id' => 'column01',
    'name' => 'footer-column01',
    'description' => '1段目に表示するウィジットを指定',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>'
));
register_sidebar( array(
    'id' => 'column02',
    'name' => 'footer-column02',
    'description' => '2段目に表示するウィジットを指定',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>'
));
register_sidebar( array(
    'id' => 'column03',
    'name' => 'footer-column03',
    'description' => '3段目に表示するウィジットを指定',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>'
));

add_theme_support('html5', array('search-form'));


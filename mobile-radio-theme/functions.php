<?php

include_once('includes/wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'Main menu' =>  _('Main menu'),
));

function theme_prefix_setup(){
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

function vost_the_custom_logo(){
    if ( function_exists( 'the_custom_logo' ) )
    {
        the_custom_logo();
    }
}

//gestion de la tailles des thumbnails pour les images
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(300, 150, true);
}

//récupération du thumbnail en fonction de la taille
//renvoie l'image de thumbnail par défaut si pas définit
/**
 * @param array $taille
 */
function vostok_the_post_thumbnail_url($taille, $thumb_id){
    $thumbURl = wp_get_attachment_image_url($thumb_id, $taille);
    if($thumbURl === false){
        $thumbURl = get_bloginfo('template_url').'/img/defaultthumbnail.jpg';
    }
    return $thumbURl;
}

//récupération des articles supplémentaires demandés en ajax
add_action('wp_ajax_nopriv_get_more', 'get_more_posts');
add_action('wp_ajax_get_more', 'get_more_posts');
function get_more_posts(){

    if($_REQUEST['category'] !== null){
        $query = new WP_Query( array( 'cat' => $_REQUEST['category'], 'posts_per_page' => 10,  'offset' => $_REQUEST['sequenceDArticles']*10 ) );
    }else{
        $query = new WP_Query( array( 'posts_per_page' => 10, 'offset' => $_REQUEST['sequenceDArticles']*10 ) );
    }

    $reponse = '';

    if($query->have_posts()){
        while($query->have_posts()){
            $query->the_post();
            $category = get_the_category();
            $reponse = $reponse.'<div class="col-xs-12"><div class="article"><div class="titre-vignette">' ;
            $reponse = $reponse.'<h3 class="titre-article-vignette"><a class="link-nostyle" href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
            $reponse = $reponse.'<h4 class="categorie-article-vignette"><a class="link-nostyle" href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></h4>';
            $reponse = $reponse.'</div>';
            $reponse = $reponse.'<a class="img-preview-container" href="'.get_the_permalink().'">';
            $reponse = $reponse.'<img class="img-preview img-preview-article" src="'.vostok_the_post_thumbnail_url(array(300, 150), get_post_thumbnail_id()).'" alt="preview">';
            $reponse = $reponse.'</a>';
            $reponse = $reponse.'</div></div>';
        }
    }else{
        $reponse = '<p>plus d\'article !</p>';
    }

    echo $reponse;
}
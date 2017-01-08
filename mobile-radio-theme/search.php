<?php
$ajaxRequest = false;
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH']== 'VOSTOKAJAXREQUEST' ){
    $ajaxRequest = true;
}
?>

<?php if (!$ajaxRequest) : get_header(); endif ;?>

    <div class="body container-fluid">
        <div class="row">
            <h4 style="text-align: center; margin-top: 20px">Résultat de votre recherche pour <br>"<?php if ( is_search() ) : echo get_search_query(); endif ?>"</h4>
            <?php if( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post();?>
                    <div class="col-xs-12">
                        <div class="article">
                            <div class="titre-vignette">
                                <?php $category = get_the_category(); ?>
                                <h3 class="titre-article-vignette"><a class="link-nostyle" href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                <h4 class="categorie-article-vignette"><a class="link-nostyle" href="<?php echo get_category_link($category[0]->cat_ID); ?>"><?php echo $category[0]->cat_name; ?></a></h4>
                            </div>
                            <a class="img-preview-container" href="<?php the_permalink()?>">
                                <img class="img-preview img-preview-article" src="<?php echo vostok_the_post_thumbnail_url(array(300, 150), get_post_thumbnail_id());?>" alt="preview">
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <h2>Aucun article disponible</h2>
            <?php endif; ?>

        </div>
    </div>

<?php if (!$ajaxRequest) : get_footer(); endif ;?>
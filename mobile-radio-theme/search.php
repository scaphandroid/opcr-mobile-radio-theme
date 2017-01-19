<?php
/**
 *(c) Alexis Raphaeloff 2017 (alexis@raphaeloff.net)
 *
 *This file is part of mobile-radio-theme.
 *
 *mobile-radio-theme is free software: you can redistribute it and/or modify
 *it under the terms of the GNU General Public License as published by
 *the Free Software Foundation, either version 3 of the License, or
 *(at your option) any later version.
 *
 *mobile-radio-theme is distributed in the hope that it will be useful,
 *but WITHOUT ANY WARRANTY; without even the implied warranty of
 *MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *GNU General Public License for more details.
 *
 *You should have received a copy of the GNU General Public License
 *along with mobile-radio-theme.  If not, see http://www.gnu.org/licenses/
 */

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
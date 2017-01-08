<?php
$ajaxRequest = false;
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH']== 'VOSTOKAJAXREQUEST' ){
    $ajaxRequest = true;
}
?>

<?php if (!$ajaxRequest) : get_header(); endif ;?>

    <div class="body container-fluid">

        <div class="row">

            <?php if( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post();?>

                    <div class="col-xs-12 post-contenu">
                        <h2 class="titre-single"><?php the_title() ?></h2>
                        <img class="img-preview-contenu" src="<?php echo vostok_the_post_thumbnail_url(array(300, 150), get_post_thumbnail_id());?>" alt="preview">
                        <div class="post-thecontent">
                            <?php the_content(); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

<?php if (!$ajaxRequest) : get_footer(); endif ;?>
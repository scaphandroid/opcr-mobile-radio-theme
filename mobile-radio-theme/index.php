<?php
$ajaxRequest = false;
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH']== 'VOSTOKAJAXREQUEST' ){
    $ajaxRequest = true;
}
?>

<?php if (!$ajaxRequest) : get_header(); endif ;?>

<div class="body container-fluid">
		
	<div class="row">

		<div class="col-xs-12">
			<div class="une text-center">
				<?php
					$une = new WP_Query();
					$une->query(array(
						'posts_per_page' => 1,
					));
					while( $une->have_posts()){
						$wp_query->in_the_loop = true;
						$une->the_post();
						$une_id = $post->ID
					?>
						<div class="titre-vignette">
							<?php $category = get_the_category(); ?>
							<h3 class="titre-article-vignette"><a class="link-nostyle" href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
							<h4 class="categorie-article-vignette"><a class="link-nostyle" href="<?php echo get_category_link($category[0]->cat_ID); ?>"><?php echo $category[0]->cat_name; ?></a></h4>
						</div>
						<a class="img-preview-container" href="<?php the_permalink()?>">
							<img class="img-preview" src="<?php echo vostok_the_post_thumbnail_url(array(300, 150), get_post_thumbnail_id()) ;?>" alt="preview">
						</a>
					<?php
					}
				?>
			</div>
		</div>

		<?php if( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();?>
					<?php if ( $post->ID !== $une_id ) :?>
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
					<?php endif ; ?>
				<?php endwhile; ?>
		<?php endif; ?>

		<div id="plusdarticles" class="col-xs-12">
			<button class="btn btn-default" >Charger plus d'articles</button>
			<?php if( $ajaxRequest) : ?>
				<script src="<?php bloginfo('template_url');?>/js/moreArticles.js"></script>
			<?php endif; ?>
		</div>

    </div>
</div>

<?php if (!$ajaxRequest) : get_footer(); endif ;?>
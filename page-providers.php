<?php
/**
 * template name: Providers Page.
 *
 *
 */
get_header();?>
<div class="container">
	<div class="row">
		<div class="main-cta col-sm-12 text-center">

			<?php if( have_posts() ):
				while(have_posts() ) : the_post();?>
					<h1><?php the_title();?></h1>
					<p class="lead"><?php the_content();?></p>
				<?php endwhile;
			endif;?>
		</div>


	</div>
	<div class="row">
		<div class="col-sm-12 main-content">
			<?php $args=array(
				'post_type' => 'providers',
				'posts_per_page' => 9,
				'orderby'   => 'menu_order',
				'order' => 'ASC'
			);

			 $loop = new WP_Query($args);
			   if( $loop->have_posts() ):
				while( $loop->have_posts() ) : $loop->the_post();
					get_template_part('template-parts/content', 'provider');
			    endwhile;
				else:
				echo _('No Providers Found');
					endif;?>
		<div class="show-more-wrapper">
			<button class="btn btn-lg btn-default">Show More <i class="fa fa-chevron-down"></i></button>
		</div>	
		</div>
		
	</div>
</div>
<?php get_footer();?>





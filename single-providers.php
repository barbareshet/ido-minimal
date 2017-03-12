<?php





get_header();
//$args=array(
//	'post_type' => 'providers',
//	'posts_per_page' => 9,
//	'orderby'   => 'menu_order',
//	'order' => 'ASC'
//);
//
//$loop = new WP_Query($args);

?>
<div class="container">
	<div class="row">
		<?php if( have_posts() ):
			while ( have_posts() ) : the_post();

				get_template_part('template-parts/content', 'single-provider');

			endwhile;
		endif;
		;?>
		
<div class="col-md-4 col-sm-4 col-xs-12 provider-sidebar">
	<?php get_sidebar();?>
</div>
	</div>
</div>


get_footer();?>


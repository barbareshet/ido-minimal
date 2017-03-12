<?php
/**
 *  Template Name: Home Page
 *
 *
 */

get_header();?>

<?php  if( have_posts() ): ?>
<?php while( have_posts() ) : the_post();?>

		<h1><?php the_title();?></h1>

		<div class="col-sm-12">
		<?php the_content();?>
		</div>
		<!-- /.col-sm-12 -->
<?php endwhile;?>
<?php endif;?>



<?php get_footer();?>


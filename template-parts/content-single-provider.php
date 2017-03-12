<?php

$biz_logo = get_field('business_logo');?>

<div class="col-md-8 col-sm-8 col-xs-12 provider">
	<div class="provider-wrap">
		<?php if(is_single() ){?>

		<?php } else {?>
			<div class="provider-image">
				<img src="<?php echo $biz_logo['url'];?>" alt="<?php echo $biz_logo['alt'];?>" title="<?php echo $biz_logo['alt'];?>" class=""/>
			</div>

		<?php };?>
		<div class="provider-info">
			<?php if (is_single() ):?>
			<h1><?php the_field('business_name');?></h1>
			<?php else :?>
			<h4><?php the_field('business_name');?></h4>
			<?php endif;?>
			<p><?php the_field('business_description');?></p>
			<ul class="provider-list">
				<li><i class="fa fa-phone"></i>&nbsp; <?php the_field('business_phone');?></li>
				<!--				<li><i class="fa fa-location"></i>&nbsp; --><?php //the_field();?><!--</li>-->
				<li><i class="fa fa-website"></i>&nbsp; <a href="<?php the_field('business_website');?>" target="_blank" rel="nofollow"><?php the_field('business_website');?></a></li>
				<li><i class="fa fa-email"></i>&nbsp; <?php the_field('business_email');?></li>
			</ul>
		</div>
	</div>
</div>
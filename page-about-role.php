<?php
/*
Template name: about-role
*/
?>
<?php get_header()?>
<div class="bartitle">รู้จักกรรมการนโยบาย</div>
<main>
<ol class="breadcrumb">
  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li><a href="<?php bloginfo('url')?>/aboutus">รู้จักกรรมการนโยบาย</a></li>
  <li class="active"><?php the_title()?></li>
</ol>
<div class="row">
		<div class="col-lg-8">
			<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"><?php the_title()?></h1>
				
				
				<div class="body">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>
				</div>
				
			</div>
		</div>
		<?php get_sidebar()?>
	</div>

</main>
<?php get_footer()?>
<?php
/*
Template name: recruitment
*/
?>
<?php get_header()?>
<div class="bartitle">การสรรหา</div>
<main>
<ol class="breadcrumb">
  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li><a href="<?php bloginfo('url')?>/recruitment/rule">การสรรหา</a></li>
  <li class="active"><?php the_title()?></li>
</ol>
<div class="row">
		<div class="col-lg-8">
			<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"><?php the_title()?></h1>
				
				
				<div class="body">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

				<?php the_content();  ?>

				<?php endwhile; ?>
				<?php endif; ?>
				</div>
				<?php $file = get_field( "file",get_the_ID ()); 
				if(!empty($file)){ ?>
				<div class="document">
					<h2>ดาวน์โหลดเอกสาร</h2>
					<ul class="row doc-row">
					<?php foreach($file as $key=>$row){ ?>
						<li><a href="<?php echo $row['file']['url']?>" target="_blank"><img src="<?php echo $row['file']['icon']?>"> <?php echo $row['file']['title']?></a></li>
					<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php get_sidebar()?>
	</div>
</main>
<?php get_footer()?>
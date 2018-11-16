<?php
/*
Template name: selection
*/
?>
<?php get_header()?>
<div class="bartitle">การสรรหา</div>

<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>/index.php">หน้าหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/recruitment/rule">การสรรหา</a></li>
	  <li class="active">การสรรหากรรมการนโยบาย ส.ส.ท.</li>
	</ol>
	
	<div class="row">
		<div class="col-lg-8">
			<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"><?php the_title()?></h1>
				
			
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>
				
				<?php
$data = get_field('news');
				if( have_rows('news') ): ?>

				<ul style="margin-left: 0px;
    padding-left: 0px;">

					<?php 
					foreach($data as $key=>$row){ 
							$news = getPost('news',array('title','abstract','thumb','create_date'),'asc',$row['news']->ID);
							
					?>
			<?php if($key==0){  ?>
			<h3 class="title orange" style="margin-bottom:20px">ประกาศล่าสุด</h3>
			<article class="grey news-block">
				<a class="blog" href="<?php bloginfo('url')?>/news?id=<?php echo $news[0]['id']?>" target="_blank">
				<div class="image">
					<img src="<?php echo $news[0]['thumb']['url']?>" class="img-responsive" />
				</div>
				<div class="content">
					<h2><?php echo $news[0]['title']; ?></h2>
					<div class="desc"><?php echo moretext($news[0]['abstract'],250)?></div>
					<div class="date"><?php echo format_date($news[0]['create_date'])?></div>
					<div class="text-right">
						<span class="more pull">อ่านเพิ่มเติม</span>
					</div>
				</div>
				</a>
		 </article>
			<?php }else{ ?>
			<?php if($key==1){  ?> <h3 class="title orange" style="margin-bottom:20px">ประกาศที่เกี่ยวข้อง</h3> <?php } ?>
			<article class="horizontal">
			<a class="blog" href="<?php bloginfo('url')?>/news?id=<?php echo $news[0]['id']?>" target="_blank">
				<div class="row">
					<div class="image col-lg-6 col-md-6">
						<img src="<?php echo $news[0]['thumb']['url']?>" class="img-responsive" />
					</div>
					<div class="content col-lg-6 col-md-6">
						<h2><?php echo moretext($news[0]['title'],70)?></h2>
						<div class="desc"><?php echo moretext($news[0]['abstract'],145)?></div>
						<div class="date"><?php echo format_date($news[0]['create_date'])?></div>
						<span class="more">อ่านเพิ่มเติม</span>
					</div>
				</div>
				</a>
			</article>
			<?php } ?>
			<?php } ?>

			
				</ul>

			<?php endif; ?>
			
			</div>
		</div>
		<?php get_sidebar()?>
	</div>
	

</main>

<?php get_footer()?>
<?php
/*
Template name: news
*/
?>
<?php get_header()?>
<div class="bartitle">ความเคลื่อนไหว</div>
<?php 
if(empty($_GET['id'])){ 
	$data = getPost('news',array('title','abstract','thumb','create_date'),'desc');
?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>/index.php">หน้าหลัก</a></li>
	  <li class="active">ความเคลื่อนไหว</li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
		<?php foreach($data as $key=>$row){ ?>
			<?php if($key==0){ ?>
			<article class="grey news-block">
				<a class="blog" href="<?php bloginfo('url')?>/news?id=<?php echo $row['id']?>">
				<div class="image">
					<img src="<?php echo $row['thumb']['url']?>" class="img-responsive" />
				</div>
				<div class="content">
					<h2><?php echo $row['title']?></h2>
					<div class="desc"><?php echo moretext($row['abstract'],250)?></div>
					<div class="date"><?php echo format_date($row['create_date'])?></div>
					<div class="text-right">
						<span class="more pull">อ่านเพิ่มเติม</span>
					</div>
				</div>
				</a>
		 </article>
			<?php }else{ ?>
			<article class="horizontal">
			  <a class="blog" href="<?php bloginfo('url')?>/news?id=<?php echo $row['id']?>">
				<div class="row">
					<div class="image col-lg-5 col-md-5">
						<img src="<?php echo $row['thumb']['url']?>" class="img-responsive" />
					</div>
					<div class="content col-lg-7 col-md-7">
						<h2><?php echo moretext($row['title'],80)?></h2>
						<div class="desc"><?php echo moretext($row['abstract'],150)?></div>
						<div class="date"><?php echo format_date($row['create_date'])?></div>
						<span class="more">อ่านเพิ่มเติม</span>
					</div>
				</div>
				</a>
			</article>
			<?php } ?>
			<?php } ?>
		</div>
		<?php get_sidebar()?>
	</div>
</main>
<?php 
}else{ 
	$data = getPost('news',array('title','thumb','abstract','create_date','description','gallery','embed_file'),'asc',$_GET['id']);
	?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/news">ความเคลื่อนไหว</a></li>
	  <li class="active"><?php echo $data[0]['title']?></li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
			<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"><?php echo $data[0]['title']?></h1>
				<div class="ktm blog-post-meta">
					<div class="pull-left">เมื่อวันที่ <?php echo format_date($data[0]['create_date'])?></div>
					<div class="pull-right">
						<div class="addthis_sharing_toolbox"></div>
					</div>
				</div>
				
				<div class="featured-image">
					<img src="<?php echo $data[0]['thumb']['url']?>" class="img-responsive">
				</div>
				<div class="body">
						<div class="abstract"><?php echo $data[0]['abstract']?></div>
						<?php echo $data[0]['description']?>
				</div>
				<?php if(!empty($data[0]['embed_file'])){ ?>
				<div class="document">
					<h2>ดาวน์โหลดเอกสาร</h2>
					<ul class="row doc-row">
					<?php foreach($data[0]['embed_file'] as $key=>$row){ ?>
						<li><a href="<?php echo $row['embed_file']['url']?>" target="_blank"><img src="<?php echo $row['embed_file']['icon']?>"> <?php echo $row['embed_file']['title']?></a></li>
					<?php } ?>
					</ul>
				</div>
				<?php } ?>
				
				<?php if(!empty($data[0]['gallery'])){ ?>
				<div class="gallery">
					<h2><i class="fa fa-camera-retro"></i> แฟ้มภาพ</h2> <div class="pull-right gallery-count">(<?php echo count($data[0]['gallery'])?> รูปภาพ)</div>
					<ul class="row gallery-row">
					<?php foreach($data[0]['gallery'] as $key=>$row){

					?>
						<li class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
							<img class="img-responsive" src="<?php echo $row['url']?>" title="<?php echo $row['caption']?>">
						</li>
					<?php } ?>
					</ul>
				
				</div>
				<?php } ?>
			</div>
		</div>
		<?php get_sidebar()?>
	</div>
</main>
<?php } ?>
<?php get_footer()?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57aad8fc361b1a0c"></script>

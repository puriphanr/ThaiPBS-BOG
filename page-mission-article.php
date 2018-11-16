<?php
/*
Template name: mission-article
*/
?>
<?php get_header()?>
<div class="bartitle">ภารกิจหลัก</div>
<?php 
if(empty($_GET['id'])){ 
	$data = getPost('mission_article',array('title','abstract','create_by','thumb'),'asc');
?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>/index.php">หน้าหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission">ภารกิจหลัก</a></li>
	  <li class="active">บทความ BOG</li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
		<h1 class="header">บทความ BOG</h1>
		<?php foreach($data as $key=>$row){ ?>
			<?php if($key==0){ ?>
			<article class="grey news-block">
			
				<div class="image">
					<img src="<?php echo $row['thumb']['url']?>" class="img-responsive" />
				</div>
				<div class="content">
					<h2><?php echo $row['title']?></h2>
					<div class="desc"><?php echo moretext($row['abstract'],260)?></div>
					<div class="create_by">โดย <?php echo $row['create_by'] ?></div>
					
					
					<div class="text-right">
						<a class="more pull" href="<?php bloginfo('url')?>/mission/article?id=<?php echo $row['id']?>">อ่านเพิ่มเติม</a>
					</div>
				</div>
			
		 </article>
			<?php }else{ ?>
			<article class="horizontal">
				<div class="row">
					<div class="image col-lg-6 col-md-6">
						<img src="<?php echo $row['thumb']['url']?>" class="img-responsive" />
					</div>
					<div class="content col-lg-6 col-md-6">
						<h2><?php echo moretext($row['title'],70)?></h2>
						<div class="desc"><?php echo moretext($row['abstract'],150)?></div>
						<div class="create_by">โดย <?php echo $row['create_by'] ?></div>
						
						<a class="more" href="<?php bloginfo('url')?>/mission/article?id=<?php echo $row['id']?>">อ่านเพิ่มเติม</a>
					</div>
				</div>
			</article>
			<?php } ?>
			<?php } ?>
		</div>
		<?php get_sidebar()?>
	</div>
</main>
<?php 
}else{ 
	$data = getPost('mission_article',array('title','thumb','abstract','create_by','description','gallery','embed_file'),'asc',$_GET['id']);
	pvc_post_views($_GET['id']);
	?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
	   <li><a href="<?php bloginfo('url')?>/mission">ภารกิจหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission/article">บทความ BOG</a></li>
	  <li class="active"><?php echo $data[0]['title']?></li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
			<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"><?php echo $data[0]['title']?></h1>
				<div class="ktm blog-post-meta">
					<div class="pull-left">โดย <?php echo $data[0]['create_by']?></div>
					<div class="view pull-right"><i class="glyphicon glyphicon-eye-open"></i>10 ครั้ง
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
					<?php foreach($data[0]['gallery'] as $key=>$row){ ?>
						<li class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
							<img class="img-responsive" src="<?php echo $row['url']?>">
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
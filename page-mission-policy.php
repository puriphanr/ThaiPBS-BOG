<?php
/*
Template name: mission-policy
*/
?>
<?php get_header()?>
<div class="bartitle">ภารกิจหลัก</div>
<?php 
if(empty($_GET['id'])&& empty($_GET['main'])){
	$metaQuery =  array(
								array(
									'key' => 'default', 
									'value' => 1,
									'compare' => '='
								)
				);
	$data = getPost('policy',array('title','description','grouping','download_file','create_date'),'asc','',$metaQuery,1);
?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>/index.php">หน้าหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission">ภารกิจหลัก</a></li>
	  <li class="active">ประมวลนโยบาย</li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
		<div class="blog-post">
		<div class="pull-right"><a href="<?php bloginfo('url')?>/mission/policy/?main=1" class="btn btn-primary btn-right"><i class="fa fa-chevron-right" aria-hidden="true"></i> ดูทั้งหมด</a></div>
				<h1 id="title" class="ktm blog-post-title"><?php echo $data[0]['title']?> </h1>
					<div class="ktm blog-post-meta">
					<div class="pull-left">เมื่อวันที่ <?php echo format_date($data[0]['create_date'])?></div>
					
				</div>
				<div class="body" style="margin-top:20px">
					<?php echo $data[0]['description']?>
				</div>
				<?php if(!empty($data[0]['download_file'])){ ?>
				<div class="document">
					<h2>ดาวน์โหลดเอกสาร</h2>
					<ul class="row doc-row">
					<?php foreach($data[0]['download_file'] as $key=>$row){ ?>
						<li><a href="<?php echo $row['download_file']['url']?>" target="_blank"><img src="<?php echo $row['download_file']['icon']?>"> <?php echo $row['download_file']['title']?></a></li>
					<?php } ?>
					</ul>
				</div>
				<?php } ?>
		</div>
		</div>
		<?php get_sidebar()?>
	</div>
</main>
<?php }
if($_GET['main']){ ?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>/index.php">หน้าหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission">ภารกิจหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission/policy"><?php the_title()?></a></li>
	  <li class="active">นโยบายทั้งหมด</li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
		<div class="pull-right"><a href="<?php bloginfo('url')?>/mission/policy" class="btn btn-primary btn-right"><i class="fa fa-chevron-left" aria-hidden="true"></i> กลับ</a></div>
			<h1 class="header">ประมวลนโยบาย</h1>
			
			<ul class="nav nav-tabs" style="clear:both;padding-top:20px">
			  <li class="active"><a data-toggle="tab" href="#policy1">ประมวลนโยบายด้านบริหารจัดการองค์กร</a></li>
			  <li><a data-toggle="tab" href="#policy2">ประมวลนโยบายด้านประชาสังคม</a></li>
			  <li><a data-toggle="tab" href="#policy3">ประมวลนโยบายด้านสื่อสารมวลชน</a></li>
			</ul>

			<div class="tab-content">
			<?php 
			for($i=1;$i<=3;$i++){
				$metaQuery =  array(
								array(
									'key' => 'grouping', 
									'value' => $i,
									'compare' => '='
								)
				);
				$data = getPost('policy',array('title','description','grouping'),'asc','',$metaQuery);
				
			?>
			  <div id="policy<?php echo $i?>" class="tab-pane fade <?php echo $i==1 ? 'in active' : NULL ?>">
				<div class="list-group">
				<?php foreach($data as $key=>$row){ ?>
					 <a href="<?php bloginfo('url')?>/mission/policy?id=<?php echo $row['id'] ?>" class="list-group-item"><span class="badge"><i class="glyphicon glyphicon-chevron-right"></i> </span> <?php echo $row['title']?></a>
				<?php } ?>
				 
				</div>
			  </div>
			<?php } ?>
			</div>
		</div>
		<?php get_sidebar()?>
	</div>
</main>


<?php 
}
if($_GET['id']){
	$data = getPost('policy',array('title','description','grouping','download_file','create_date'),'asc',$_GET['id']);
?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission">ภารกิจหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission/policy">ประมวลนโยบาย</a></li>
	   <li class="active"><?php echo $data[0]['title']?></li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
		<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"><?php echo $data[0]['title']?></h1>
					<div class="ktm blog-post-meta">
					<div class="pull-left">เมื่อวันที่ <?php echo format_date($data[0]['create_date'])?></div>
					
				</div>
				<div class="body" style="margin-top:20px">
					<?php echo $data[0]['description']?>
				</div>
				<?php if(!empty($data[0]['download_file'])){ ?>
				<div class="document">
					<h2>ดาวน์โหลดเอกสาร</h2>
					<ul class="row doc-row">
					<?php foreach($data[0]['download_file'] as $key=>$row){ ?>
						<li><a href="<?php echo $row['download_file']['url']?>" target="_blank"><img src="<?php echo $row['download_file']['icon']?>"> <?php echo $row['download_file']['title']?></a></li>
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
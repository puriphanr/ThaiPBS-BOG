<?php
/*
Template name: mission-report
*/
?>
<?php get_header()?>
<div class="bartitle">ภารกิจหลัก</div>
<?php 
if(empty($_GET['id'])){
	$yearQuery = 
	$data = getPost('report',array('title','create_date'),'asc');
	$content = array();
	foreach($data as $key=>$row){
		$temp_year = substr($row['create_date'],6,4);
		$content[$temp_year][] = $row;
	}
	
?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>/index.php">หน้าหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission">ภารกิจหลัก</a></li>
	  <li class="active">รายงานการประชุม</li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
			<h1 class="header">รายงานการประชุม</h1>
			<?php foreach($content as $key=>$row){ ?>		
			<div class="list-group" style="clear:both;padding-top:20px;">
			
					<a href="javascript:void(0)" style="cursor:default" class="list-group-item active"> 
						<div class="row">
							<div class="col-lg-12">รายงานการประชุมปี พ.ศ. <?php echo $key+543?> </div>
						
						</div>
						
					</a>
		
					<?php foreach($row as $skey=>$srow){ ?>
					<a href="<?php bloginfo('url')?>/mission/report?id=<?php echo $srow['id']?>" class="list-group-item"><span class="badge"><i class="glyphicon glyphicon-chevron-right"></i> </span><?php echo $srow['title']?> <span class="date">(<?php echo format_date($srow['create_date'])?>)</span></a>
					<?php } ?>
				
							 
			</div>
			<?php } ?>		
		</div>
		<?php get_sidebar()?>
	</div>
</main>
<?php }else{ 
	$data = getPost('report',array('title','description','download_file','create_date'),'asc',$_GET['id']);
?>
<main>
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission">ภารกิจหลัก</a></li>
	  <li><a href="<?php bloginfo('url')?>/mission/report">รายงานการประชุม</a></li>
	   <li class="active"><?php echo $data[0]['title']?></li>
	</ol>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
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
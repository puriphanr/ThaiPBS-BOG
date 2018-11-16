<?php
/*
Template name: complaint-report
*/
?>
<?php get_header()?>
<div class="bartitle">รับเรื่องร้องเรียนจริยธรรม</div>
<?php 
if(empty($_GET['id'])){
	$yearQuery = 
	$data = getPost('complaint_report',array('title','create_date'),'desc');
	$content = array();
	foreach($data as $key=>$row){
		$temp_year = substr($row['create_date'],6,4);
		$content[$temp_year][] = $row;
	}
	
?>
<main>
	<ol class="breadcrumb">
	 <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li><a href="<?php bloginfo('url')?>/complaint/contact">รับเรื่องร้องเรียนจริยธรรม</a></li>
	  <li class="active">รายงานการดำเนินงาน</li>
	</ol>
	<div class="row">
		<div class="col-lg-8">
			<h1 class="header">รายงานการดำเนินงาน</h1>
			<?php foreach($content as $key=>$row){ ?>		
			<div class="list-group" style="clear:both;padding-top:20px;">
			
					<a href="javascript:void(0)" style="cursor:default" class="list-group-item active"> 
						<div class="row">
							<div class="col-lg-12">พ.ศ. <?php echo $key+543?> </div>
						
						</div>
						
					</a>
		
					<?php foreach($row as $skey=>$srow){ ?>
					<a href="<?php bloginfo('url')?>/complaint/report?id=<?php echo $srow['id']?>" class="list-group-item"><span class="badge"><i class="glyphicon glyphicon-chevron-right"></i> </span><?php echo $srow['title']?> </a>
					<?php } ?>
				
							 
			</div>
			<?php } ?>		
		</div>
		<?php 
		$is_complaint = 5; 
		get_sidebar();
		?>
	</div>
</main>
<?php }else{ 
	$data = getPost('complaint_report',array('title','description','download_file','create_date'),'asc',$_GET['id']);
?>
<main>
	<ol class="breadcrumb">
	   <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li><a href="<?php bloginfo('url')?>/complaint/contact">รับเรื่องร้องเรียนจริยธรรม</a></li>
	  <li><a href="<?php bloginfo('url')?>/complaint/report">รายงานการดำเนินงาน</a></li>
	   <li class="active"><?php echo $data[0]['title']?></li>
	</ol>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"><?php echo $data[0]['title']?></h1>
					
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
		<?php 
		$is_complaint = 5; 
		get_sidebar();
		?>
	</div>
</main>
<?php } ?>
<?php get_footer()?>
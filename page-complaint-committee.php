<?php
/*
Template name: complaint-committee
*/
?>
<?php 
get_header();
$data = getPost('complaint_committee',array('title','position','thumb'),'asc');
?>
<div class="bartitle">รับเรื่องร้องเรียนจริยธรรม</div>
<main>
<ol class="breadcrumb">
  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li><a href="<?php bloginfo('url')?>/complaint/contact">รับเรื่องร้องเรียนจริยธรรม</a></li>
  <li class="active">คณะอนุกรรมการรับและพิจารณาเรื่องร้องเรียน ฯ</li>
</ol>
<div class="row">
		<div class="col-lg-8">
			<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title">คณะอนุกรรมการรับและพิจารณาเรื่องร้องเรียน ฯ</h1>
				
				<div class="body">
				<?php foreach($data as $key=>$row){?>
				<div class="row com-list">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
						
							<img src="<?php echo $row['thumb']['url'] ?>" class="img-responsive" />
					</div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
						<div class="tname"><?php echo $row['title']?></div>
						<div class="sname"><?php echo $row['position']?></div>
					</div>
				</div>
				<?php } ?>
				</div>
			</div>
		</div>
		<?php 
		$is_complaint = 1; 
		get_sidebar();
		?>
	</div>
</main>
<?php get_footer()?>
<?php
/*
Template name: about-past
*/
?>
<?php get_header()?>
<div class="bartitle">ทำเนียบกรรมการนโยบาย</div>
<?php
$position_array = array(
						1=>'ประธานกรรมการนโยบาย',
						2=>'ด้านส่งเสริมประชาธิปไตยฯ',
						3=>'ด้านการบริหารจัดการองค์กร',
						4=>'ด้านกิจการสื่อสารมวลชน');
						
$year = getPost('old_member',array('title','showing'));
?>
<main>
<ol class="breadcrumb">
  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li><a href="<?php bloginfo('url')?>/aboutus">รู้จักกรรมการนโยบาย</a></li>
  <li class="active">ทำเนียบกรรมการนโยบาย</li>
</ol>
<div class="row">
		<div class="col-lg-8">
		<?php 
		foreach($year as $key=>$row){ 
			$data = getPost('about',array('title','thumb','medium_thumb','position','extra_text','year','old_position'),'asc','',
					array(
						array(
							'key'	 	=> 'year',
							'value'	  	=> $row['id'],
							'compare' 	=> 'LIKE',
						)
					)
				);
		?>
			<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"> ปี <?php echo $row['title']?></h1>
				<div class="body noborder-btm">
				<?php foreach($data as $skey=>$srow){?>
				<a target="_blank" title="<?php echo $srow['title']?>" href="<?php bloginfo('url')?>/aboutus?gr=1&id=<?php echo $srow['id']?>&past=1" alt="<?php echo $row['title']?>">
					<div class="row com-list">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
							
								<img src="<?php echo $srow['thumb']['url'] ?>" class="img-responsive" />
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
							<div class="tname"><?php echo $srow['title']?></div>
							<div class="sname"><?php echo $srow['old_position'] == "" ? $position_array[$srow['position']] : $position_array[$srow['old_position']]?></div>
						</div>
					</div>
				</a>
				<?php } ?>
				</div>
			</div>
		<?php } ?>
		</div>
		<?php get_sidebar();?>
</div>
</main>
<?php get_footer()?>
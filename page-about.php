<?php
/*
Template name: about
*/
?>
<?php get_header()?>
<div class="bartitle">รู้จักกรรมการนโยบาย</div>

<?php
$position_array = array(
						1=>'ประธานกรรมการนโยบาย',
						2=>'ด้านส่งเสริมประชาธิปไตยฯ',
						3=>'ด้านการบริหารจัดการองค์กร',
						4=>'ด้านกิจการสื่อสารมวลชน'
					   );
$year = getPost('old_member',array('title','showing'),'asc','',
			array(
				array(
					'key'	 	=> 'showing',
					'value'	  	=> 1,
					'compare' 	=> '=',
				)
			)
			);
if(empty($_GET['gr'])){

$about = getPost('about',array('title','thumb','medium_thumb','position','extra_text','showing','year'),'asc','',
					array(
						array(
							'key'	 	=> 'year',
							'value'	  	=> $year[0]['id'],
							'compare' 	=> 'LIKE',
						)
					)
				);

?>
<main>
<ol class="breadcrumb">
  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li class="active">รู้จักกรรมการนโยบาย</li>
</ol>
<div class="row" style="margin-left:20px">
	<?php foreach($about as $key=>$row){ ?>
		<?php if($row['position']==1){ ?>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"></div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb" style="margin-bottom:30px;">
				<a href="<?php bloginfo('url')?>/aboutus?gr=1&id=<?php echo $row['id']?>" alt="<?php echo $row['title']?>" class="about-thumb">
								<img src="<?php echo $row['medium_thumb']['url'] ?>" class="img-responsive" />
								<span class="label-bar">
									<div class="title"><?php echo $row['title']?></div>
									<div>(<?php echo $position_array[$row['position']]?>)</div>
								</span>
				</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"></div>
		</div>
		<?php } elseif($row['position'] == 2 or $row['position'] == 3){ ?>
		
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb" style="margin-bottom:<?php echo $row['position'] ==2 ? 80 : 30 ?>px;">
							<a href="<?php bloginfo('url')?>/aboutus?gr=1&id=<?php echo $row['id']?>" alt="<?php echo $row['title']?>" class="about-thumb">
								<img src="<?php echo $row['medium_thumb']['url'] ?>" class="img-responsive" />
								<span class="label-bar">
									<div class="title"><?php echo $row['title']?></div>
									<div>(<?php echo $position_array[$row['position']]?>)</div>
								</span>
									<?php if($row['extra_text'] !=""){ ?>
								<div class="text-center" style="text-align: center;
    position: absolute;
    clear: both;
    width: 85%;
	padding-top:10px;
    z-index: 1;"><?php echo $row['extra_text']?></div>
								<?php } ?>
							</a>
						
						</div>
		
		<?php }else{ ?>
						<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"></div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb" style="margin-bottom:30px;">
							<a href="<?php bloginfo('url')?>/aboutus?gr=1&id=<?php echo $row['id']?>" alt="<?php echo $row['title']?>" class="about-thumb">
								<img src="<?php echo $row['medium_thumb']['url'] ?>" class="img-responsive" />
								<span class="label-bar">
									<div class="title"><?php echo $row['title']?></div>
									<div>(<?php echo $position_array[$row['position']]?>)</div>
								</span>
							</a>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"></div>
		
		<?php } ?>
	<?php } ?>
</div>
</main>
<?php }else{ ?>
	<?php 
	if($_GET['gr']==1){ 
		$about = getPost('about',array('title','thumb'),'asc','',
					array(
						array(
							'key'	 	=> 'year',
							'value'	  	=> $year[0]['id'],
							'compare' 	=> 'LIKE',
						)
					)
					);
		$aboutData = getPost('about',array('title','thumb','extra_text','big_thumb','position','history','education','experience','goal','name_en','desc_en','old_position'),'asc',$_GET['id']);
	?>
	<div class="row about-bar centered">
	
					<?php foreach($about as $key=>$row){ ?>
						<div class="col-lg-1 col-sm-1 col-md-1 col-xs-2 thumb">
							<a title="<?php echo $row['title']?>" href="<?php bloginfo('url')?>/aboutus?gr=1&id=<?php echo $row['id']?>" alt="<?php echo $row['title']?>">
								<img src="<?php echo $row['thumb']['url'] ?>" class="img-responsive" />
							</a>
						</div>
						
	<?php } ?>
	
	</div>
	<main id="about-div">
	<ol class="breadcrumb">
	  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
	  <?php if(!empty($_GET['past'])){ ?>
	  <li><a href="<?php bloginfo('url')?>/about/past">ทำเนียบกรรมการนโยบาย</a></li>
	  <?php } else { ?>
	  <li><a href="<?php bloginfo('url')?>/about">รู้จักกรรมการนโยบาย</a></li>
	  <?php } ?>
	  <li class="active"><?php echo $aboutData[0]['title']?></li>
	</ol>
		<div class="row nopad">
			<div class="col-lg-6">
				<img src="<?php echo !empty($aboutData[0]['big_thumb']) ? $aboutData[0]['big_thumb']['url'] : $aboutData[0]['thumb']['url'] ?>" alt="about image" class="img-about img-rounded img-responsive pull-left">
				<span class="label-bar red">
									<div class="title"><?php echo $aboutData[0]['title']?></div>
									<div>(<?php echo (!empty($_GET['past']) && $aboutData[0]['old_position'] != "") ? $position_array[$aboutData[0]['old_position']] : $position_array[$aboutData[0]['position']]?>)</div>
									<?php if($aboutData[0]['extra_text'] !=""){ ?>
								<div class="text-center" style="text-align: center;
    position: absolute;
    clear: both;
    width: 55%;
	padding-top:10px;
    z-index: 1;"><?php echo $aboutData[0]['extra_text']?></div>
								<?php } ?>
				</span>
			</div>
			<div class="col-lg-6 about-goal">
				<div class="bar-left">เป้าหมาย</div>
				<div class="ktm"><?php echo $aboutData[0]['goal'] ?></div>
			</div>
		
		</div>
		<div class="row nopad" style="padding-bottom:20px">
			<div class="col-lg-12">
				<div class="bar-right">ประวัติ</div>
				<div class="ktm"><?php echo $aboutData[0]['history'] ?></div>
			</div>
		</div>
		<div class="row nopad" style="padding-bottom:20px">
			<div class="col-lg-12">
				<div class="bar-right">ประวัติการศึกษา</div>
				<div class="ktm"><?php echo $aboutData[0]['education'] ?></div>
			</div>
		</div>
		<div class="row nopad">
			<div class="col-lg-12">
				<div class="bar-right">ประสบการณ์</div>
				<div class="ktm"><?php echo $aboutData[0]['experience'] ?></div>
			</div>
		</div>
	</main>
	<?php } ?>
<?php } ?>

<?php get_footer()?>
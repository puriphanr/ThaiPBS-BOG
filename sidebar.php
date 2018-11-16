<?php
global $is_complaint;
$news = getPost('news',array('title','abstract','thumb','create_date'),'desc','','',5);
?>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebar">
	<?php if($is_complaint){?>
	<div class="row" style="margin-bottom:0px">
		<div class="list-group">
		  <a href="#" class="list-group-item active">
			รับเรื่องร้องเรียนจริยธรรม
		  </a>
		  <a href="<?php bloginfo('url')?>/complaint/committee" class="list-group-item <?php echo $is_complaint==1 ? 'subactive' : NULL ?>">รู้จักคณะอนุกรรมการ</a>
		  <a href="<?php bloginfo('url')?>/complaint/code" class="list-group-item <?php echo $is_complaint==2 ? 'subactive' : NULL ?>">ข้อมูลและระเบียบต่างๆ</a>
		  <a href="<?php bloginfo('url')?>/complaint/announcement" class="list-group-item <?php echo $is_complaint==3 ? 'subactive' : NULL ?>">ประกาศที่เกี่ยวข้อง</a>
		  <a href="<?php bloginfo('url')?>/complaint/contact" class="list-group-item <?php echo $is_complaint==4 ? 'subactive' : NULL ?>">แบบฟอร์มรับเรื่องร้องเรียน</a>
		  <a href="<?php bloginfo('url')?>/complaint/report" class="list-group-item <?php echo $is_complaint==5 ? 'subactive' : NULL ?>">รายงานการดำเนินงาน</a>
		</div>
	</div>
	<?php } ?>
	<div class="row">
	<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right:0px;">
	<aside class="most view">
					<div class="header ktm">ข่าวล่าสุด</div>
					<ul>
					<?php 
					   foreach($news as $key=>$row){
					   ?>
						<li>
							<a class="blog" href="<?php bloginfo('url')?>/news?id=<?php echo $row['id']?>" target="_blank">
											<div class="pull-left image"><img src="<?php echo $row['thumb']['url']?>" width="140" height="75"></div>
											<?php echo moretext($row['title'],60)?>
							</a>				
						</li>
					   <?php } ?>					
					</ul>
					<div class="col-sm-12 viewall"><a class="pull-right" href="<?php bloginfo('url')?>/news" target="_blank"><h3 class="kmedium"><span>ดูทั้งหมด</span><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></h3></a></div>
				</aside>
				</div>
	</div>
	<div class="row">
	<div  class="col-lg-12 col-md-12 col-sm-6 col-xs-6 complaint_img">
					<a class="blog" href="<?php bloginfo('url')?>/recriutment/bogselection" title="การสรรหากรรมการนโยบาย ส.ส.ท.">
						<img src="http://bog.thaipbs.or.th/wp-content/uploads/2016/06/W0000099.png" class="img-responsive"/>
					</a>
				</div>
				
				<div  class="col-lg-12 col-md-12 col-sm-6 col-xs-6 complaint_img">
					<a class="blog" href="<?php bloginfo('url')?>/complaint/contact">
						<img src="<?php echo get_template_directory_uri(); ?>/img/contact-banner.png" class="img-responsive" width="100%"/>
					</a>
				</div>
	</div>
</div>
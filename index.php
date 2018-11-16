<?php get_header()?>
<?php
$hilight = getPost('hilight',array('listing'),'desc');
$news = getPost('news',array('title','abstract','thumb','create_date'),'desc');
$year = getPost('old_member',array('title','showing'),'asc','',
			array(
				array(
					'key'	 	=> 'showing',
					'value'	  	=> 1,
					'compare' 	=> '=',
				)
			)
			);
$about = getPost('about',array('title','thumb'),'asc','',
					array(
						array(
							'key'	 	=> 'year',
							'value'	  	=> $year[0]['id'],
							'compare' 	=> 'LIKE',
						)
					)
				);
$article = getPost('mission_article',array('title','thumb','create_date','create_by'),'desc');
?>
<main>
   <div class="row" id="hilight">
   <?php 
   foreach($hilight as $key=>$row){
		 $list = getPost($row['listing']->post_type,array('title','abstract','thumb','create_date'),'asc',$row['listing']->ID);
		
   ?>
	
      <div class="col-lg-<?php echo $key==0 ? 6 : 3 ?> col-md-<?php echo $key==0 ? 6 : 3 ?>">
         <article class="<?php echo $key==0 ? 'grey' : NULL ?>">
			<a class="blog" href="<?php bloginfo('url')?>/<?php echo $row['listing']->post_type?>?id=<?php echo $list[0]['id']?>">
				<div class="image">
					<img src="<?php echo $list[0]['thumb']['url']?>" class="img-responsive"  <?php echo $key>0 ? 'style="height:158px"' : NULL ?> />
				</div>
				<div class="content">
					<h2 class="<?php echo $key<>0 ? 'subtitle' : NULL ?>"><?php echo $list[0]['title']?></h2>
					<?php if($key==0){ ?>
					<div class="desc"><?php echo moretext($list[0]['abstract'],250)?></div>
					<div class="date"><?php echo format_date($list[0]['create_date'])?></div>
					<?php } ?>
				</div>
			</a>
		 </article>
      </div>
   <?php } ?>
   </div>
   
   <div class="row">
		<div class="col-lg-8">
			<h1 class="title">ความเคลื่อนไหว</h1>
			<?php foreach($news as $key=>$row){
				if($key < 10){
			?>	
			
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
						<span class="more">	อ่านเพิ่มเติม</span>
					</div>
				</div>
			</a>
			</article>
			
			<?php 
				}
			} ?>
			
			<div class="col-lg-12 viewall">
				<a class="pull-right" href="<?php bloginfo('url')?>/news">
					<h3><span>ดูทั้งหมด</span><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></h3>
				</a>
			</div>
		
		</div>
		<div class="col-lg-4">
		
			<div class="row" id="about">	
			
				<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="title">รู้จักกรรมการนโยบาย</h1>
					<?php foreach($about as $key=>$row){ ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 thumb">
							<a href="<?php bloginfo('url')?>/aboutus?gr=1&id=<?php echo $row['id']?>" title="<?php echo $row['title']?>" alt="<?php echo $row['title']?>">
								<img src="<?php echo $row['thumb']['url'] ?>" class="img-responsive" />
							</a>
						</div>
					<?php } ?>
				
				</div>	
				
				
			</div>	
			
			<!--<div class="row">
				<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right:0px;">
				<aside class="most view bog_article">
					<div class="header ktm">บทความ BOG</div>
					<ul>
					<?php 
					   //foreach($article as $key=>$row){
							
					   ?>
						<li>
											<div class="pull-left image"><img src="<?php //echo $row['thumb']['url']?>" width="140" height="75"></div>
											<a href="<?php //bloginfo('url')?>/index.php/mission/article?id=<?php //echo $row['id']?>" target="_blank">
												<div class="title"><?php //echo moretext($row['title'],40)?></div>
												<div class="create_by">โดย <?php //echo $row['create_by']?></div>
											</a>

						</li>
					   <?php //} ?>					
					</ul>
					<div class="col-sm-12 viewall"><a class="pull-right" href="<?php //bloginfo('url')?>/mission/article" target="_blank"><h3 class="kmedium"><span>ดูทั้งหมด</span><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></h3></a></div>
				</aside>
				</div>
			</div>-->
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 complaint_img">
					<a class="blog" href="<?php bloginfo('url')?>/recriutment/bogselection" title="การสรรหากรรมการนโยบาย ส.ส.ท.">
						<img src="http://bog.thaipbs.or.th/wp-content/uploads/2016/06/W0000099.png" class="img-responsive"/>
					</a>
				</div>
				
				<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 complaint_img">
					<a class="blog" href="<?php bloginfo('url')?>/complaint/contact">
						<img src="<?php echo get_template_directory_uri(); ?>/img/contact-banner.png" class="img-responsive" width="100%"/>
					</a>
				</div>
				
				
			
		</div>
   </div>
</main>
<?php get_footer()?>
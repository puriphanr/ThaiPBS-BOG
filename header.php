<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php 
	if($_GET['id']){ 
		$data = getPost('news',array('title','abstract','thumb'),'desc',$_GET['id']);
	?>
	<meta property="og:title" content="<?php echo $data[0]['title']; ?>"/>
    <meta property="og:description" content="<?php echo strip_tags($data[0]['abstract']); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php bloginfo('url')?>/news/?id=<?php echo $_GET['id']?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $data[0]['thumb']['url']; ?>"/>
	<?php
	}
	?>

    <title>Thai PBS BOG (Board Of Governors) คณะกรรมการนโยบาย | องค์การกระจายเสียงและแพร่ภาพสาธารณะแห่งประเทศไทย (ส.ส.ท.)</title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico"/>
<link rel="stylesheet" href="http://news.thaipbs.or.th/css/style.min.css?0a5fa5f">
    <!-- CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">

</head>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ca79b423-d9da-4de1-afcc-ae25aedbee9b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<body>
 <!-- Page Content -->
<div class="container effect7">
	<header>
    <!-- Navigation -->
    <nav class="navbar nav-header" role="navigation">
       
            <!-- Brand and toggle get grouped for better mobile display -->
			
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="http://www.thaipbs.or.th/">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/tpbs.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="//www.thaipbs.or.th/news" target="_blank">ข่าว</a>
                    </li>
                    <li>
                        <a href="//program.thaipbs.or.th" target="_blank">รายการทีวี</a>
                    </li>
                    <li>
                        <a href="//thaipbs.or.th/live" target="_blank">ชมสด</a>
                    </li>
					 <li>
                        <a href="//program.thaipbs.or.th/watch" target="_blank">ชมย้อนหลัง</a>
                    </li>
					 <li>
                        <a href="http://www.thaipbsonline.net/" target="_blank">วิทยุ</a>
                    </li>
					 <li>
                        <a href="//org.thaipbs.or.th/home" target="_blank">องค์กร</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
	
    </nav>
	<div class="bogName hidden-xs">
		คณะกรรมการนโยบาย องค์การกระจายเสียงและแพร่ภาพสาธารณะแห่งประเทศไทย (ส.ส.ท.)
	</div>
	
	<a href="<?php bloginfo('url')?>" class="homeclick"></a>
	    <!-- Navigation -->
    <nav class="nav-main" role="navigation">
       
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
						เมนูหลัก <i class="fa fa-caret-square-o-down"></i>
                </button>
             
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php bloginfo('url')?>/news">ความเคลื่อนไหว</a>
                    </li>
                  
					 <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">รู้จักกรรมการนโยบาย <span class="caret"></span></a>
							<ul class="dropdown-menu">
							  <li><a href="<?php bloginfo('url')?>/mission/aboutus">ประวัติและเป้าหมาย</a></li>
							  <li><a href="<?php bloginfo('url')?>/mission/aboutus/role">บทบาทหน้าที่</a></li>
								<li><a href="<?php bloginfo('url')?>/mission/aboutus/past">ทำเนียบกรรมการนโยบาย</a></li>
							</ul>
					</li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ภารกิจหลัก <span class="caret"></span></a>
							<ul class="dropdown-menu">
							  <li><a href="<?php bloginfo('url')?>/mission/policy">ประมวลนโยบาย</a></li>
							 <!-- <li><a href="<?php //bloginfo('url')?>/mission/article">บทความ BOG</a></li>-->
							  <li><a href="<?php bloginfo('url')?>/mission/report">รายงานการประชุม</a></li>
							</ul>
					</li>
					 <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การสรรหา <span class="caret"></span></a>
							<ul class="dropdown-menu">
							  <li><a href="<?php bloginfo('url')?>/recruitment/rule">หลักเกณฑ์และวิธีการ</a></li>
							  <li><a href="<?php bloginfo('url')?>/recruitment/process">กระบวนการสรรหา</a></li>
							  <li><a href="<?php bloginfo('url')?>/recruitment/apply">การรับสมัคร</a></li>
							  <!--<li><a href="<?php bloginfo('url')?>/recruitment/condition">เงื่อนไขการรับสมัคร</a></li>-->
							  <li><a href="<?php bloginfo('url')?>/recruitment/committee">คณะกรรมการสรรหา</a></li>
							</ul>
					</li>
					 <li>
                        <a href="<?php bloginfo('url')?>/contact">ติดต่อกรรมการนโยบาย</a>
                    </li>
					
                </ul>
            </div>
        
    </nav>
   </header>
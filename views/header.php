<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $data['page_title'] ?> | <?= WEBSITE_TITLE ?></title>
    <link href="<?= ROOT ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= ROOT ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= ROOT ?>assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= ROOT ?>assets/css/price-range.css" rel="stylesheet">
    <link href="<?= ROOT ?>assets/css/animate.css" rel="stylesheet">
	<link href="<?= ROOT ?>assets/css/main.css" rel="stylesheet">
	<link href="<?= ROOT ?>assets/css/responsive.css" rel="stylesheet">
	<link href="<?= ROOT ?>assets/css/style.css" rel="stylesheet">
	<link href="<?= ROOT ?>assets/css/modal.css" rel="stylesheet">
	<link href="<?= ROOT ?>assets/css/loader.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?= ROOT ?>assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= ROOT ?>assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= ROOT ?>assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= ROOT ?>assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?= ROOT ?>assets/images/favicon.png">
    <style>
    
    </style>
</head><!--/head-->

<body>
	<header id="header" ><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="logo pull-left">
							<a href="<?= ROOT ?>assets/"><strong><h3 style="margin:0;"><img src="<?= ROOT ?>assets/images/logo.png" width="70px"/></a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav" style="padding-bottom:3px;">
								<?php if(isset($_SESSION['user_url'])): ?>
								<li style="margin-top:7px; color:green !important;"><a><i class="fa fa-user"></i> <?= $_SESSION['user_name'] ?></a></li>
								<?php else: ?>
								<li style="margin-top:7px;"><a href="<?= ROOT ?>signup"><i class="fa fa-lock"></i> Signup</a></li>
								<?php endif; ?>

								<?php if(isset($_SESSION['user_url'])): ?>
									<li style="margin-top:7px;"><a href="<?= ROOT ?>logout"><i class="fa fa-lock"></i> Logout</a></li>
								<?php else: ?>

								<li style="margin-top:7px;"><a href="<?= ROOT ?>login"><i class="fa fa-lock"></i> Login</a></li>
								<?php endif; ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		
	</header><!--/header-->
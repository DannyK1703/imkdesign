<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>IMKDesign | Market</title>
	<meta charset="UTF-8">
	<meta name="description" content=" IMKDesign | Market">
	<meta name="keywords" content="IMKDesign | Market">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?= base_url('Assets/css/bootstrap.min.css');?>"/>
	<link rel="stylesheet" href="<?= base_url('Assets/css/font-awesome.min.css');?>"/>
	<link rel="stylesheet" href="<?= base_url('Assets/css/flaticon.css');?>"/>
	<link rel="stylesheet" href="<?= base_url('Assets/css/slicknav.min.css');?>"/>
	<link rel="stylesheet" href="<?= base_url('Assets/css/jquery-ui.min.css');?>"/>
	<link rel="stylesheet" href="<?= base_url('Assets/css/owl.carousel.min.css');?>"/>
	<link rel="stylesheet" href="<?= base_url('Assets/css/animate.css');?>"/>
	<link rel="stylesheet" href="<?= base_url('Assets/css/style.css');?>"/>
    <link rel="stylesheet" href="<?= base_url('Assets/Source/Flaticon/Flaticon/flaticon.css');?>"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
<div class="container-fluid">
	<!-- Page Preloder -->

	<!-- Header section -->
	<header class="header-section fixed-top" >

        <style>
            [class^="flaticon-sh"]:before, [class*=" flaticon-sh"]:before, [class^="flaticon-sh"]:after, [class*=" flaticon-sh"]:after {
                font-family: Flaticon;
                font-size: 180px;
                font-style: normal;
                margin-left: 0px;
                color: #333;
            }
            [class^="flaticon-bag"]:before, [class*="flaticon-bag"]:before, [class^="flaticon-bag"]:after, [class*="flaticon-bag"]:after {
                font-family: Flaticon;
                font-size: 25px;
                font-style: normal;
                margin-left: 0px;
                color: #333;
            }

            [id^="cor"]:before,[id*="cor"]:before,[id^="cor"]:after,[id*="cor"]:after{
                font-family: Flaticon;
                font-size: 30px;
                font-style: normal;
                margin-left: 0px;
                color: #333;
            }
            [class^="flaticon-photo-camera "]:before, [class*="flaticon-photo-camera"]:before, [class^="flaticon-photo-camera"]:after, [class*="flaticon-photo-camera"]:after {
                font-family: Flaticon;
                font-size: 180px;
                font-style: normal;
                margin-left: 0px;
                color: #333;
            }
            [class^="flaticon-monitor "]:before, [class*="flaticon-monitor"]:before, [class^="flaticon-monitor"]:after, [class*="flaticon-monitor"]:after {
                font-family: Flaticon;
                font-size: 180px;
                font-style: normal;
                margin-left: 0px;
                color: #333;
            }
            [class^="flaticon-printer "]:before, [class*="flaticon-printer"]:before, [class^="flaticon-printer"]:after, [class*="flaticon-printer"]:after {
                font-family: Flaticon;
                font-size: 180px;
                font-style: normal;
                margin-left: 0px;
                color: #333;
            }

        </style>
		<nav class="main-navbar " >
			<div class="container">
				
				<ul class="main-menu">
                            <li style="width:7%" id="logo"><a href="<?=site_url('welcome/index');?>" ><img src="<?=base_url('Assets/img/icons/ico1.png');?>" /></a>
							<li><a href="<?=site_url('welcome/index');?>">Accueil</a></li>
							<li><a href="<?=site_url('welcome/categories');?>">Faire du Shopping</a></li>
                            <li><a href="<?=site_url('welcome/services');?>">Services </a></li>
							<li><a href="<?=site_url('welcome/contacts');?>">Nos Contact </a></li>

                            <li><a href="<?=site_url('welcome/about');?>">Apropos de Nous</a></li>
                    <?php

                        if (!isset($_SESSION['pannier'])){
                            $a = 0;
                        }
                        else $a=count($_SESSION['pannier']);


                        echo '<li style="min-width:7%">
                                <a class="shop" href="'.site_url('welcome/pannier'). '" style="background-color: #08bdca59;width: 100%;text-align: center"><div class="shopping-card" >
                                    <i class="flaticon-bag"  style="color: white;"></i>

                                    <span>' .$a.'</span>
                                </div>
                                </a>
                            </li>';?>
					        <li><a href="<?=site_url('welcome/deconnecter')?>">Blog</a></li>
                    <?php if($this->session->is_connected){
                        echo '<button class="btn btn-outline-light my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#exampleModal">
                '.$this->session->pseudo.'</a></button>';

                    } else echo '';
                    ?>

				</ul>
			</div>

        </nav>

        <!-- Modal -->
    
	</header>
    
	<!-- Header section end -->

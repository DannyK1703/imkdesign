<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
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
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-1 text-center text-lg-left">
						<!-- logo -->
						<a href="<?=site_url('welcome/index');?>"class="site-logo">

							<img src="<?= base_url('Assets/img/icons/logo.png');?>" alt="" >

						</a>

					</div>
                    <i class="flaticon-shopping-cart" id="cor"></i>

					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="user-panel">
                    <?php

                        if (!isset($_SESSION['pannier'])){
                            $a = 0;
                        }
                        else $a=count($_SESSION['pannier']);


                            echo '<div class="up-item">
                                <div class="shopping-card">
                                    <i class="flaticon-bag"></i>

                                    <span>'.$a.'</span>
                                </div>
                                <a href="'.site_url('welcome/pannier').'">Shopping Cart</a>
                            </div>';?>
                        </div>
                    </div>

				</div>
			</div>
		</div>
        <style>
            [class^="flaticon-sh"]:before, [class*=" flaticon-sh"]:before, [class^="flaticon-sh"]:after, [class*=" flaticon-sh"]:after {
                font-family: Flaticon;
                font-size: 180px;
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
		<nav class="main-navbar">
			<div class="container">
				 menu 
				<ul class="main-menu">
							<li><a href="<?=site_url('welcome/index');?>">Accueil</a></li>
							<li><a href="<?=site_url('welcome/categories');?>">Faire du Shopping</a></li>
                            <li><a href="<?=site_url('welcome/services');?>">Services </a></li>
							<li><a href="<?=site_url('welcome/contacts');?>">Nos Contact </a></li>

                            <li><a href="<?=site_url('welcome/about');?>">Apropos de Nous</a></li>

					        <li><a href="#">Blog</a></li>
                    <?php if($this->session->is_connected){
                        echo '<button class="btn btn-outline-light my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#exampleModal">
                '.$this->session->pseudo.'</a></button>';

                    } else echo '';
                    ?>

				</ul>
			</div>

        </nav>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->session->pseudo?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table">

                            <tbody>
                            <tr>
                                <th scope="row">Nom :</th>
                                <td><?php echo $this->session->nom?></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone :</th>
                                <td><?php echo $this->session->phone?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email :</th>
                                <td><?php echo $this->session->email?></td>
                            </tr></tbody></table>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger my-2 my-sm-0" >
                            <a style="color: #0000FF" href="<?php echo site_url('welcome/deconnecter');?>">Se Deconnecter</a>
                        </button>
                        <button class="btn btn-outline-success my-2 my-sm-0" >
                            <a style="color: #1b1e21" href="<?php echo site_url('welcome/ModifProfil/'.$this->session->id);?>">Modifier Mes informations</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</header>
	<!-- Header section end -->

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
	
	<link rel="stylesheet" href="<?= base_url('Assets/css/animate.css');?>"/>
	<link rel="stylesheet" href="<?= base_url('Assets/css/style.css');?>"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
    <header>
        <nav class="main-navbar">
            <div class="container">
                menu
                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">

                    <!-- </ul>
                </li>-->
                    <li ><a class="btn btn-bd-download d-none d-lg-inline-block mr-md-3" href="<?=site_url('admin/deconnect');?>">Deconexion</a></li>

                </ul>

            </div>
        </nav>
        <div class="card-group">
            <div class="card col-lg-2  order-lg-1 bg-dark">
                <h2 class="display-4 text-light">Navigation</h2>
                <ul class="nav nav-pills flex-column " style="margin-top:50px;">


                    <button class="btn btn-outline-light btn-lg " type="button" ><li><a href="<?=site_url('admin/index');?>">Home Page</a></li></button>
                    <button class="btn btn-outline-light btn-lg" type="button" ><li><a href="<?=site_url('Admin/categories');?>">Category</a></li></button>
                    <button class="btn btn-outline-light btn-lg" type="button" ><li><a href="<?=site_url('admin/Achat');?>">Cart Page</a></li></button>
                    <button class="btn btn-outline-light btn-lg" type="button" >    <li><a href="<?=site_url('admin/msg');?>">Messages</a></li></button>
                    <button class="btn btn-outline-light btn-lg" type="button" ><li><a href="<?=site_url('admin/services');?>">Services</a></li></button>
                    <button class="btn btn-outline-light btn-lg" type="button" ><li><a href="<?=site_url('admin/equipe');?>">Membres</a></li></button>
                    <button class="btn btn-outline-light btn-lg" type="button" ><li><a href="<?=site_url('admin/partenaires');?>">Partenaires</a></li></button>
                    <!-- </ul>
                    </li>-->
                </ul>
            </div>

    </header>
	<!-- Header section -->




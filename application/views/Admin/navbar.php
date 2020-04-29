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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=site_url('admin/accueil');?>">Home Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('Admin/categories');?>">Category</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="<?=site_url('admin/prodcat');?>">Cart Page</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="<?=site_url('admin/msg');?>">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('admin/service');?>">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('admin/Membres');?>">Membres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('admin/Partenaires');?>">Partenaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('admin/Admins');?>">Admins</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php  $a=$this->session->login;?>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >
                    <a href="<?=site_url('admin/deconnecter');?>"><?=$a?></a></button>
            </form>
        </div>
    </nav>


	<!-- Header section -->




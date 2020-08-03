<!DOCTYPE html>
<html lang="fr">
<head>
	<title>IMKDesign | ADMINISTRATION</title>
	<meta charset="UTF-8">
	<meta name="description" content=" IMKDesign | ADMINISTRATION">
	<meta name="keywords" content="IMKDesign | ADMINISTRATION">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->

    <link href="<?= base_url('Assets/Source/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css')?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('Assets/css/sb-admin-2.min.css')?>" rel="stylesheet">

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
        <nav class="main-navbar" style="background-color: rgba(36,36,12,0.96);">
            <div class="container">

                <ul class="main-menu">
                <li >
                    <a class="nav-link" href="<?=site_url('admin/accueil');?>">Home Page</a>
                </li>
                <li >
                    <a class="nav-link" href="<?=site_url('Admin/categories');?>">Category</a>
                </li>

                <li >

                    <a class="nav-link" href="<?=site_url('admin/msg');?>">Messages</a>
                </li>
                <li >
                    <a class="nav-link" href="<?=site_url('admin/service');?>">Services</a>
                </li>
                <li >
                    <a class="nav-link" href="<?=site_url('admin/Membres');?>">Membres</a>
                </li>
                <li >
                    <a class="nav-link" href="<?=site_url('admin/Partenaires');?>">Partenaires</a>
                </li>
                <li >
                    <a class="nav-link" href="<?=site_url('admin/Admins');?>">Admins</a>
                </li>


                <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal">
                    <?php echo $this->session->login?>
                </button>

                </ul>

            </div>
        </nav>
        <div class="modal" id="exampleModal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->session->login?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">

                            <tbody>
                            <tr>

                                <td><img style="width: 70% ;margin-left: 50%" src="<?php echo base_url('Assets/images/Admins/'.$this->session->img) ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row">Nom :</th>
                                <td><?php echo $this->session->nom?></td>
                            </tr>

                            <tr>
                                <th scope="row">Email :</th>
                                <td><?php echo $this->session->email?></td>
                            </tr></tbody></table>
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-success"><a  href="<?=site_url('admin/modifierAdmin/'.$this->session->id);?>">Modifier Infos </a></button>
                        <button class="btn btn-primary" ><a href="<?=site_url('admin/deconnecter');?>" style="color: #a9fd00">Se Deconnecter</a></button>

                    </div>
                </div>
            </div>
        </div>

    </header>






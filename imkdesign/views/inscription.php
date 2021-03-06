<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>IMKDesign | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" IMKDesign | eCommerce Template">
	<meta name="keywords" content="IMKDesign, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="<?=base_url('Assets/img/favicon.ico');?>" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=base_url('Assets/css/bootstrap.min.css');?>"/>
	<link rel="stylesheet" href="<?=base_url('Assets/css/font-awesome.min.css');?>"/>
	<link rel="stylesheet" href="<?=base_url('Assets/css/flaticon.css');?>"/>
	<link rel="stylesheet" href="<?=base_url('Assets/css/slicknav.min.css');?>"/>
	<link rel="stylesheet" href="<?=base_url('Assets/css/jquery-ui.min.css');?>"/>
	<link rel="stylesheet" href="<?=base_url('Assets/css/owl.carousel.min.css');?>"/>
	<link rel="stylesheet" href="<?=base_url('Assets/css/animate.css');?>"/>
	<link rel="stylesheet" href="<?=base_url('Assets/css/style.css');?>"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

<!-- Page Preloder -->


<!-- Header section -->
<div class="container justify-content-right">
    <!-- Header section -->
    <div class="page-top-info">
        <div class="container">
            <h4>Inscription</h4>
            <div class="site-pagination">
                <button class="btn btn-light "><a href="<?=  site_url('welcome/index');?>">RETOUR A L'ACCUEIL</a></button> /
                <a href="">INSCRIPTION</a>

            </div>
        </div>
    </div>



    <section class="contact-info" style="margin-left: 15%;margin-right: 15%;">
        <button class="btn btn-link btn-lg btn-block"><img src="<?= base_url('Assets/img/icons/l3.png');?>" style="max-width: 200px"/></button>
        <div class="" style="font-size: 40px">
            <h4 class="alert alert-danger" style="text-align: center"><?= $msg?></h4>
            <form class="contact-form" method="post" action="<?=  site_url('welcome/inscript');?>">
                <input type="text" name="nom" value="<?php echo set_value('nom')?>" placeholder="Your name">
                    <h5><?php echo form_error('nom','<em>','</em>') ?></h5>
                <input type="text" name="login" value="<?php echo set_value('login')?>" placeholder="Your Login">
                    <h5><?php echo form_error('login','<em>','</em>') ?></h5>
                <input type="email" name="email" value="<?php echo set_value('email')?>" placeholder="Your Email">
                    <h5><?php echo form_error('email','<em>','</em>') ?></h5>
                <input type="text" name="adresse" value="<?php echo set_value('adresse')?>" placeholder="Your Physic Adresse">
                    <h5><?php echo form_error('adresse','<em>','</em>') ?></h5>
                <input type="text" name="phone" value="<?php echo set_value('phone')?>" placeholder="Your Phone Number">
                    <h5><?php echo form_error('phone','<em>','</em>') ?></h5>
                <input type="password" name="pwd"  placeholder="Password">
                    <h5><?php echo form_error('pwd','<em>','</em>') ?></h5>
                <input type="password" name="cpwd"  placeholder="Confirm Password">
                    <h5><?php echo form_error('cpwd','<em>','</em>') ?></h5>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                <button type="submit" class="site-btn submit-order-btn">S'inscrire</button>
            </form>
            <div class="up-item">
                <button class="btn btn-link btn-lg btn-block"><i class="flaticon-profile"></i>
                    <a href="<?=site_url('welcome/connexion');?>">Se Connecter</a></button>
            </div>
        </div>
    </section>
                                
      
        
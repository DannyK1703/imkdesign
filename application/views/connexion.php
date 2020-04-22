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

<div class="container justify-content-right">
                <!-- Header section -->
    <div class="page-top-info">
        <div class="container">
            <h4>Connexion</h4>
            <div class="site-pagination">
                <button class="btn btn-light "><a href="<?=  site_url('welcome/index');?>">RETOUR A L'ACCUEIL</a></button> /
                <a href="">CONNEXION</a>
            </div>
        </div>
    </div>



            <section class="contact-info" style="margin-left: 15%;margin-right: 15%;">
                <button class="btn btn-link btn-lg btn-block"><img src="<?= base_url('Assets/img/icons/l3.png');?>" style="max-width: 200px"/></button>
                <div class="" style="font-size: 40px">
                    <form class="contact-form" mathod="post" action="">
                        <input type="text" name="login" placeholder="Your Login"style="height: 80px;font-size: 20px">
                        <input type="password" name="pwd" placeholder="Password"style="height: 80px;font-size: 20px">
                        <button class="site-btn submit-order-btn">Connexion</button>
                        <button class="btn btn-link btn-lg btn-block"><i class="flaticon-profile"></i><a href="<?=site_url('welcome/inscription');?>">S'Inscrire</a></button>
                    </form>
                </div>
            </section>

</body>
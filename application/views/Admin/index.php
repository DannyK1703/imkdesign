
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
<div class="container align-middle" style="margin-top:10%;">
<div class="card text-center align-middle" >
<form method="post" action="<?php echo site_url('admin/autentification/');?>">
<div class="card-header bg-dark">
    <label for="colFormLabelLg " class="col-sm-3 col-form-label col-form-label-lg text-info" style="font-size: 30px"><i style="font-size: 50px" class="flaticon-rocket-launch"></i>Authetification</label>
  </div>
  <div class="card-body">

      <div class="form-group row" style="margin-top:5%;">

          <label for="exampleInputEmail3" class="col-sm-2 col-form-label"><i class="flaticon-profile" style="font-size: 50px"></i></label>
          <div class="col-sm-10">
              <input type="text" value="<?php echo set_value('login')?>" name="login" class="form-control form-control-lg" id="exampleInputEmail4" aria-describedby="emailHelp" style="height: 75px; width: 60%;" placeholder="Login" required>

          </div>
          <label for="exampleInputEmail3" class="col-sm-2 col-form-label"><em><?php echo form_error('login')?></em></label>
      </div>
      <div class="form-group row" style="margin-top:5%;">
          <label for="exampleInputPassword3" class="col-sm-2 col-form-label"><i style="font-size: 50px" class="flaticon-unlock"></i></label>
          <div class="col-sm-10">
              <input type="password" value="<?php echo set_value('pwd')?>" name="pwd" class="form-control form-control-lg" id="exampleInputPassword3" placeholder="Password" style="height: 75px; width: 60%;">

          </div>
          <label for="exampleInputEmail3" class="col-sm-2 col-form-label"><em><?php echo form_error('login')?></em></label>
      </div>



  </div>
  <div class="card-footer text-muted bg-dark" >
  	<button type="submit" class="btn btn-outline-info btn-lg btn-block" style="max-width:70%; margin-left:15%"><i style="font-size: 30px" class="flaticon-correct"></i>Submit</button>
  </div>

</form>
</div> 
</div>
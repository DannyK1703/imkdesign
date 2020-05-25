


	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="<?=base_url('Assets/img/b2.jpg');?>">

            </div>
            <?php
            foreach ($produits as $prod){
                if($prod->etat=='promotion' || $prod->etat=='arrivage'){
                    echo'<div class="hs-item set-bg" data-setbg="'.base_url('Assets/img/product/'.$prod->imgArticle).'">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>'.$prod->etat.'</span><h2>'.$prod->NomArticle.'</h2><p>'.$prod->DescArticle.'</p> 
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$'.$prod->PrixArticle.'</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>';
                }
                else{
                    continue;
                }
               echo' <div class="hs-item set-bg" data-setbg="'.base_url('Assets/img/b8.jpg').'">
				
			</div>';

            }
            ?>
            
            <div class="hs-item set-bg" data-setbg="<?=base_url('Assets/img/b3.jpg');?>">

            </div>
            <div class="hs-item set-bg" data-setbg="<?=base_url('Assets/img/b5.jpg');?>">

            </div>


		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="<?=base_url('Assets/img/icons/1.png');?>" alt="#">
						</div>
						<h2>Fast Secure Payments</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="<?=base_url('Assets/img/icons/2.png');?>" alt="#">
						</div>
						<h2>Premium Products</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="<?=base_url('Assets/mg/icons/3.png');?>" alt="#">
						</div>
						<h2>Free & fast Delivery</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->
    <div class="section-title">
        <h2>SERVICES</h2>
    </div
	<div class="container" style="">

		<div class="row mb100">


			<div class="col-sm-4 wow fadeIn" data-wow-delay="0.2s">
				<div class="icon-box-1 match-height mb30">
					<p>______________________________________</p>
					<i class="flaticon-shutter" ></i>
					<div class="content-area">
						<h3 class="title">Web Design</h3>
						<div class="content">Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong.</div>
					</div>
				</div>
			</div>
            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.2s">
                <div class="icon-box-1 match-height mb30">
                    <p>______________________________________</p>
                    <i class="flaticon-photo-camera" ></i>
                    <div class="content-area">
                        <h3 class="title">Web Design</h3>
                        <div class="content">Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong.</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.2s">
                <div class="icon-box-1 match-height mb30">
                    <p>______________________________________</p>
                    <i class="flaticon-shopping-cart" ></i>
                    <div class="content-area">
                        <h3 class="title">Web Design</h3>
                        <div class="content">Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong.</div>
                    </div>
                </div>
            </div>
		</div>
	</div>

	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
                <?php
                foreach ($produits as $pro){
                    if($pro->etat=='promotion'){
                    echo '<div class="product-item">
					<div class="pi-pic">
					    <div class="tag-new">New</div>
						<img src="'.base_url('Assets/img/product/'.$pro->imgArticle).'">
						<div class="pi-links">
							<a href="" class="add-card" style="background-color: greenyellow"><i class="flaticon-visible"></i><span>Voir Aricle</span></a>
							
						</div>
					</div>
					<div class="pi-text">
						<h6>'.$pro->PrixArticle.'</h6>
						<p>'.$pro->NomArticle .'</p>
					</div>
				';
                }}?>


            </div>
		</div>
	</section>
	

	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="<?=base_url('Assets/img/banner-bg.jpg');?>">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h2>STRIPED SHIRTS</h2>
				<a href="#" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->

<?php //include_once('footer.php');?>
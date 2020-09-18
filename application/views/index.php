


	<!-- Hero section -->

	<section class="hero-section">
		<div class="hero-slider owl-carousel">

            <?php
            foreach ($produits as $prod){
                if($prod->etat=='promotion' || $prod->etat=='arrivage'){
                    echo'<div class="hs-item set-bg" data-setbg="'.base_url('Assets/img/product/'.$prod->imgArticle).'">
				<div class="container">
					<div class="row">
						<div class="col-xl-5 col-lg-3 text-white">
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

    <div class="container">
		<div class="row " style="margin-left: 15%;margin-right: 15%">


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
                    <i class="flaticon-shopping-cart" STYLE="font-size: 180px"></i>
                    <div class="content-area">
                        <h3 class="title">Web Design</h3>
                        <div class="content">Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong.</div>
                    </div>
                </div>
            </div>
		</div>
	</div>
    </div>
	<!-- letest product section -->
    <section class="top-letest-product-section">
        <div class="container-fluid">
            <div class="section-title">
                <h2>Nos Produits</h2>
            </div>
            <div class="col-lg-12  order-1 order-lg-2 mb-4 mb-lg-0" >
                <div class="row">
                    <?php

                        foreach ($produits as $pro){

                            //if($pro->idArticles && ($pro->etat=='Promotion' || $pro->etat=='Arrivage') ){
                                echo'
                                <div class="product" style="margin:1.5%; position:relative; height: 600px;"  >
                                    
                                     
                                    <img class="img-fluid" src="'.base_url('Assets/img/product/'.$pro->imgArticle).'" alt="Colorlib Template" style="width: 100%;height:60%">
                                    
                                    <div class="text py-3 px-7" style="height: 100%">
                                       
                                        
                                        <div class=" product-details" style="height: 30%">
  
                                    
                                            <h3 class="p-price" >$'.$pro->PrixArticle .'</h3>
            
                                        			<form method="post" action="'.site_url('welcome/AddtoCard/').'">
                                                            <div class="fw-size-chooses">
                                                                <p>Taille</p>
                                                                
                                                                ';
                                                              foreach ($taille as $t){

                                                                    echo '<div class="sc-item">
                                                                            <input type="radio" name="size" id="'.$t->desc.'-size" value="'.$t->desc.'" placeholder="dcb" />
                                                                            <label for="'.$t->desc.'-size">'.$t->num.'</label>
                                                                          </div>';
                                                                }

                                                                echo '
                                                            </div>
                                                            <div class="quantity">
                                                                <p>Quantité</p>
                                                                <div class="pro-qty"><input type="text" name="qte" value="1"></div>
                                                                <input type="hidden" name="id" value="'.$prod->idArticles.'">
                                                            </div>
                                                            <input type="radio" name="size" id="SD" value="FDCFD" >
                                                                            <label for="SD">UII</label>
                                                                            <input type="radio" name="size" id="SD" value="FDCFD" >
                                                                            <label for="SD">UII</label>
                                                            <input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'"/>
                                                      
                                                            <input type="submit" value="acheter" class="btn btn-outline-danger" >
					                                </form>
					                                </div>
					                                </div>
					                    </div>';
                            //}
                        }
                        ?>
                </div>




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
    <div class="section-title">
        <h2>PARTENAIRES</h2>
    </div
<section>

    <div class="card-deck pagination justify-content-center" style="height: 250px;width: 96%;margin: 2% ;background-color: #383d41; text-align: center">
        <?php foreach ($partu as $part){
        echo' <div class="card" style="max-width: 7%;max-height: 50%;margin-top: 27px">
            <img src="'.base_url('Assets/images/part/'.$part->imagePartenaires).'" class="card-img-top" alt="..." >
            
        </div>';}?>

    </div>
	<!-- Banner section end  -->
</section>

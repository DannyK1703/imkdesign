

<section >
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

	<section class="ftco-section ftco-no-pb ftco-no-pt bg-light mt-5">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= base_url('Assets/img/b7.jpg')?>);">
						<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate fadeInUp ftco-animated">
	          <div class="heading-section-bold mb-5 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">About <br>IMK <br> <span>DESIGN</span></h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
							<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
							<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
<section class="my-5">
<div class="container">
  <h2 class="h1-responsive font-weight-bold text-center my-5">Nos Services</h2>
 
  <p class="lead grey-text text-center w-responsive mx-auto mb-5">Nous mettons a la disposition des nos clients notre expertise tout en vous assurant une qualité des services hors paire dans les domaines suivants:</p>

  <div class="row">

    <div class="col-md-4">

      <div class="row mb-3">

        <div class="col-2">
          <i class="fas fa-2x fa-flag-checkered deep-purple-text"></i>
        </div>
        
        <div class="col-10">
          <h5 class="font-weight-bold mb-3">Design</h5>
          <p class="grey-text">Design Graphique<br/>Creation des Sites Web</br> </p>
        </div>
       
      </div>
      
      <div class="row mb-3">

        <div class="col-2">
          <i class="fas fa-2x fa-flask deep-purple-text"></i>
        </div>
        
        <div class="col-10">
          <h5 class="font-weight-bold mb-3">Multimedia</h5>
          <p class="grey-text">Communication Visuelle<br/>Impression Digitale</p>
        </div>
        
      </div>
      
      <div class="row mb-md-0 mb-3">

        <div class="col-2">
          <i class="fas fa-2x fa-glass-martini deep-purple-text"></i>
        </div>
        
        <div class="col-10">
          <h5 class="font-weight-bold mb-3">Librarie</h5>
          <p class="grey-text mb-md-0">Cahier registres en pagne<br/>
Notebooks personnalisées</p>
        </div>
        
      </div>
      
    </div>
    
    <div class="col-md-4 text-center">
      
    </div>
    
    <div class="col-md-4">

      <div class="row mb-3">

        <div class="col-2">
          <i class="far fa-2x fa-heart deep-purple-text"></i>
        </div>
        
        <div class="col-10">
          <h5 class="font-weight-bold mb-3">Alimentaire</h5>
          <p class="grey-text">Ventes des OEufs et Viandes<br/>Pattiserie</p>
        </div>
        
      </div>
      
      <div class="row mb-3">

        <div class="col-2">
          <i class="fas fa-2x fa-bolt deep-purple-text"></i>
        </div>
        
        <div class="col-10">
          <h5 class="font-weight-bold mb-3">Vestimentaire</h5>
          <p class="grey-text">Ventes des T-Shirt<br/>Pull<br/> Robes et Blouses en Pagne</p>
        </div>
        
      </div>
     
    </div>
    
  </div>
</div>
</section>
<div class="card card-image"
    style="background-image: url(<?= base_url('Assets/img/bi2.png')?>); height:600px;background-width:100%;background-attachment:fixed; background-repeat:no-repeat;">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4" style="height:100%">
      <div class="py-5">

        <!-- Content -->
        <h1 class="card-title h1" style="margin-top:10%;font-size:72px;">La qualité est notre particularité</h1>

      </div>
    </div>
  </div>
<section class="text-center my-5">
			<div class="container">
				<!-- Section heading -->
				<h2 class="h1-responsive font-weight-bold text-center my-5">Nos Produits</h2>
				<!-- Section description -->
				<p class="grey-text text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur
				adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas
				nostrum quisquam eum porro a pariatur veniam.</p>

				<!-- Grid row -->
				<div class="row">
				<?php
                        $i=0;
                        foreach ($produits as $pro){

				
							echo'<div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style=" position:relative; height: 600px;width: 20%;">
								<!-- Card -->
								<div class="card align-items-center">
								<!-- Card image -->
								<div class="view overlay">
								<a href="'.site_url('welcome/SingleArt/'.$pro->idArticles).'"><img src="'.base_url('Assets/img/product/'.$pro->imgArticle).'" class="card-img-top"
									alt="" style="position:relative;max-height: 300px;min-height: 300px;"></a>
									<a>
									<div class="mask rgba-white-slight"></div>
									</a>
								</div>
								<!-- Card image -->
								<!-- Card content -->
								<div class="card-body text-center">
									<!-- Category & Title -->
									<a href="" class="grey-text">
									<h5>'.$pro->NomArticle.'</h5>
									</a>
									<h5>
									<strong>
										<a href="'.site_url('welcome/SingleArt/'.$pro->idArticles).'" class="dark-grey-text">
										<span class="badge badge-pill danger-color">'.$pro->etat.'</span>
										</a>
									</strong>
									</h5>
									<h4 class="font-weight-bold blue-text">
									<strong>'.$pro->PrixArticle .' $</strong>
									</h4>
								</div>
								<!-- Card content -->
								</div>
								<!-- Card -->
							</div>';
							if($i>=3){
							break;
							}
							$i=$i+1;}
							?>

			</div>
 
		</div>
</section>

            
	</section>
	

	<!-- Banner section -->

	
    <div class="section-title">
        <h2>PARTENAIRES</h2>
    </div
<section>

    <div class="card-deck pagination justify-content-center" style="width: 96%;margin: 2% ;background: #000003c5; text-align: center">
        <?php foreach ($partu as $part){
        echo' <div class="card" style="max-width: 7%;max-height: 50%;margin-top: 27px;margin-bottom: 27px">
            <a href="'.$part->WebPartenaires.'"><img src="'.base_url('Assets/images/part/'.$part->imagePartenaires).'" class="card-img-top" alt="..." >
            </a>
        </div>';}?>

    </div>
	<!-- Banner section end  -->
</section>

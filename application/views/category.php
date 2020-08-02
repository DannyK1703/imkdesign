

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Notre Magasin</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row" style="margin: none;">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">

                            <?php
                            foreach ($categ as $a){
                                echo '<li><a href="'.site_url('welcome/CatProd/'.$a->idcategorie).'">'.$a->nomCategorie.'</a></li>';

                            }
                            ?>
						</ul>
					</div>

				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
                        <?php

                        foreach ($produits as $prod){
                            echo '
						<div class="col-lg-4 col-sm-6">
							<div class="product-item" style="margin: 0px;">
								<div class="pi-pic">
									<div class="tag-sale">'.$prod->etat.'</div>
									<img style="max-height: 350px;min-height: 350px;min-width: 100%;" src="'.base_url('Assets/img/product/'.$prod->imgArticle).'" alt="">
									<div class="pi-links">
										
										<a href="'.site_url('welcome/SingleArt/'.$prod->idArticles).'" class="add-card" style="background-color: #a9fd00"><i class="flaticon-visible"></i><span>Acheter</span></a>
									</div>
								</div>
								<div class="pi-text">';

                                          echo'  <h6>'.$prod->PrixArticle.'$</h6>
                                        <p>'.$prod->NomArticle.'</p>
                                        
                                        </div>
							</div>
						</div>';


                                    }?>


				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->



	<!-- Page info -->
	<div class="page-top-info">
		<div class="container"style="margin-top: 100px">
			<h4>Voir Article</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="<?=site_url('welcome/categories');?>"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="<?= base_url('Assets/img/product/'.$prod->imgArticle);?>" alt="" style="height: 600px">
					</div>

				</div>
                <?php

                echo'
				<div class="col-lg-6 product-details">
					<h2 class="p-title">'.$prod->NomArticle.'</h2>
					<h3 class="p-price">'.$prod->PrixArticle.'$</h3>
					<h4 class="p-stock">Available: <span>'.$prod->etat.'</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						
					</div>
					<form method="post" action="'.site_url('welcome/AddtoCard/').'">
                        <div class="fw-size-choose">
                            <p>Taille</p>
                            ';
                            foreach ($taille as $t){

                                echo '<div class="sc-item">
                                <input type="radio" id="'.$t->desc.'-size" name="size"  value="'.$t->desc.'" >
                                <label for="'.$t->desc.'-size">'.$t->num.'</label>
                                
                            </div>';
                            }

                        echo '</div>
                        <div class="quantity">
                            <p>Quantité</p>
                            <div class="pro-qty"><input type="text" name="qte" value="1"></div>
                            <input type="hidden" name="id" value="'.$prod->idArticles.'">
                        </div>
                        <input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'"/>
                  
                        <input type="submit" value="acheter" class="btn btn-outline-danger" >
					</form>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>'.$prod->DescArticle.' </p>
								</div>
							</div>
						</div>
						
					</div>
					
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>';

?>
	<!-- RELATED PRODUCTS section -->

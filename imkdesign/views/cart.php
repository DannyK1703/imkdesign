
	<!-- Page info -->
	<div class="page-top-info" style="margin-top: 100px">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Product</th>
                                    <th class="size-th">Prix U</th>
									<th class="size-th">Quantity</th>
									<th class="size-th">SizeSize</th>
									<th class="total-th">Price</th>
                                    <th class="actions-th">Supprimer</th>
								</tr>
							</thead>
							<tbody>
                            <?php $som=0; foreach ($this->session->pannier as $prods){

                                echo '<tr>
									<td class="product-col">
										<img src="'.base_url('Assets/img/product/'.$prods[0][0]->imgArticle).'" alt="">
										<div class="pc-title">
										
											
											
										</div>
									</td>
									<td class="size-col">
									        <h4>'.$prods[0][0]->PrixArticle.'</h4>
</td>
									<td class="size-col">
										
												<h4>'.$prods[3].'</h4>
											
									</td>
									<td class="size-col"><h4>'.$prods[2].'</h4></td>
									<td class="total-col"><h4>'.$prods[0][0]->PrixArticle*$prods[3].'</h4></td>
									<td class="actions-col"><a href="'.site_url('welcome/suppToPan/'.$prods[1]).'" style="margin-left: 30px;">  <i class="flaticon-cancel"></i></a></td>
									
								</tr>';
										$som+=$prods[0][0]->PrixArticle*$prods[3];

                            }


							echo '</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total <span>$'.$som.'</span></h6>
						</div>';?>
					</div>
				</div>
				<div class="col-lg-4 card-right">

					<a href="<?php echo site_url('welcome/factures')?>" class="site-btn">Proceed to checkout</a>
					</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
    <section class="top-letest-product-section">
        <div class="container">
            <div class="section-title">
                <h2>OONTINUE SHOPPING</h2>
            </div>
            <div class="product-slider owl-carousel">
                <?php

                    foreach ($produits as $pro){


                            echo '<div class="product-item">
					<div class="pi-pic">
					    <div class="tag-new">'.$pro->etat.'</div>
						<img src="'.base_url('Assets/img/product/'.$pro->imgArticle).'">
						<div class="pi-links">
							<a href="'.site_url('welcome/SingleArt/'.$pro->idArticles).'" class="add-card" style="background-color: #a9fd00"><i class="flaticon-visible"></i><span>Voir Aricle</span></a>
							
						</div>
					</div>
					<div class="pi-text">
						<h6>'.$pro->PrixArticle.'</h6>
						<p>'.$pro->NomArticle .'</p>
					</div></div>
				';
                        }?>



            </div>
        </div>
    </section>

    <!-- Related product section end -->

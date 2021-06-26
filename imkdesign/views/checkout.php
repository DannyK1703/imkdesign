

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
    <section class="cart-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="cart-table">
                        <img src="<?=base_url('Assets/img/icons/l1.png');?>" alt=""style="height: 80px; margin-left: 40%">
                        <h4>Facture de :<small><?= $this->session->nom;?></small></h4><br/>
                        <div class="cart-table-warp">

                            <table>
                                <thead>

                                </thead>
                                <tbody>


                                <?php
                                    $som=0;
                                    foreach ($this->session->pannier as $prod){

                                        echo '<tr>
                                    <td><h6>'.$prod[0][0]->NomArticle.'</h6></td>
                                    <td><p>$'.$prod[0][0]->PrixArticle*$prod[3].'</p></td>
                                </tr>';
                                        $som+=$prod[0][0]->PrixArticle*$prod[3];}

                                ?>
                                </tbody>
                            </table></div>
                        <div class="total-cost">


                            <h6>Total<span>$<?=$som?></span></h6><br/>
                            <h6>Shipping<span>free</span></h6><br/>
                            <h6>Total<span>$<?=$som?></span></h6>
                        </div>
                    </div>
                </div>
            </div>


    </section>

	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form">
						<div class="cf-title">Payer Avec :</div>
						<ul class="payment-list">
							<li><a href="<?= site_url('Welcome/deconnecter')?>"><img src="img/paypal.png" alt="">Paypal</a></li>
							<li><a href="<?= site_url('Welcome/deconnecter')?>"><img src="img/mastercart.png" alt="">Credit / Debit card</a></li>
                            <li><a href="<?= site_url('Welcome/deconnecter')?>"><img src="img/paypal.png" alt="">MPesa</a></li>
							<li>Pay when you get the package</li>
						</ul>

					</form>
				</div>
            </div>
        </div>
    </section>


	<!-- checkout section end -->

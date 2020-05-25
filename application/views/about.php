
<div class="page-top-info">
    <div class="container">
        <h4>Apropos de Nous</h4>
        <div class="site-pagination">
            <a href="">Home</a> /
            <a href="">Apropos</a>
        </div>
    </div>
</div>
<section class="related-product-section spad">
    <div class="container">
        <div class="section-title">
            <h2>Mot sur nous</h2>
        </div>
    <div class="row">

    </div></div></section>
    <section class="related-product-section spad">
        <div class="container">
            <div class="section-title">
                <h2>Our Team</h2>
            </div>

            <div class="row">
                <?php
                foreach ($membres as $mbr){
                    echo '<div class="col-lg-4 col-sm-6" >
					<div class="product-item">
						<div class="pi-pic" >
							
							<img style=";min-height: 400px ;max-height: 400px ;min-width: 100%" src="'.base_url('Assets/images/membres/'.$mbr->imgMembre).'" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="fa fa-facebook"></i><span>Facebook</span></a>
								<a href="#" class="add-card"><i class="fa fa-envelope"></i><span>Email</span></a>
							</div>
						</div>
						<div class="pi-text">
							<h5>'.$mbr->NomMembre.'</h5>
							<p>'.$mbr->DescMembre.'</p>
						</div>
					</div>
				</div>';
                }
                ?>


            </div>
        </div>
    </section>



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
        <p style="text-align: justify"><strong>IMK Design est une entreprise qui a vu le jour en  le 12 Décembre 2018 à Lubumbashi-RDC. Nous sommes une entreprise qui œuvre principalement dans le domaine du Design et Multimédia mais grâce à nos différents partenaires, nous nous sommes élargis en offrant des services dans des domaines tels que l’agro-alimentaire.
                Il faut noter que nous ne nous limitons pas uniquement à la vente de nos articles mais nous sommes également une entreprise qui œuvre dans le social sous le nom d’IMK ONG avec comme objectif premier de pouvoir parrainer au moins un enfant de la rue par an grâce à vos achats des T-shirt de la marque IMK.
            </strong></p>
    </div></div></section>
    <section class="related-product-section spad">
        <div class="container">
            <div class="section-title">
                <h2>Our Team</h2>
            </div>

            <div class="row">
                <?php
                foreach ($membres as $mbr){
                    echo '<div class="col-lg-4 col-sm-6"  >
					<div class="product-item" >
						<div class="pi-pic" >
							
							<img style=";min-height: 400px ;max-height: 400px ;min-width: 100%" src="'.base_url('Assets/images/membres/'.$mbr->imgMembre).'" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="fa fa-facebook"></i><span>Facebook</span></a>
								<a href="#" class="add-card"><i class="fa fa-envelope"></i><span>Email</span></a>
								<a href="#" class="add-card"><i class="fa fa-whatsapp"></i><span>Whatsapp</span></a>
								<a href="#" class="add-card"><i class="fa fa-telegram"></i><span>Telegram</span></a>
								<a href="#" class="add-card"><i class="fa fa-phone"></i><span>Number</span></a>
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


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rapport Mensuel des Achats par Qantité</h6>
    </div>
    <div class="card-body">
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <?php
                    $max=0;

                    foreach ($Articles as $cat){
                        if( $cat['qte']>$max){
                            $max=$cat['qte'];
                        }
                    }

                    foreach ($Articles as $categ){

                        $nom=$categ['nomArt'];$prix=$categ['prix'];$id=$categ['idArt'];$qte=$categ['qte'];
                        if ( $categ['qte']==$max){
                            $color='bg-success';
                            $pro=100;

                        }
                        else if( $categ['qte']>=($max*80)/100){
                            $color='bg-info';
                            $pro=( $categ['qte']*100)/$max;

                        }
                        else if( $categ['qte']>=($max*60)/100){
                            $color='';
                            $pro=( $categ['qte']*100)/$max;
                        }
                        else if( $categ['qte']>=($max*40)/100){
                            $color='bg-warning';
                            $pro=( $categ['qte']*100)/$max;
                        }
                        else if( $categ['qte']>=($max*20)/100){
                            $color='bg-danger';
                            $pro=( $categ['qte']*100)/$max;
                        }
                        else if( $categ['qte']>=($max*0)/100){
                            $color='bg-dark';
                            $pro=( $categ['qte']*100)/$max;
                        }
                        echo '<h4 class=" font-weight-bold">'.$nom.'  Qte: '.$qte.'  "<small>Prix: '.$prix.'$" </small>  <span class="float-right">'.$pro.'%</span> </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar '.$color.'" role="progressbar" style="width: '.$pro.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>';
                    }
                    include('footer.php'); ?>
                <a

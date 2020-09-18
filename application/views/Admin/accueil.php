
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) --

            <!-- Topbar Navbar -->
                <!-- Nav Item - Alerts -->

                <!-- Nav Item - User Information -->

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                 </div>

            <!-- Content Row -->
            <div class="row">
                <?php
                    $prix_mois=0;
                    $prix_annee=0;
                    $prix_jour=0;
                    $qte=0;
                    foreach ($Achat as $prix){
                    $t = explode('-', $prix->date);

                    if($t[1] == date('m') and $t[0]== date('Y')){
                        $prix_mois+=$prix->prix;
                    }
                    if ($t[0] ==date('Y')){
                        $prix_annee+=$prix->prix;
                    }
                        $d=explode(' ',$t[2]);
                    if($t[1] == date('m') and $t[0]== date('Y')and $d[0]==date('d')){
                        $prix_jour+=$prix->prix;
                        $qte+=$prix->qte;


                    }
                       
                }
                    ;?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">

                            <a href="<?= site_url('admin/achat_mensuel')?>">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Achats Mensuels</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?=$prix_mois?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <a href="<?= site_url('admin/achat_annuel')?>">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Achats Annuels</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?=$prix_annee?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="<?= site_url('admin/achat_journalier')?>"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Achats Journaliers</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">$<?=$prix_jour?></div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">  Articles Achetés:
                                                <?=$qte?>
                                                 </div>
                                        </div>
                                    </div></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <a href=""> <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Messages Non Lus </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div></a>
                            </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                        <?php
        $max=0;
        foreach ($categories as $cat){
            if( $cat['qte']>$max){
                $max=$cat['qte'];
            }
        }
        foreach ($categories as $categ){

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
            echo '<h4 class="small font-weight-bold">'.$categ['nom'].' <span class="float-right">'.$pro.'%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar '.$color.'" role="progressbar" style="width: '.$pro.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>';
        }
    ?>




                        </div>
                    </div>

                    <!-- Color System -->

                </div>


            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->


</div>

<?php include('footer.php');?>
<?php
    session_start();
    $title = "facture";
    ob_start();
?>
<script type="text/javascript" src="public/js/jquery-barcode.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<style>
    html,
    body,
    header,
    #intro-section {
        height: 40%;
    }
    .navbar:not(.top-nav-collapse) {
        background: #3f9b2c!important;
    }
    .pt-3-half {
        padding-top: 1.4rem;
    }
</style>
</header>
<script>
    function generateBarcode()
    {
        var value = "188085296";
        var btype = "ean8";
        var renderer = "css"// "bmp";
        var settings = {
            output:renderer,
            bgColor: "#FFFFFF",
            color: "#7e57c2",
            barWidth: "1",
            barHeight: "50",
            moduleSize: "5",
            posX: "10",
            posY: "20",
            addQuietZone: "1"
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
            value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
            clearCanvas();
            $(".barcodeTarget").hide();
            $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
            $("#canvasTarget").hide();
            $(".barcodeTarget").html("").show().barcode(value, btype, settings);
        }
    }
            
    function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
    }

    function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
    }
               
    function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
    }
</script>
<?php
    $connexion = get_connexion();
    $req = $connexion->prepare("SELECT * FROM client INNER JOIN reservations 
                                ON client.idClient = reservations.id_client INNER JOIN infos 
                                ON reservations.idReservation = infos.id_reservation INNER JOIN salles
                                ON infos.id_salle = salles.idSalle WHERE client.idClient = :id");
    $req->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    $services = $connexion->prepare("SELECT * FROM services INNER JOIN operations
                                ON services.id_service = operations.id_service INNER JOIN reservations 
                                ON operations.id_reservation = reservations.idReservation WHERE reservations.idReservation = :id");
    $services->bindValue(":id", $data['idReservation'], PDO::PARAM_INT);
    $services->execute();
    


    $duree = (int)countDown($data['date_debut'], $data['date_fin']);
    $personnes = (int)$data['personnes'];
    $prix_salle = (int)$data['prix'] * $duree;

    $total = 0;
    $grand_total = 0;
?>
<div class="container justify-content-center">
    <?php
        require_once "includes/breadcump.php";
    ?>
    <!-- Card -->
    <div class="card weather-card PrintArea justify-content-center col-sm-8">
        <!-- Card content -->
        <div class="card-body pb-3">
            <div class="view overlay" style="background-color : #000">
                <img class="card-img-top" src="public/img/entete.png" alt="Card image cap" width="190" height="250">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <!-- Title -->
            <h1 class="card-title font-weight-bold">Facture</h4>
            <!-- Text -->
            <p class="card-text">Client : <?=$data['nomClient']?></p>
            <p class="card-text">Telephone : <?=$data['telClient']?></p>
            <p class="card-text">
                Reserve la salle  <?=$data['designation']?> pour un(e) <?=$data['Evenement']?> 
                en date du <?=$data['date_debut']?> au  <?=$data['date_fin']?> soit <?= countDown($data['date_debut'], $data['date_fin'])?> jours
            </p>
            <div class="d-flex justify-content-center mb-4">
                <!-- Editable table -->
                <div class="card ">
                    <div class="card-body">
                        <div id="table" class="table-editable">
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <tr>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Nb.jours</th>
                                    <th class="text-center">Nb.personnes</th>
                                    <th class="text-center">PU</th>
                                    <th class="text-center">PT</th>
                                </tr>
                                <tr>
                                    <td class="pt-3-half" contenteditable="true">Salle <?=$data['designation']?></td>
                                    <td class="pt-3-half" contenteditable="true"><?=$duree?></td>
                                    <td class="pt-3-half" contenteditable="true"><?=$personnes?></td>
                                    <td class="pt-3-half" contenteditable="true"><?=(int)$data['prix']?></td>
                                    <td class="pt-3-half" contenteditable="true"><?=$prix_salle?></td>
                                </tr>
                                <!-- This is our clonable table line -->
                                <?php
                                    while ($service = $services->fetch(PDO::FETCH_ASSOC)) {
                                        if ($service['categorie'] == "Hotelerie") {
                                            $total = (int)$service['prix']*$personnes*$duree;
                                        }
                                        else $total = (int)$service['prix'];
                                        ?>
                                <tr>
                                    <td class="pt-3-half" contenteditable="true"><?=$service['designation']?></td>
                                    <td class="pt-3-half" contenteditable="true"><?=$duree?></td>
                                    <td class="pt-3-half" contenteditable="true"><?=$personnes?></td>
                                    <td class="pt-3-half" contenteditable="true"><?=$service['prix']?></td>
                                    <td class="pt-3-half" contenteditable="true"><?=$total?></td>
                                </tr>
                                <?php
                                    $grand_total +=$total;
                                    }
                                ?>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th colspan="3" class="total" 
                                    id="<?=$grand_total + $prix_salle?>" 
                                    idsalle="<?=$data['idReservation']?>">
                                    <?=$grand_total + $prix_salle?>
                                </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Editable table -->
            </div>
            <div id="barcodeTarget" class="barcodeTarget">
                <script>
                    generateBarcode()
                </script>
            </div>
            <hr class="">
            <div class="text-center">
                <small><i class="fa fa-map-marker" aria-hidden="true"></i><cite>122, Av Likasi Coin Kamanyola Lubumbashi RD-Congo</cite></small>
                <small>
                    <i class="fa fa-phone" aria-hidden="true"></i> +243 (0) 974 380 161
                    <a href="http://www.maisonsafina.org" class="white-text" >www.maisonsafina.org</a>
                </small> 
            </div>
        </div>
    </div>
    <button class="btn btn-outline-secondary deep-purple-text waves-effect" id="export">
        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exporter
    </button>
    Ou payer avec
    <button class="btn btn-outline-success deep-purple-text waves-effect" id="payer">
        
    </button>
    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div id="class" class="modal-dialog modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Notification</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
            <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
            <p id="msg"></p>
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            <a type="button" class="btn btn-success">ok<i class="far fa-gem ml-1 text-white"></i></a>
        </div>
        </div>
        <!--/.Content-->
    </div>
    </div>
    <!-- Central Modal Medium Success-->
</div>
 
<?php
$content = ob_get_clean();
require_once 'includes/template.php';
?>
<!--<script src="jquery-1.10.2.js" type="text/JavaScript" language="javascript"></script>-->
<script src="public/js/jquery-ui-1.10.4.custom.js"></script>
<script src="public/js/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
<script src="public/js/paypal.js" type="text/JavaScript" language="javascript"></script>
<script>
    var $TABLE = $('#table');
    var $BTN = $('#export-btn');
    var $EXPORT = $('#export');

    $('.table-add').click(function () 
    {
        var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
        $TABLE.find('table').append($clone);
    });

    $('.table-remove').click(function () {
        $(this).parents('tr').detach();
    });

    $('.table-up').click(function () {
        var $row = $(this).parents('tr');
        if ($row.index() === 1) return; // Don't go above the header
        $row.prev().before($row.get(0));
    });

    $('.table-down').click(function () {
        var $row = $(this).parents('tr');
        $row.next().after($row.get(0));
    });

    // A few jQuery helpers for exporting only
    jQuery.fn.pop = [].pop;
    jQuery.fn.shift = [].shift;

    $BTN.click(function () {
        var $rows = $TABLE.find('tr:not(:hidden)');
        var headers = [];
        var data = [];

        // Get the headers (add special header logic here)
        $($rows.shift()).find('th:not(:empty)').each(function () {
        headers.push($(this).text().toLowerCase());
    });

    // Turn all existing rows into a loopable array
    $rows.each(function () {
        var $td = $(this).find('td');
        var h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach(function (header, i) {
        h[header] = $td.eq(i).text();
        });

        data.push(h);
    });

    // Output the result
    $EXPORT.text(JSON.stringify(data));
    });
</script>
<script>
    $(document).ready(function(){

        $("#export").click(function(){

            var mode = "iframe";
            var close = mode == "popup" && "popup";
            var extraCss = "";

            var print = "div.PrintArea";

            var keepAttr = ["class","id", "style"];

            var headElements = $("input#addElements").is(":checked") ? '<meta charset="utf-8" />,<meta http-equiv="X-UA-Compatible" content="IE=edge"/>' : '';

            var options = { mode : mode, popClose : close, extraCss : extraCss, retainAttr : keepAttr, extraHead : headElements };

            $( print ).printArea( options );
        });

        $("input[name='mode']").click(function(){
            if ( $(this).val() == "iframe" ) $("#closePop").attr( "checked", false );
        });
    });

  </script>
  
paypal.Button.render({
        env: 'sandbox',
        commit: true,
        style: {
            color: 'blue',
            size: 'responsive'
        },
        payment: function() {

            var total = $(".total").attr("id");
            var idsalle = $('.total').attr('idsalle');
            var CREATE_URL = 'controllers/paypal.php?ref=' + total + '&id=' + idsalle;

            return paypal.request.post(CREATE_URL)
                .then(function(data) {
                    if (data.success) {
                        return data.paypal_response.id;
                    } else {
                        $("#classe").removeClass('modal-success').addClass("modal-warning");
                        $("#msg").text(data.msg);
                        $('#centralModalSuccess').modal('show');
                        return false;
                    }
                });
        },
        onAuthorize: function(data, actions) {
            var EXECUTE_URL = 'controllers/paypal2.php';

            var data = {
                paymentID: data.paymentID,
                payerID: data.payerID
            };
            return paypal.request.post(EXECUTE_URL, data)
                .then(function(data) {
                    if (data.success) {
                        $('#centralModalSuccess').modal('show');
                        $("#msg").text("Paiement approuvé ! Merci !");
                        $("#payer").attr("disabled", "disabled");

                    } else {
                        $("#classe").removeClass('modal-success').addClass("modal-warning");
                        $("#msg").text(data.msg);
                        $('#centralModalSuccess').modal('show');
                    }
                });
        },
        onCancel: function(data, actions) {
            $("#classe").removeClass('modal-success').addClass("modal-warning");
            $("#msg").text("Paiement annulé : vous avez fermé la fenêtre de paiement.");
            $('#centralModalSuccess').modal('show');
        },            
        onError: function(err) {
            $("#classe").removeClass('modal-success').addClass("modal-danger");
            $("#msg").text("Paiement annulé : une erreur est survenue. Merci de bien vouloir réessayer ultérieurement.");
            $('#centralModalSuccess').modal('show');
        }
    },
    '#payer');
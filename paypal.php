<?php
   session_start();
   require_once "fonctions.php";
   require_once "../models/paypalpayment.php";

   $success = 0;
   $msg = "Une erreur est survenue, merci de bien vouloir réessayer ultérieurement...";
   $paypal_response = [];

   if (!empty((int)$_GET['ref']) && !empty((int)$_GET['id'])) 
   {
   
      $ref = htmlspecialchars($_GET['ref']);
      $id = htmlspecialchars($_GET['id']);
   
      $payer = new PayPalPayment();
      $payer->setSandboxMode(1);
      $payer->setClientID("AehmVnpPWIgI9KYO0H6snjUHiij8FRxmAVEEjL5-RYYd2DPfIiSo1BO05smaWZRZCnTl6tQBUm9rgjO2");
      $payer->setSecret("EAm_IxZGUx_-afIV6dHfdWmIIFMPhD1xUl6tva7kyUsjEGSU8E4QM1WsjOq7QeRhhcT1qnFefXa3OTrg");

      $payment_data = [
         "intent" => "sale",
         "redirect_urls" => [
            "return_url" => "http://localhost/",
            "cancel_url" => "http://localhost/"
         ],
         "payer" => [
            "payment_method" => "paypal"
         ],
         "transactions" => [
            [
               "amount" => [
                  "total" => strval($ref),
                  "currency" => "USD"//"EUR"
               ],
               "item_list" => [
                  "items" => [
                     [
                        "sku" => $id,
                        "quantity" => "1",
                        "name" => "Reservation",
                        "price" => strval($ref),
                        "currency" => "USD"
                     ]
                  ]
               ],
               "description" => "Reservation de la salle"
            ]
         ]
      ];

      $paypal_response = $payer->createPayment($payment_data);
      $paypal_response = json_decode($paypal_response);

      if (!empty($paypal_response->id)) {
         $bdd = get_connexion();
         $insert = $bdd->prepare("INSERT INTO paiements(Id_reservation, Montant, Payment_status, payment_currency, payment_date, payer_email, payment_id) 
                                  VALUES (:idres, :montant, :stat, :curr, NOW(), '', :id)");
         
         $insert_ok = $insert->execute(array(
               "idres"=>$id,
               "id"=>$paypal_response->id,
               "stat" => $paypal_response->state,
               "montant" => $paypal_response->transactions[0]->amount->total,
               "curr" => $paypal_response->transactions[0]->amount->currency
            ));

         if ($insert_ok) {
            $success = 1;
            $msg = "";
         }
      } else 
         {
         $msg = "Une erreur est survenue durant la communication avec les serveurs de PayPal. Merci de bien vouloir réessayer ultérieurement.";
         }
      } else{
         $msg = "Le produit que vous tentez d'acheter n'est pas disponible.";
      }

   echo json_encode(["success" => $success, "msg" => $msg, "paypal_response" => $paypal_response]);
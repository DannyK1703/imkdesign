<?php
session_start();
require_once "fonctions.php";
require_once "../models/paypalpayment.php";
$success = 0;
$msg = "Une erreur est survenue, merci de bien vouloir réessayer ultérieurement...";
$paypal_response = [];

if (!empty($_POST['paymentID']) AND !empty($_POST['payerID'])) {
   $paymentID = htmlspecialchars($_POST['paymentID']);
   $payerID = htmlspecialchars($_POST['payerID']);

   $payer = new PayPalPayment();
   $payer->setSandboxMode(1);
   $payer->setClientID("AehmVnpPWIgI9KYO0H6snjUHiij8FRxmAVEEjL5-RYYd2DPfIiSo1BO05smaWZRZCnTl6tQBUm9rgjO2");
   $payer->setSecret("EAm_IxZGUx_-afIV6dHfdWmIIFMPhD1xUl6tva7kyUsjEGSU8E4QM1WsjOq7QeRhhcT1qnFefXa3OTrg");

   $bdd =get_connexion();
   
   $payment = $bdd->prepare('SELECT * FROM paiements WHERE payment_id = ?');
   $payment->execute(array($paymentID));
   $payment = $payment->fetch();

   if ($payment) {
      $paypal_response = $payer->executePayment($paymentID, $payerID);
      $paypal_response = json_decode($paypal_response);

      $update_payment = $bdd->prepare('UPDATE paiements SET payment_status = ?, payer_email = ? WHERE payment_id = ?');
      $update_payment->execute(array($paypal_response->state, $paypal_response->payer->payer_info->email, $paymentID));

      if ($paypal_response->state == "approved") {
         $success = 1;
         $email = "fideleplk@gmail.com";
		   $exp = $paypal_response->payer->payer_info->email;
      } else {
         $msg = "Une erreur est survenue durant l'approbation de votre paiement. Merci de réessayer ultérieurement ou contacter un administrateur du site.";
      }
   } else {
      $msg = "Votre paiement n'a pas été trouvé dans notre base de données. Merci de réessayer ultérieurement ou contacter un administrateur du site. (Votre compte PayPal n'a pas été débité)";
   }
}
echo json_encode(["success" => $success, "msg" => $msg, "paypal_response" => $paypal_response]);
?>
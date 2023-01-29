<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../vendor/autoload.php"; ?>

<?php 

\Stripe\Stripe::setApiKey($secret_key);


$charge = \Stripe\Charge::create([
  'source' => $_POST['stripeToken'],
   'amount' =>  $_SESSION['price'] * 100,  //it will be in cents
  'currency' => 'eur',
]);


echo "paid";

?>
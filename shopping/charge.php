<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../vendor/autoload.php"; ?>

<?php 


\Stripe\Stripe::setApiKey($secret_key);

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$token = $_POST['stripeToken'];



 if(isset($_POST['email'])){
  if(empty($_POST['email'] OR empty($_POST['username']) OR empty($_POST['fname']) OR empty($_POST['lname']))){
    echo "<script>alert('One or more inputs are empty')</script>";
}
}

$customer = \Stripe\Customer::create([
  'email' => $email,
  'source' => $token,
 
]);



$charge = \Stripe\Charge::create([
   'amount' =>  $_SESSION['price'] * 100,  //it will be in cents
  'currency' => 'eur',
  "description" => "PHP book",
  'customer' => $customer->id,

]); 

header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

?>
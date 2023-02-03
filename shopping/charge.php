<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../vendor/autoload.php"; ?>

<?php 

/* var_dump($_POST);
die();
 */

\Stripe\Stripe::setApiKey($secret_key);




 if(isset($_POST['email'])){ 
    
   
      if(empty($_POST['email'] OR empty($_POST['username']) OR empty($_POST['fname']) OR empty($_POST['lname']))){
        echo "<script>alert('One or more inputs are empty')</script>";
    } else {

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $token = $_POST['stripeToken'];
      $price = $_SESSION['price'];
      $user_id = $_SESSION['user_id'];

  $insert = $conn->prepare("INSERT INTO orders 
                         (email,username,fname,lname,token,price,user_id)
                         VALUES (:email,:username,:fname,:lname,:token,:price,:user_id)");

                         $insert->execute([
                            ':email' => $email,
                            ':username' => $username,
                            ':fname' => $fname,
                            ':lname' => $lname,
                            ':token' => $token,
                            ':price' => $price,
                            ':user_id' => $user_id
                         ]);
}
}
$customer = \Stripe\Customer::create([
  'email' => $email,
  'source' => $token,
 
]);

$charge = \Stripe\Charge::create([
  'amount' =>  $_SESSION['price'],  //it will be in cents
 'currency' => 'eur',
 "description" => "PHP book",
 'customer' => $customer->id,

]); 






header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

?>
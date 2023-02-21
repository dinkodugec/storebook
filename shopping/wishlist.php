<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if(isset($_POST['submit'])){

      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_image = $_POST['product_image'];
      $product_price = $_POST['product_price'];

      $user_id = $_POST['user_id'];



      $insert = $conn->prepare("INSERT INTO wishlist (product_id, product_name, product_image, product_price, user_id)
                              VALUES(:product_id, :product_name, :product_image, :product_price, :user_id)");

      $insert->execute([
          ':product_id'=> $product_id,
          ':product_name'=> $product_name,
          ':product_image' => $product_image,
          ':product_price' => $product_price,
          ':user_id' => $user_id,
      ]);                        

}
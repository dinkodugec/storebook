<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if(!isset($_SESSION['username'])){
          header("Location: http://store.hr:8080/");
        }
?>

<?php 
   if(isset($_POST['update'])){
    $id = $_POST['id'];
    $product_amount = $_POST['product_amount'];

    $update = $conn->prepare("UPDATE cart SET product_amount='$product_amount' WHERE id='$id'");
    $update->execute();
   }

?>


<?php require "includes/footer.php"; ?>